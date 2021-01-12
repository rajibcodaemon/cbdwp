<?php
set_time_limit(0);
ini_set('default_socket_timeout', 1000);

class WC_Gateway_EBizCharge_Econnect
{
    public $enableEconnect = false;
    public $key;   // Source key
    public $userid;   // User Id
    public $pin;   // Source pin (optional)
    public $software;
    public $user_table;
    public $user_meta_table;
    public $posts_table;
    public $wc_order_item_table;
    public $wc_order_item_meta_table;

    public function __construct()
    {
        global $wpdb;
        $this->user_table = $wpdb->prefix . 'users';
        $this->user_meta_table = $wpdb->prefix . 'usermeta';
        $this->posts_table = $wpdb->prefix . 'posts';
        $this->wc_order_item_table = $wpdb->prefix . 'woocommerce_order_items';
        $this->wc_order_item_meta_table = $wpdb->prefix . 'woocommerce_order_itemmeta';
        $this->software = "woocommerce";
    }

    private function _getWsdlUrl()
    {
        return 'https://soap.ebizcharge.net/eBizService.svc?singleWsdl';
    }

    /**
     * Get Security Token array
     *
     * @return array
     */
    function _getSecurityToken()
    {
        return array(
            'SecurityId' => $this->key,
            'UserId' => $this->userid,
            'Password' => $this->pin
        );
    }

    // Set Soap Client Parameters
    public function SoapParams()
    {
        return array(
            'cache_wsdl' => false
        );
    }

    /**
     * Get Response message HTML string
     * @return string
     */
    private function _prepareMessages($messages)
    {
        $messagesHtml = '';
        foreach ($messages as $message) {
            switch ($message['type']) {
                case 'error':
                    $messagesHtml .= '<div class="notice notice-error is-dismissible"> <p>' . $message['message'] . '</p>
                    <button type="button" class="notice-dismiss">
                        <span class="screen-reader-text">Dismiss this notice.</span>
                    </button>
                    </div>';
                    break;
                case 'notice':
                    $messagesHtml .= '<div class="notice notice-info is-dismissible"> <p>' . $message['message'] . '</p>
                    <button type="button" class="notice-dismiss">
                        <span class="screen-reader-text">Dismiss this notice.</span>
                    </button>

                    </div>';
                    break;
                case 'success':
                    $messagesHtml .= '<div class="notice notice-success is-dismissible"> <p>' . $message['message'] . '</p>
                    <button type="button" class="notice-dismiss">
                        <span class="screen-reader-text">Dismiss this notice.</span>
                    </button>
                    </div>';
                    break;
                default:
                    break;
            }
        }

        return $messagesHtml;
    }

    private function getCustomerObject($customer)
    {
        $billingAddress = [];
        $shippingAddress = [];

        if (!empty($customer['billing_first_name'])) {

            $billingAddress = [
                'FirstName' => $customer['billing_first_name'],
                'LastName' => $customer['billing_last_name'],
                'CompanyName' => isset($customer['billing_company']) ? $customer['billing_company'] : '',
                'Address1' => isset($customer['billing_address_1']) ? $customer['billing_address_1'] : '',
                'City' => isset($customer['billing_city']) ? $customer['billing_city'] : '',
                'State' => isset($customer['billing_state']) ? $customer['billing_state'] : '',
                'ZipCode' => isset($customer['billing_postcode']) ? $customer['billing_postcode'] : '',
                'Country' => isset($customer['billing_country']) ? $customer['billing_country'] : ''
            ];
        }

        if (!empty($customer['shipping_first_name'])) {
            $shippingAddress = [
                'FirstName' => $customer['shipping_first_name'],
                'LastName' => $customer['shipping_last_name'],
                'CompanyName' => isset($customer['shipping_company']) ? $customer['shipping_company'] : '',
                'Address1' => isset($customer['shipping_address_1']) ? $customer['shipping_address_1'] : '',
                'City' => isset($customer['shipping_city']) ? $customer['shipping_city'] : '',
                'State' => isset($customer['shipping_state']) ? $customer['shipping_state'] : '',
                'ZipCode' => isset($customer['shipping_postcode']) ? $customer['shipping_postcode'] : '',
                'Country' => isset($customer['shipping_country']) ? $customer['shipping_country'] : ''
            ];
        }

        return array(
            'CustomerId' => $customer['ID'],
            'FirstName' => $customer['first_name'],
            'LastName' => $customer['last_name'],
            'CompanyName' => isset($customer['billing_company']) ? $customer['billing_company'] : '',
            'Phone' => isset($customer['billing_phone']) ? $customer['billing_phone'] : '',
            'Fax' => '',
            'Email' => $customer['user_email'],
            'BillingAddress' => $billingAddress,
            'ShippingAddress' => $shippingAddress,
            'SoftwareId' => $this->software,
        );

    }

    private function formatApiResponse($table, $responseObj)
    {
        $now = new DateTime(null);
        $now->modify("+10 seconds"); //add 10 seconds to make sure sync last_modified_date is greater than object update date
        $data = array();
        if ($responseObj->Status == "Success") {

            if ($table == $this->user_table) {
                $data['ec_internal_id'] = $responseObj->CustomerInternalId;
                $data['ec_customer_id'] = $responseObj->ec_customer_id;

            } elseif ($table == $this->posts_table) {
                // product internal id
                if (isset($responseObj->ItemInternalId)) {
                    $data['ec_internal_id'] = $responseObj->ItemInternalId;
                    $data['ec_product_id'] = $responseObj->ec_product_id;

                } else {
                    // invoice internal id
                    $data['ec_internal_id'] = $responseObj->InvoiceInternalId;
                    $data['ec_invoice_id'] = $responseObj->ec_invoice_id;
                    $data['ec_customer_id'] = $responseObj->ec_customer_id;
                }

            }
        }

        $data['ec_status'] = $responseObj->Status;
        $data['ec_status_code'] = $responseObj->StatusCode;
        $data['ec_error'] = $responseObj->Error;
        $data['ec_error_code'] = $responseObj->ErrorCode;
        $data['ec_last_modified_date'] = $now->format('Y-m-d H:i:s');

        return $data;
    }

    public function updateWPTable($table, $apiResponse, $where)
    {
        global $wpdb;
        $data = $this->formatApiResponse($table, $apiResponse);

        $wpdb->update($table, $data, $where);
    }

    /**
     * Sync Customers to eConnect
     *
     * @return string
     */
    function syncCustomer($id = null)
    {
        global $wpdb;
        $_messages = array();
        $_errorCount = 0;
        $_processedCount = 0;

        $securityToken = $this->_getSecurityToken();

        try {
            $client = new SoapClient($this->_getWsdlUrl(), array('trace' => true, 'exceptions' => true));
            //filter if update is for a single record
            $user_arg['role'] = 'customer';
            if ($id != null) {
                $user_arg['include'] = array($id);
            }

            foreach (get_users($user_arg) as $user) {

                $userMeta = array_map(function ($a) {
                    return $a[0];
                }, get_user_meta($user->ID));

                $customer = array_merge((array)$user->data, $userMeta);

                if (!empty($customer['last_update']) && !empty($customer['ec_last_modified_date']) &&
                    date(strtotime($customer['ec_last_modified_date'])) > $customer['last_update']
                ) {

                    continue; // don't need to process
                }

                try {
                    $customerObj = $this->getCustomerObject($customer);

                    if (empty($customer['ec_internal_id'])) {

                        if ($searchCustomers = $this->searchCustomerListByEmail($customer['user_email'])) {
                            $matchingCustomer = null;
                            foreach ($searchCustomers as $searchCustomer) {
                                $this->log('search customer details: ');
                                $this->log($searchCustomer);
                                // if email is same, we assume its same customer
                                if (strtolower(trim($searchCustomer->Email)) == strtolower(trim($customer['user_email']))) {
                                    $matchingCustomer = $searchCustomer;
                                }
                            }

                            if ($matchingCustomer) {
                                $now = new DateTime(null);
                                $customerApiInfo = [
                                    'ec_internal_id' => $matchingCustomer->CustomerInternalId,
                                    'ec_status' => 'Success',
                                    'ec_status_code' => 1,
                                    'ec_last_modified_date' => $now->format('Y-m-d H:i:s'),
                                    'ec_customer_id' => $matchingCustomer->CustomerId,
                                    'ec_error' => null
                                ];

                                delete_user_meta($user->ID, 'CustNum');
                                add_user_meta($user->ID, 'CustNum', $searchCustomer->CustomerToken);

                                $wpdb->update($this->user_table, $customerApiInfo, ['ID' => $user->ID]);
                                $_processedCount++;
                                continue;

                            } else {

                                $parameters = array(
                                    'securityToken' => $securityToken,
                                    'customer' => $customerObj
                                );

                                $this->log('Add customer with params: ');
                                $this->log($parameters);

                                $addCustomerResponse = $client->AddCustomer($parameters);
                                $obj = $addCustomerResponse->AddCustomerResult;

                                $this->log('Added customer Response: ');
                                $this->log($addCustomerResponse);
                                if ($obj->Status !== 'Success') {
                                    $this->log('Add customer Failed: Record already exist.');
                                }
                            }
                        }

                        $_processedCount++;

                    } else {

                        if (!empty($customer['ec_customer_id'])) {
                            $customerObj['CustomerId'] = $customer['ec_customer_id']; // use econnect customer id in update
                        }

                        $parameters = array(
                            'securityToken' => $securityToken,
                            'customer' => $customerObj,
                            'customerId' => $customerObj['CustomerId'],
                            'customerInternalId' => $customer['ec_internal_id']
                        );
                        $this->log('Update customer with params: ');
                        $this->log($parameters);

                        $updateCustomerResponse = $client->UpdateCustomer($parameters);
                        $obj = $updateCustomerResponse->UpdateCustomerResult;

                        $this->log('Updated customer Response:');
                        $this->log($updateCustomerResponse);
                    }

                    if ($obj->Status == "Error") {
                        if ($_errorCount == 0)
                            $_messages[] = array("type" => 'error', "message" => "Errors have occurred during the sync Customers process, please review the logs. First error occurred is: " . $obj->Error);

                        $_errorCount++;
                    }

                    $whereCondition = array('ID' => (int)$customer['ID']);
                    $obj->ec_customer_id = $customerObj['CustomerId'];
                    $this->updateWPTable($this->user_table, $obj, $whereCondition);

                    $this->log("Customer info updated in WP tables.");
                    $_processedCount++;

                } catch (Exception $e) {
                    $this->log($e->getMessage());

                    if ($_errorCount == 0)
                        $_messages[] = array("type" => 'error', "message" => "Errors have occurred during the sync Customers process, please review the logs. First error occurred is: " . $e->getMessage());

                    $_errorCount++;
                } finally {
                    //$_processedCount++;
                }
            }

            array_unshift($_messages, array("type" => 'notice', "message" => sprintf("Sync Customers process has been completed. %s record(s) processed.", $_processedCount)));

            if ($_errorCount == 0)
                $_messages[] = array("type" => 'success', "message" => "Completed the sync Customers process with no errors.");
        } catch (Exception $e) {
            $this->log($e->getMessage());
            $_messages[] = array("type" => 'error', "message" => $e->getMessage());
        }

        $this->log($_messages);

        return $this->_prepareMessages($_messages);
    }

    private function insertWpCustomer($customer)
    {
        global $wpdb;

        if (empty($customer->Email)) {
            return false;
        }

        $wpCustomer = [
            'first_name' => $customer->FirstName,
            'last_name' => $customer->LastName,
            'billing_company' => $customer->CompanyName,
            'billing_phone' => $customer->Phone,
            'user_email' => $customer->Email,
            'role' => 'customer',
            'user_login' => $customer->Email,
            'user_pass' => $customer->FirstName . '*0334',
        ];

        $this->log('saving customer, info: ');
        //$this->log($customer);

        $customerId = wp_insert_user($wpCustomer);

        if (is_wp_error($customerId)) {
            $this->log('Error: Customer not created. email: ' . $customer->Email . ' ' . $customerId->get_error_message());
            // this can create issue as API allowing multiple customers with same email
            if ($user = $wpdb->get_row($wpdb->prepare("SELECT * FROM $wpdb->users WHERE user_email = %s LIMIT 1", $customer->Email))) {
                // if customer found with same email and CustomerId
                if (!empty($user->ec_customer_id) && $user->ec_customer_id == $customer->CustomerId) {
                    $this->log('Info: Local customer matched: ' . $user->ID);
                    return $user->ID;
                } else {
                    $this->log('Info: Local customer not matched: local ec_customer_id: ' . $user->ec_customer_id . ' Order CustomerId: ' . $customer->CustomerId);
                    return false;
                }

            } else {
                return false;
            }

        } else {
            $this->log('Info: Customer Added Successfully. CustomerId: ' . $customerId);
        }

        if ($customerId) {
            $now = new DateTime(null);
            $customerApiInfo = [
                'ec_internal_id' => $customer->CustomerInternalId,
                'ec_status' => 'Success',
                'ec_status_code' => 1,
                'ec_last_modified_date' => $now->format('Y-m-d H:i:s'),
                'ec_customer_id' => $customer->CustomerId,
            ];

            $wpdb->update($this->user_table, $customerApiInfo, ['ID' => $customerId]);

            $shippingMeta = [];
            $billingMeta = [];
            $customerShipping = $customer->ShippingAddress;
            $customerBilling = $customer->BillingAddress;

            if (!empty($customerBilling) && isset($customerBilling->FirstName)) {
                $billingMeta = [
                    'billing_first_name' => $customerBilling->FirstName,
                    'billing_last_name' => $customerBilling->LastName,
                    'billing_address_1' => $customerBilling->Address1,
                    'billing_city' => $customerBilling->City,
                    'billing_state' => $customerBilling->State,
                    'billing_postcode' => $customerBilling->ZipCode,
                    'billing_country' => $customerShipping->Country,
                ];

            } else {
                $this->log('Warning: Customer billing address is empty. CustomerId: ' . $customerId);
            }

            if (empty($customerShipping) && !empty($customerBilling)) {
                $this->log('Warning: Customer shipping address is empty. CustomerId: ' . $customerId);
                $customerShipping = $customerBilling;
            }

            if (!empty($customerShipping) && isset($customerShipping->FirstName)) {
                $shippingMeta = [
                    'shipping_first_name' => $customerShipping->FirstName,
                    'shipping_last_name' => $customerShipping->LastName,
                    'shipping_company' => $customerShipping->CompanyName,
                    'shipping_address_1' => $customerShipping->Address1,
                    'shipping_city' => $customerShipping->City,
                    'shipping_state' => $customerShipping->State,
                    'shipping_postcode' => $customerShipping->ZipCode,
                    'shipping_country' => $customerShipping->Country,
                ];
            }

            $customerMeta = array_merge($billingMeta, $shippingMeta);
            // add customer token
            $customerMeta = array_merge($customerMeta, ['CustNum' => $customer->CustomerToken]);
            foreach ($customerMeta as $key => $value) {
                // Update user meta.
                add_user_meta($customerId, $key, $value);
            }
        }

        return $customerId;
    }

    private function getWpCustomers($customerMap = false)
    {
        global $wpdb;
        if ($customerMap) {
            $userQuery = "SELECT u.ec_customer_id, u.ID, u.user_email, ec_internal_id FROM " . $this->user_table . " u WHERE u.ec_customer_id <> ''";
        } else {
            $userQuery = "SELECT u.user_email, u.ID, u.ec_customer_id, ec_internal_id FROM " . $this->user_table . " u WHERE u.user_email <> ''";
        }

        return $wpdb->get_results($userQuery, OBJECT_K);

        /*$user_arg['role'] = 'customer';
        $customers = [];
        foreach (get_users($user_arg) as $user) {
            $customer = $user->data;

            if ($customerMap) {
                // used in download order
                if (!empty($customer->ec_customer_id)) {
                    $customers[$customer->ec_customer_id] = $customer->ID;
                }

            } else {

                if (!empty($customer->ec_internal_id)) {
                    $customers[$customer->ec_internal_id] = $customer->ID;
                }
            }
        }

        return $customers;*/
    }

    /**
     * download Customer from eConnect
     * @return string
     */
    public function downloadCustomers()
    {
        $_messages = array();
        $_errorCount = 0;
        $_processedCount = 0;

        $itemsCount = 1;
        $start = 0;
        $limit = 1000;

        try {
            $wpCustomers = $this->getWpCustomers();

            while ($itemsCount > 0 && $limit >= 1000) {

                $customers = $this->searchCustomerList($start, $limit);

                $itemsCount = count($customers);

                if ($itemsCount > 0) {

                    if ($itemsCount === 1) {
                        $customers = array($customers);
                    }

                    foreach ($customers as $customer) {
                        // insert only if customer not already exists
                        if (!array_key_exists($customer->Email, $wpCustomers)) {
                            if ($this->insertWpCustomer($customer)) {
                                $_processedCount++;
                            }
                        }
                    }
                }

                $start += $itemsCount + 1;
                $limit = $start + 1000;
            }

        } catch (Exception $e) {
            $this->log($e->getMessage());

            if ($_errorCount == 0)
                $_messages[] = array("type" => 'error', "message" => "Errors have occurred during the download customers process, please review the logs. First error occurred is: " . $e->getMessage());

            $_errorCount++;
        } finally {
            // $_processedCount++;
        }

        if ($_errorCount == 0) {
            $_messages[] = array(
                "type" => 'success',
                "message" => sprintf("Download customers has been completed. %s record(s) processed.", $_processedCount)
            );
        }

        $this->log($_messages);

        return $this->_prepareMessages($_messages);
    }

    /**
     * Search Ebiz customer
     * @param int $customerId - wp customer id
     * Return false | customer object
     */
    function searchCustomerById($customerId)
    {
        $client = new SoapClient($this->_getWsdlUrl(), $this->SoapParams());
        $ebizCustomer = false;

        try {
            // find CustomerInternalId using SearchCustomers ebiz method
            $searchCustomer = $client->SearchCustomers(array(
                    'securityToken' => $this->_getSecurityToken(),
                    'customerId' => $customerId,
                    'start' => 0,
                    'limit' => 1
                )
            );

            if (isset($searchCustomer->SearchCustomersResult->Customer)) {
                $this->log(__METHOD__ . ', customer found. WP customerId: ' . $customerId);
                return $searchCustomer->SearchCustomersResult->Customer;

            } else {
                return false;
            }

        } catch (SoapFault $ex) {
            $this->log(__METHOD__ . ', Error: ' . $ex->getMessage());

            return $this->error = 'SoapFault:' . __METHOD__ . $ex->getMessage();
        }

    }

    /**
     * @param int $start
     * @param int $limit
     * @return array
     */
    private function searchCustomerList($start = 0, $limit = 1000)
    {
        $client = new SoapClient($this->_getWsdlUrl(), $this->SoapParams());
        $ebizCustomers = [];

        try {
            $filters = [
                'FieldName' => 'SoftwareId',
                'ComparisonOperator' => 'notequal',
                'FieldValue' => $this->software,
            ];

            $params = [
                'securityToken' => $this->_getSecurityToken(),
                'filters' => ['SearchFilter' => $filters],
                'includeCustomerToken' => 1,
                'includePaymentMethodProfiles' => 0,
                'countOnly' => 0,
                'start' => $start,
                'limit' => $limit
            ];

            $api = $client->SearchCustomerList($params);

            if (isset($api->SearchCustomerListResult->CustomerList->Customer)) {
                $ebizCustomers = $api->SearchCustomerListResult->CustomerList->Customer;
                if(count($ebizCustomers) === 1) {
                    $ebizCustomers = [$ebizCustomers];
                }

                $this->log(__METHOD__ . ', Customers found: ' . count($ebizCustomers));
            }

        } catch (SoapFault $ex) {
            $this->log(__METHOD__ . ', Error: ' . $ex->getMessage());
        }

        return $ebizCustomers;
    }

    /**
     * @param $email
     * @return array
     * @throws SoapFault
     */
    private function searchCustomerListByEmail($email)
    {
        $client = new SoapClient($this->_getWsdlUrl(), $this->SoapParams());
        $ebizCustomers = [];

        try {
            $filters = [
                'FieldName' => 'Email',
                'ComparisonOperator' => 'eq',
                'FieldValue' => $email,
            ];

            $params = [
                'securityToken' => $this->_getSecurityToken(),
                'filters' => ['SearchFilter' => $filters],
                'includeCustomerToken' => 1,
                'includePaymentMethodProfiles' => 0,
                'countOnly' => 0,
                'start' => 0,
                'limit' => 10
            ];

            $api = $client->SearchCustomerList($params);

            if (isset($api->SearchCustomerListResult->CustomerList->Customer)) {
                $ebizCustomers = $api->SearchCustomerListResult->CustomerList->Customer;
                if (count($ebizCustomers) === 1) {
                    $ebizCustomers = [$ebizCustomers];
                }

                $this->log(__METHOD__ . ', Customers found: ' . count($ebizCustomers));
            }

        } catch (SoapFault $ex) {
            $this->log(__METHOD__ . ', Error: ' . $ex->getMessage());
        }

        return $ebizCustomers;
    }

    /**
     * @param int $start
     * @param int $limit
     * @return array|string
     */
    private function searchItems($start = 0, $limit = 1000)
    {
        $client = new SoapClient($this->_getWsdlUrl(), $this->SoapParams());
        $results = array();

        try {
            $searchItems = $client->SearchItems(
                [
                    'securityToken' => $this->_getSecurityToken(),
                    'start' => $start,
                    'limit' => $limit,
                    'filters' => [
                        'FieldName' => 'SoftwareId',
                        'ComparisonOperator' => 'notequal',
                        'FieldValue' => $this->software,
                    ],
                ]
            );

            if (isset($searchItems->SearchItemsResult->ItemDetails)) {
                $results = $searchItems->SearchItemsResult->ItemDetails;

                $this->log(__METHOD__ . ', search item result count ' . count($results));
            }

        } catch (SoapFault $ex) {
            $this->log(__METHOD__ . ', Error: ' . $ex->getMessage());
            return $this->error = 'SoapFault: SearchItems' . $ex->getMessage();
        }

        return $results;
    }

    private function searchWpProducts($forOrder = false)
    {
        global $wpdb;

        if ($forOrder) {
            // group by ec_product_id
            $productsQuery = "SELECT p.ec_product_id, p.ID
            FROM " . $this->posts_table . " p
            WHERE p.post_type = 'product' AND p.ec_internal_id <> ''
            ";

        } else {
            $productsQuery = "SELECT p.ec_internal_id, p.ec_product_id
            FROM " . $this->posts_table . " p
            WHERE p.post_type = 'product' AND p.ec_internal_id <> ''
            ";
        }

        return $wpdb->get_results($productsQuery, OBJECT_K);
    }

    /**
     * @param $item
     * @return int|WP_Error
     */
    private function insertWpProduct($item)
    {
        global $wpdb;

        $postData = [
            'post_title' => $item->Name,
            'post_content' => '',
            'post_content_filtered' => '',
            'post_excerpt' => $item->Description,
            'post_status' => ($item->Active == 1) ? 'publish' : 'draft',
            'post_type' => 'product',
            'meta_input' => [
                '_price' => $item->UnitPrice,
                '_stock' => $item->QtyOnHand,
                '_sku' => $item->SKU,
                '_tax_status' => ($item->Taxable == 1) ? 'taxable' : '',
                '_stock_status' => 'instock',
            ]
        ];

        $itemId = wp_insert_post($postData);

        if (is_wp_error($itemId)) {
            $this->log('Insert item error: ' . $itemId->get_error_message());

        } else if ($itemId) {

            $now = new DateTime(null);
            $itemApiInfo = [
                'ec_internal_id' => $item->ItemInternalId,
                'ec_status' => 'Success',
                'ec_status_code' => 1,
                'ec_last_modified_date' => $now->format('Y-m-d H:i:s'),
                'ec_product_id' => $item->ItemId
            ];

            $wpdb->update($this->posts_table, $itemApiInfo, ['ID' => $itemId]);

            $this->log('Item inserted successfully. ItemId: ' . $itemId);
        }

        return $itemId;
    }

    /**
     * download Products to eConnect
     * @return string
     */
    public function downloadItems()
    {
        $_messages = array();
        $_errorCount = 0;
        $_processedCount = 0;

        $itemsCount = 1;
        $start = 0;
        $limit = 1000;

        try {
            $wpProducts = $this->searchWpProducts();

            while ($itemsCount > 0 && $limit >= 1000) {

                $items = $this->searchItems($start, $limit);
                $itemsCount = count($items);

                if ($itemsCount > 0) {
                    if ($itemsCount === 1) {
                        $items = array($items);
                    }

                    foreach ($items as $item) {

                        if (!array_key_exists($item->ItemInternalId, $wpProducts)) {

                            if (!empty($item->ItemId) && !empty($item->Name)) {

                                $this->insertWpProduct($item);
                                $_processedCount++;

                            } else {
                                $this->log('Product not inserted. ItemId and ItemName was empty');
                                $this->log($item);
                            }
                        }
                    }
                }

                $start += $itemsCount + 1;
                $limit = $start + 1000;
            }
        } catch (Exception $e) {
            $this->log($e->getMessage());

            if ($_errorCount == 0)
                $_messages[] = array("type" => 'error', "message" => "Errors have occurred during the download products process, please review the logs. First error occurred is: " . $e->getMessage());

            $_errorCount++;
        } finally {
            //$_processedCount++;
        }

        if ($_errorCount == 0) {
            $_messages[] = array(
                "type" => 'success',
                "message" => sprintf("Download Products has been completed. %s record(s) processed.", $_processedCount)
            );
        }

        $this->log($_messages);

        return $this->_prepareMessages($_messages);
    }

    /**
     * @param int $start
     * @param int $limit
     * @return array|string
     */
    private function searchOrders($start = 0, $limit = 1000)
    {
        $results = [];
        $filters = [
            'FieldName' => 'Software',
            'ComparisonOperator' => 'notequal',
            'FieldValue' => $this->software,
        ];

        try {
            $client = new SoapClient($this->_getWsdlUrl(), $this->SoapParams());

            $search = $client->SearchSalesOrders(
                [
                    'securityToken' => $this->_getSecurityToken(),
                    'start' => $start,
                    'limit' => $limit,
                    'includeItems' => true,
                    'filters' => ['SearchFilter' => $filters]
                ]
            );

            if (isset($search->SearchSalesOrdersResult->SalesOrder)) {
                $results = $search->SearchSalesOrdersResult->SalesOrder;

                $this->log(__METHOD__ . ', search orders result count ' . count($results));
            }

        } catch (SoapFault $ex) {
            $this->log(__METHOD__ . ', Error: ' . $ex->getMessage());
            return $this->error = 'SoapFault: SearchItems' . $ex->getMessage();
        }

        return $results;
    }

    private function getWpOrders()
    {
        global $wpdb;

        $query = "SELECT p.ec_order_internal_id, p.ID
            FROM " . $this->posts_table . " p
            WHERE p.post_type = 'shop_order'
            AND p.post_status IN ('wc-processing', 'wc-completed', 'wc-pending')
            AND (p.ec_order_internal_id <> '' OR p.ec_order_internal_id is not null)
            ";

        return $wpdb->get_results($query, OBJECT_K);
    }

    /**
     * @param $order
     * @param $wpProducts
     * @param $wpCustomerId
     * @return int|WP_Error
     */
    private function insertWpOrder($order, $wpProducts, $wpCustomerId)
    {
        global $wpdb;

        $postMeta = [
            '_customer_user' => $wpCustomerId,
            '_order_currency' => $order->Currency,
            '_order_total' => $order->Amount,
            '_order_tax' => $order->TotalTaxAmount,
            '_created_via' => 'Download Orders',
            '_payment_method' => 'ebizcharge',
            '_payment_method_title' => 'Credit Card (EBizCharge)',
        ];

        $transaction = $this->searchOrderTransactions($order->SalesOrderNumber, $order->CustomerId);

        if (!empty($transaction)) {

            $postMeta['_payment_status'] = $transaction['PaymentStatus'];
            $postMeta['_transaction_id'] = $transaction['RefNum'];
            //$postMeta['_order_total'] = $transaction['Amount'];
            //$postMeta['_order_tax'] = $transaction['Tax'];
            $postMeta['_order_shipping'] = $transaction['Shipping'];
            $postMeta['_paid_date'] = $transaction['DateTime'];
            $postMeta['_customer_ip_address'] = $transaction['ClientIP'];
            $postMeta['_card_holder'] = $transaction['AccountHolder'];
            $postMeta['_card_number'] = $transaction['CardNumber'];
            $postMeta['_card_expiry'] = $transaction['CardExpiration'];
            $postMeta['_card_code'] = $transaction['CardCode'];
            $postMeta['_card_type'] = $transaction['CardType'];

            $billing = $transaction['BillingAddress'];
            $shipping = $transaction['ShippingAddress'];

            if (!empty($billing) && isset($billing->FirstName) && !empty($shipping)) {
                $billingMeta = [
                    '_billing_first_name' => $billing->FirstName,
                    '_billing_last_name' => $billing->LastName,
                    '_billing_company' => $billing->Company,
                    '_billing_address_1' => $billing->Street,
                    '_billing_address_2' => $billing->Street2,
                    '_billing_city' => $billing->City,
                    '_billing_state' => $billing->State,
                    '_billing_postcode' => $billing->Zip,
                    '_billing_country' => $billing->Country,
                    '_billing_email' => $billing->Email,
                    '_billing_phone' => $billing->Phone,
                    '_shipping_first_name' => $shipping->FirstName,
                    '_shipping_last_name' => $shipping->LastName,
                    '_shipping_company' => $shipping->Company,
                    '_shipping_address_1' => $shipping->Street,
                    '_shipping_address_2' => $shipping->Street2,
                    '_shipping_city' => $shipping->City,
                    '_shipping_state' => $shipping->State,
                    '_shipping_postcode' => $shipping->Zip,
                    '_shipping_country' => $shipping->Country,
                ];

                $postMeta = array_merge($postMeta, $billingMeta);
            } else {
                $this->log('Order# ' . $order->SalesOrderNumber . ' billing and shipping address not found in the transaction.');
            }
        }

        $postData = [
            'post_title' => 'Order# - ' . $order->SalesOrderNumber . ' - ' . $order->Date,
            'post_content' => '',
            'post_content_filtered' => '',
            'post_excerpt' => '',
            'post_status' => 'wc-processing',
            'post_type' => 'shop_order',
            'post_date' => $order->Date,
            'meta_input' => $postMeta,
        ];

        $this->log('Saving Order with data: ');
        $this->log($order);

        $orderId = wp_insert_post($postData);

        if (is_wp_error($orderId)) {
            $this->log('Order not saved: error: ' . $orderId->get_error_message());

        } else if ($orderId) {

            $now = new DateTime(null);
            $itemApiInfo = [
                'ec_order_internal_id' => $order->SalesOrderInternalId,
                'ec_order_status' => 'Success',
                'ec_order_last_modified_date' => $now->format('Y-m-d H:i:s'),
                'ec_customer_id' => $order->CustomerId,
                'ec_order_id' => $order->SalesOrderNumber,
            ];

            // wp_insert_post can't insert the custom columns--
            $wpdb->update($this->posts_table, $itemApiInfo, ['ID' => $orderId]);
            // update customer Ebizcharge CustNum
            if (!empty($transaction['CustNum'])) {
                update_user_meta($wpCustomerId, 'CustNum', $transaction['CustNum']);
            }

            $this->insertWpOrderItems($orderId, $order, $wpProducts, $transaction);

            $this->log('Order inserted successfully. OrderId: ' . $orderId);

            return $orderId;
        }

        return false;
    }

    private function insertWpOrderItems($orderId, $apiOrder, $wpProducts, $transaction)
    {
        global $wpdb;

        $this->log('Order items inserting. OrderId: ' . $orderId);

        $orderItems = isset($apiOrder->Items->Item) ? $apiOrder->Items->Item : array();

        if (!empty($orderItems) && is_object($orderItems)) { // API result is different when items count is 1
            $orderItems = [$orderItems];
        }

        foreach ($orderItems as $item) {

            if (!empty($item->ItemId) && !empty($item->Name)) {

                $item_names[] = $item->Name . '(' . intval($item->Qty) . ')';

                $orderItemId = wc_add_order_item($orderId, array(
                    'order_item_name' => $item->Name,
                    'order_item_type' => 'line_item', // product
                    'order_id' => $orderId
                ));

                if (array_key_exists($item->ItemId, $wpProducts)) {
                    $product = $wpProducts[$item->ItemId];
                    $productId = $product->ID;
                } else {
                    $productId = $item->ItemId;
                }

                $itemMeta = [
                    '_qty' => $item->Qty,
                    '_product_id' => $productId,
                    '_line_subtotal' => $item->TotalLineAmount,
                    '_line_total' => $item->TotalLineAmount,
                    //'cost' => $item->UnitPrice,
                    '_line_tax' => $item->TotalLineTax,
                ];

                foreach ($itemMeta as $key => $value) {
                    $wpdb->insert($this->wc_order_item_meta_table, [
                        'order_item_id' => $orderItemId,
                        'meta_key' => $key,
                        'meta_value' => $value,
                    ]);
                }
            } else {
                $this->log('Warning: Order item id and name was empty. item not added. OrderId: ' . $orderId);
            }
        }

        // add shipping
        $orderItemId = wc_add_order_item($orderId, array(
            'order_item_name' => 'Flat rate',
            'order_item_type' => 'shipping',
            'order_id' => $orderId
        ));

        $itemMeta = [
            'method_id' => 'flat_rate',
            'instance_id' => 2,
            'cost' => isset($transaction['Shipping']) ? $transaction['Shipping'] : 0,
            'Items' => !empty($item_names) ? implode(', ', $item_names) : '',
            'total_tax' => 0,
        ];
        // insert shipping meta
        foreach ($itemMeta as $key => $value) {
            $wpdb->insert($this->wc_order_item_meta_table, [
                'order_item_id' => $orderItemId,
                'meta_key' => $key,
                'meta_value' => $value,
            ]);
        }
    }

    private function searchOrderTransactions($orderId, $customerId)
    {
        $client = new SoapClient($this->_getWsdlUrl(), $this->SoapParams());
        $results = array();

        try {
            $searchFilter1 = array(
                'FieldName' => 'CustomerId',
                'ComparisonOperator' => 'eq',
                'FieldValue' => $customerId
            );

            $searchFilter2 = array(
                'FieldName' => 'OrderID',
                'ComparisonOperator' => 'eq',
                'FieldValue' => $orderId
            );

            $searchFilters['SearchFilter'][0] = $searchFilter1;
            $searchFilters['SearchFilter'][1] = $searchFilter2;
            $searchTrans = array(
                'securityToken' => $this->_getSecurityToken(),
                'matchAll' => 1,
                'countOnly' => 0,
                'start' => 0,
                'limit' => 1000,
                'sort' => 'DateTime',
                'filters' => $searchFilters
            );

            $searchTransactions = $client->SearchTransactions($searchTrans);
            $transactions = $searchTransactions->SearchTransactionsResult;

            if ($transactions->TransactionsMatched > 0) {

                $this->log(__METHOD__ . ', search transaction result count: ' . $transactions->TransactionsMatched);
                $this->log($transactions);

                $transactionsCount = $transactions->TransactionsReturned;
                $transactionsCountFinal = $transactionsCount - 1;

                if ((is_array($transactions->Transactions->TransactionObject)) &&
                    (count($transactions->Transactions->TransactionObject)) > 1
                ) {
                    $transactionObject = $transactions->Transactions->TransactionObject;
                    $transactionObjectFinal = $transactionObject[$transactionsCountFinal];
                } else {
                    $transactionObjectFinal = $transactions->Transactions->TransactionObject;
                }

                $transactionType = $transactionObjectFinal->TransactionType;

                switch ($transactionType) {
                    case "Sale":
                        if (strpos($transactionObjectFinal->Status, 'Authorized') !== false) {
                            $paymentStatus = "Authorized";
                        } else {
                            $paymentStatus = "Captured";
                        }
                        break;
                    case "Credit":
                        $paymentStatus = "Voided";
                        break;
                    case "Auth Only":
                        $paymentStatus = "Authorized";
                        break;
                    case "Voided Sale":
                        $paymentStatus = "Voided";
                        break;
                    case "Refunded":
                        $paymentStatus = "Refunded";
                        break;
                    default:
                        $paymentStatus = "Authorized";
                }

                $results['PaymentStatus'] = $paymentStatus;
                $results['TransactionType'] = $transactionObjectFinal->TransactionType;
                $results['CardType'] = $transactionObjectFinal->CreditCardData->CardType;
                $results['CardCode'] = $transactionObjectFinal->CreditCardData->CardCode;
                $results['CardExpiration'] = $transactionObjectFinal->CreditCardData->CardExpiration;
                $results['CardNumber'] = $transactionObjectFinal->CreditCardData->CardNumber;
                $results['AccountHolder'] = $transactionObjectFinal->AccountHolder;
                $results['RefNum'] = $transactionObjectFinal->Response->RefNum;
                $results['Amount'] = $transactionObjectFinal->Details->Amount;
                $results['CustNum'] = $transactionObjectFinal->Response->CustNum;
                $results['CustomerID'] = $transactionObjectFinal->CustomerID;
                $results['OrderID'] = $transactionObjectFinal->Details->OrderID;
                $results['Shipping'] = $transactionObjectFinal->Details->Shipping;
                $results['Tax'] = $transactionObjectFinal->Details->Tax;
                $results['ClientIP'] = $transactionObjectFinal->ClientIP;
                $results['DateTime'] = $transactionObjectFinal->DateTime;
                $results['BillingAddress'] = $transactionObjectFinal->BillingAddress;
                $results['ShippingAddress'] = $transactionObjectFinal->ShippingAddress;
                if (empty($transactionObjectFinal->ShippingAddress->FirstName)) {
                    $results['ShippingAddress'] = $transactionObjectFinal->BillingAddress;
                }

            } else {
                $this->log(__METHOD__ . ', No result found. Filters: ');
                $this->log($searchTrans);
            }

        } catch (SoapFault $ex) {
            $this->log(__METHOD__ . ', Error: ' . $ex->getMessage());
        }

        return $results;
    }

    public function downloadOrders()
    {
        $_messages = array();
        $_errorCount = 0;
        $_processedCount = 0;

        $itemsCount = 1;
        $start = 0;
        $limit = 1000;

        try {
            $wpOrders = $this->getWpOrders();
            $wpCustomers = $this->getWpCustomers(true);
            $wpProducts = $this->searchWpProducts(true);

            while ($itemsCount > 0 && $limit >= 1000) {

                $salesOrders = $this->searchOrders($start, $limit);

                $itemsCount = count($salesOrders);
                if ($itemsCount > 0) {

                    if ($itemsCount === 1) {
                        $salesOrders = array($salesOrders);
                    }

                    foreach ($salesOrders as $order) {

                        $order->CustomerId = trim($order->CustomerId);

                        if (array_key_exists($order->SalesOrderInternalId, $wpOrders)) {
                            // ignore it
                        } else {

                            if (empty($order->CustomerId) || $order->CustomerId == 0 || strtolower($order->CustomerId) == 'guest') {
                                // insert Guest order
                                if ($this->insertWpOrder($order, $wpProducts, $order->CustomerId)) {
                                    $_processedCount++;
                                }

                            } else if (array_key_exists($order->CustomerId, $wpCustomers)) {  // if customer exists in WP
                                // get wp customer
                                $wpCustomer = $wpCustomers[$order->CustomerId];
                                // insert wp order
                                if ($this->insertWpOrder($order, $wpProducts, $wpCustomer->ID)) {
                                    $_processedCount++;
                                }

                            } else if ($customer = $this->searchCustomerById($order->CustomerId)) {
                                // create customer first and then insert order for that customer
                                if ($wpCustomerId = $this->insertWpCustomer($customer)) {

                                    if ($this->insertWpOrder($order, $wpProducts, $wpCustomerId)) {
                                        $_processedCount++;
                                    }

                                } else {
                                    $this->log('Order not created because customer already exist with same email address  ' . $customer->Email . ' ');
                                }
                            }
                        }
                    }
                }

                $start += $itemsCount + 1;
                $limit = $start + 1000;
            }
        } catch (Exception $e) {
            $this->log($e->getMessage());

            if ($_errorCount == 0)
                $_messages[] = array("type" => 'error', "message" => "Errors have occurred during the download Orders process, please review the logs. First error occurred is: " . $e->getMessage());

            $_errorCount++;
        } finally {
            //$_processedCount++;
        }

        if ($_errorCount == 0) {
            $_messages[] = array(
                "type" => 'success',
                "message" => sprintf("Download Orders has been completed. %s record(s) processed.", $_processedCount)
            );
        }

        $this->log($_messages);

        return $this->_prepareMessages($_messages);

    }


    /**
     * Sync Products to eConnect
     *
     * @return string
     */
    public function syncItem($id = null)
    {
        global $wpdb;
        $_messages = array();
        $_errorCount = 0;
        $_processedCount = 0;

        $securityToken = $this->_getSecurityToken();

        try {
            $client = new SoapClient($this->_getWsdlUrl(), array('trace' => true, 'exceptions' => true));

            $productsQuery = "SELECT p.*
            FROM " . $this->posts_table . " p
            WHERE p.post_type = 'product'
            AND ((p.ec_last_modified_date = '' OR p.ec_last_modified_date is null)
            OR TIMESTAMPDIFF(minute, p.ec_last_modified_date, IFNULL( p.post_modified, p.post_date )) > 0)
            ";

            //filter if update is for a single record
            if ($id != null) {
                $productsQuery .= " AND p.ID = {$id}";
            }

            foreach ($wpdb->get_results($productsQuery) as $post) {

                $postMeta = array_map(
                    function ($a) {
                        return $a[0];
                    }, get_post_meta($post->ID)
                );

                $product = array_merge((array)$post, $postMeta);

                try {
                    $itemDetails = array(
                        'ItemId' => $product['ID'],
                        'Name' => $product['post_title'],
                        'SKU' => '',
                        'Description' => isset($product['post_excerpt']) ? $product['post_excerpt'] : $product['post_name'],
                        'UnitPrice' => isset($product['_price']) ? floatval($product['_price']) : 0,
                        'UnitCost' => '0',
                        'UnitOfMeasure' => '',
                        'Active' => ($product['post_status'] == 'publish') ? true : false,
                        'ItemType' => 'simple',
                        'QtyOnHand' => isset($product['_stock']) ? floatval($product['_stock']) : 9999,
                        'UPC' => '',
                        'Taxable' => (isset($product['_tax_status']) && $product['_tax_status'] == 'taxable') ? 1 : 0,
                        'TaxRate' => '0',
                        'ItemCategoryId' => '',
                        'TaxCategoryID' => '',
                        'SoftwareId' => $this->software,
                        'ImageUrl' => '',
                        'ItemNotes' => '',
                        'GrossPrice' => 0,
                        'WarrantyDiscount' => 0,
                        'SalesDiscount' => 0,
                    );
                    // insert product
                    if (empty($product['ec_internal_id'])) {
                        $parameters = array(
                            'securityToken' => $securityToken,
                            'itemDetails' => $itemDetails
                        );

                        $this->log($parameters);

                        $addItemResponse = $client->AddItem($parameters);
                        $obj = $addItemResponse->AddItemResult;

                        $this->log('Added product item response: ');
                        $this->log($addItemResponse);

                    } else { // update product
                        if (!empty($product['ec_product_id'])) {
                            $itemDetails['ItemId'] = $product['ec_product_id'];
                        }

                        $parameters = array(
                            'securityToken' => $securityToken,
                            'itemDetails' => $itemDetails,
                            'itemId' => $itemDetails['ItemId'],
                            'itemInternalId' => $product['ec_internal_id']
                        );

                        $this->log('update product: ');
                        $this->log($parameters);

                        $updateItemResponse = $client->UpdateItem($parameters);
                        $obj = $updateItemResponse->UpdateItemResult;

                        $this->log('Updated product response: ');
                        $this->log($updateItemResponse);
                    }

                    if ($obj->Status == "Error") {
                        if ($_errorCount == 0)
                            $_messages[] = array("type" => 'error', "message" => "Errors have occurred during the sync products process, please review the logs. First error occurred is: " . $obj->Error);

                        $_errorCount++;
                    }

                    $whereCondition = array('ID' => (int)$product['ID']);
                    $obj->ec_product_id = $itemDetails['ItemId'];

                    $this->updateWPTable($this->posts_table, $obj, $whereCondition);

                    $this->log('Product info saved');

                } catch (Exception $e) {
                    $this->log($e->getMessage());

                    if ($_errorCount == 0)
                        $_messages[] = array("type" => 'error', "message" => "Errors have occurred during the sync products process, please review the logs. First error occurred is: " . $e->getMessage());

                    $_errorCount++;
                } finally {
                    $_processedCount++;
                }
            }
            array_unshift($_messages, array("type" => 'notice', "message" => sprintf("Sync Products process has been completed. %s record(s) processed.", $_processedCount)));

            if ($_errorCount == 0)
                $_messages[] = array("type" => 'success', "message" => "Completed the sync product process with no errors.");
        } catch (Exception $e) {
            $this->log($e->getMessage());
            $_messages[] = array("type" => 'error', "message" => $e->getMessage());
        }

        $this->log($_messages);

        return $this->_prepareMessages($_messages);
    }

    private function getWpProductsById()
    {
        global $wpdb;

        $productsQuery = "SELECT p.ID, p.ec_product_id
            FROM " . $this->posts_table . " p
            WHERE p.post_type = 'product' AND p.ec_internal_id <> ''";

        return $wpdb->get_results($productsQuery, OBJECT_K);
    }

    /**
     * Return invoice object
     * @param $order
     * @param $customerId
     * @return array
     */
    private function getInvoiceObject($order, $customerId)
    {
        return [
            'InvoiceNumber' => $order['ID'],
            'CustomerId' => $customerId,
            'InvoiceDate' => $order['post_date'],
            'Currency' => $order['_order_currency'],
            'InvoiceAmount' => $order['_order_total'],
            'AmountDue' => $order['_order_total'],
            'InvoiceDueDate' => $order['post_date'],
            'SoNum' => $order['ID'],
            'TotalTaxAmount' => $order['_order_tax'],
            'InvoiceUniqueId' => $order['ID'],
            'InvoiceDescription' => isset($order['_billing_address_index']) ? $order['_billing_address_index'] : 'Order# ' . $order['ID'],
            'NotifyCustomer' => 'false',
            'Software' => $this->software,
        ];
    }

    /**
     * Sync order Invoices and payment to eConnect
     * @param null $id
     * @return string
     */
    public function syncInvoice($id = null)
    {
        global $wpdb;
        $_messages = array();
        $_errorCount = 0;
        $_processedCount = 0;

        $securityToken = $this->_getSecurityToken();

        try {

            $client = new SoapClient($this->_getWsdlUrl(), array('trace' => true, 'exceptions' => true));

            $query = "SELECT p.* FROM " . $this->posts_table . " p WHERE p.post_type = 'shop_order' AND p.post_status IN ('wc-completed', 'wc-processing')";
            //filter if update is for a single record

            if ($id != null) {
                $query .= " AND p.ID = {$id}";
            } else {
                $query .= " AND ((p.ec_last_modified_date = '' OR p.ec_last_modified_date is null)
                    OR TIMESTAMPDIFF(minute, p.ec_last_modified_date, IFNULL( p.post_modified, p.post_date )) > 0)";
            }

            $wpOrders = $wpdb->get_results($query);

            if (!empty($wpOrders)) {

                $wpProducts = $this->getWpProductsById();

                foreach ($wpOrders as $post) {

                    $postMeta = array_map(function ($a) {
                        return $a[0];
                    }, get_post_meta($post->ID));

                    $order = array_merge((array)$post, $postMeta);

                    if (isset($order['_payment_status']) && $order['_payment_status'] != 'Captured') {
                        $this->log('Order payment status is not captured. skipping this invoice Order#' . $order['ID'] . ' payment status: ' . $order['_payment_status']);
                        continue;
                    }

                    if (intval($order['_customer_user']) > 0) {
                        $customerId = intval($order['_customer_user']);
                        if ($user = $wpdb->get_row($wpdb->prepare("SELECT * FROM $wpdb->users WHERE ID = %s LIMIT 1", $customerId))) {
                            $customerId = !empty($user->ec_customer_id) ? $user->ec_customer_id : $customerId;
                        }
                    } else {
                        $this->log('Invoice cannot be created for Guest customer order. WC Order#' . $order['ID']);
                        continue;
                    }

                    try {

                        $invoice = $this->getInvoiceObject($order, $customerId);
                        $lineItems = $this->getOrderItems($order['ID'], $wpProducts);

                        if (count($lineItems) > 0) {
                            $invoice['Items'] = $lineItems;
                        }
                        // add invoice
                        if (empty($order['ec_internal_id'])) {

                            $parameters = array(
                                'securityToken' => $securityToken,
                                'invoice' => $invoice
                            );

                            $this->log("Add invoice item params: ");
                            $this->log($parameters);

                            $addInvoiceResponse = $client->AddInvoice($parameters);
                            $syncInvoiceResult = $addInvoiceResponse->AddInvoiceResult;

                            $this->log("Added invoice response: ");
                            $this->log($addInvoiceResponse);

                            // add invoice payment
                            $tranNo = isset($order['_transaction_id']) ? $order['_transaction_id'] : false;
                            $custNo = isset($order['CustNum']) ? $order['CustNum'] : 0;
                            if ($syncInvoiceResult->Status == "Success" && !empty($tranNo)) {

                                $paymentDetails[0] = [
                                    'InvoiceInternalId' => $syncInvoiceResult->InvoiceInternalId,
                                    'PaidAmount' => $invoice['InvoiceAmount'],
                                    'Currency' => $invoice['Currency'],
                                ];
                                $paymentParms = [
                                    'securityToken' => $securityToken,
                                    'payment' => [
                                        'InvoicePaymentDetails' => $paymentDetails,
                                        'CustomerId' => $customerId,
                                        'RefNum' => $tranNo,
                                        'Currency' => $invoice['Currency'],
                                        'TotalPaidAmount' => $invoice['InvoiceAmount'],
                                        'CustNum' => $custNo,
                                        'PaymentMethodId' => '?',
                                        'PaymentMethodType' => '?',
                                        'Software' => $this->software,
                                    ],
                                ];

                                $this->log('Add invoice payment result: ');
                                $invoicePaymentResult = $client->AddInvoicePayment($paymentParms);
                                $this->log($invoicePaymentResult);
                            } else {
                                $this->log('Invoice payment not added for order# ' . $order['ID']);
                            }

                        } else { // update invoice
                            // use econnect customerId in update
                            if (!empty($order['ec_customer_id'])) {
                                $invoice['CustomerId'] = $order['ec_customer_id'];
                            }
                            // use econnect invoice id in update
                            if (!empty($order['ec_invoice_id'])) {
                                $invoice['InvoiceNumber'] = $order['ec_invoice_id'];
                                $invoice['SoNum'] = $order['ec_invoice_id'];
                                $invoice['InvoiceUniqueId'] = $order['ec_invoice_id'];
                            }

                            $parameters = array(
                                'securityToken' => $securityToken,
                                'invoice' => $invoice,
                                'invoiceNumber' => $invoice['InvoiceNumber'],
                                'invoiceInternalId' => $order['ec_internal_id']
                            );

                            $this->log('Update invoice item with params: ');
                            $this->log($parameters);

                            $updateInvoiceResponse = $client->UpdateInvoice($parameters);
                            $syncInvoiceResult = $updateInvoiceResponse->UpdateInvoiceResult;

                            $this->log('updated item response: ');
                            $this->log($updateInvoiceResponse);
                        }

                        if ($syncInvoiceResult->Status == "Error") {
                            if ($_errorCount == 0)
                                $_messages[] = array("type" => 'error', "message" => "Errors have occurred during the Invoice sync process, please review the logs. First error occurred is: " . $syncInvoiceResult->Error);

                            $_errorCount++;
                        }

                        $whereCondition = array('ID' => (int)$order['ID']);
                        $syncInvoiceResult->ec_invoice_id = $invoice['InvoiceNumber'];

                        if (empty($order['ec_customer_id'])) {
                            $syncInvoiceResult->ec_customer_id = $invoice['CustomerId'];
                        }

                        $this->updateWPTable($this->posts_table, $syncInvoiceResult, $whereCondition);

                        $this->log('Invoice info saved.' . $syncInvoiceResult->ec_invoice_id);


                    } catch (Exception $e) {
                        $this->log($e->getMessage());

                        if ($_errorCount == 0)
                            $_messages[] = array("type" => 'error', "message" => "Errors have occurred during the Invoice sync process, please review the logs.
                        First error occurred is: " . $e->getMessage());

                        $_errorCount++;
                    } finally {
                        $_processedCount++;
                    }
                }
            }

            array_unshift($_messages, array("type" => 'notice', "message" => sprintf("Sync Invoices process has been completed. %s record(s) processed.", $_processedCount)));

            if ($_errorCount == 0)
                $_messages[] = array("type" => 'success', "message" => "Completed the Invoice sync process with no errors.");

        } catch (Exception $e) {
            $this->log($e->getMessage());
            $_messages[] = array("type" => 'error', "message" => $e->getMessage());
        }

        $this->log($_messages);
        return $this->_prepareMessages($_messages);
    }

    /**
     * return order object
     * @param $order
     * @param $customerId
     * @return array
     */
    private function getOrderObject($order, $customerId)
    {
        $paymentStatus = isset($order['_payment_status']) ? $order['_payment_status'] : '';

        return [
            'SalesOrderNumber' => $order['ID'],
            'CustomerId' => $customerId,
            'Date' => $order['post_date'],
            'Currency' => $order['_order_currency'],
            'Amount' => $order['_order_total'],
            'DueDate' => $order['post_date'],
            'DateUploaded' => $order['post_date'],
            'AmountDue' => ($paymentStatus == 'Captured') ? '0' : $order['_order_total'],
            'PoNum' => $order['ID'],
            'TotalTaxAmount' => $order['_order_tax'],
            'Description' => isset($order['_billing_address_index']) ? $order['_billing_address_index'] : 'Order# ' . $order['ID'],
            'NotifyCustomer' => 'false',
            'BillingAddress' => $this->getOrderBillingAddress($order),
            'ShippingAddress' => $this->getOrderShippingAddress($order),
            'Memo' => 'No',
            'ShipDate' => $order['post_date'],
            'ShipVia' => 'NA',
            'IsToBeEmailed' => 'false',
            'IsToBePrinted' => 'false',
            'UniqueId' => $order['ID'],
            'Software' => $this->software,
        ];
    }

    /**
     * Sync order and transaction to eConnect
     * @param null $id
     * @param null $tranNo
     * @param null $tranType
     * @return string
     */
    public function syncOrder($id = null)
    {
        global $wpdb;
        $_messages = array();
        $_errorCount = 0;
        $_processedCount = 0;

        try {

            $securityToken = $this->_getSecurityToken();
            $client = new SoapClient($this->_getWsdlUrl(), array('trace' => true, 'exceptions' => true));

            $query = "SELECT p.* FROM " . $this->posts_table . " p WHERE p.post_type = 'shop_order' AND p.post_status IN ('wc-processing', 'wc-completed')";

            //filter if update is for a single record
            if ($id != null) {
                $query .= " AND p.ID = {$id}";
            } else {
                $query .= " AND ((p.ec_order_last_modified_date = '' OR p.ec_order_last_modified_date is null)
                    OR TIMESTAMPDIFF(minute, p.ec_order_last_modified_date, IFNULL( p.post_modified, p.post_date )) > 0)";
            }

            $wpOrders = $wpdb->get_results($query);

            if (!empty($wpOrders)) {

                $wpProducts = $this->getWpProductsById();

                foreach ($wpOrders as $post) {

                    $postMeta = array_map(function ($a) {
                        return $a[0];
                    }, get_post_meta($post->ID));

                    $order = array_merge((array)$post, $postMeta);
                    // if No customer: Adding Record error. Cannot insert the value NULL into column 'PayerInternalId', table 'ebizportalgroup1-db.dbo.SalesOrders'; column does not allow nulls. INSERT fails.

                    try {
                        $customerInternalId = null;

                        if (intval($order['_customer_user']) > 0) {
                            $customerId = intval($order['_customer_user']);
                            if ($user = $wpdb->get_row($wpdb->prepare("SELECT * FROM $wpdb->users WHERE ID = %s LIMIT 1", $customerId))) {
                                $customerId = !empty($user->ec_customer_id) ? $user->ec_customer_id : $customerId;
                                $customerInternalId = $user->ec_internal_id;
                            }
                        } else {
                            $customerId = 'Guest';
                        }

                        $salesOrder = $this->getOrderObject($order, $customerId);

                        $lineItems = $this->getOrderItems($order['ID'], $wpProducts);

                        if (count($lineItems) > 0) {
                            $salesOrder['Items'] = $lineItems;
                        }
                        // add sales order
                        if (empty($order['ec_order_internal_id'])) {

                            $parameters = array(
                                'securityToken' => $securityToken,
                                'salesOrder' => $salesOrder
                            );

                            $this->log("Add sales order params: ");
                            $this->log($parameters);

                            $addOrderResponse = $client->AddSalesOrder($parameters);
                            $syncOrderResult = $addOrderResponse->AddSalesOrderResult;

                            $this->log("Added sales order response: ");
                            $this->log($addOrderResponse);

                            $tranNo = isset($order['_transaction_id']) ? $order['_transaction_id'] : false;

                            if ($syncOrderResult->Status == "Success" && !empty($tranNo) && !empty($customerInternalId)) {
                                $paymentStatus = (isset($order['_payment_status']) && $order['_payment_status'] == 'Captured') ? 'sale' : 'authonly';
                                // sync transaction
                                $addTranResult = $client->AddApplicationTransaction(array(
                                    'securityToken' => $securityToken,
                                    'applicationTransactionRequest' => [
                                        'CustomerInternalId' => $customerInternalId,
                                        'TransactionId' => $tranNo,
                                        'TransactionTypeId' => $paymentStatus,
                                        'LinkedToTypeId' => 'SalesOrder',
                                        'LinkedToExternalUniqueId' => $order['ID'],
                                        'LinkedToInternalId' => $syncOrderResult->SalesOrderInternalId,
                                        'SoftwareId' => $this->software,
                                        'TransactionDate' => date('Y-m-d H:i:s'),
                                        'TransactionNotes' => 'Order Id: ' . $order['ID'],
                                    ]
                                ));

                                $this->log('success: application transaction added for WC Order# ' . $order['ID'] . ' Response:');
                                $this->log($addTranResult);

                            } else {
                                $this->log('Failed: application transaction not added. WC Order#: ' . $order['ID'] . ' CustomerInternalId: ' . $customerInternalId . ' transaction No#:' . $tranNo);
                            }

                        } else { // update order
                            // use econnect customerId in update
                            if (!empty($order['ec_customer_id']) && $order['ec_customer_id'] != 'Guest') {
                                $salesOrder['CustomerId'] = $order['ec_customer_id'];
                            }
                            // use econnect orderId in update
                            if (!empty($order['ec_order_id'])) {
                                $salesOrder['SalesOrderNumber'] = $order['ec_order_id'];
                                $salesOrder['PoNum'] = $order['ec_order_id'];
                                $salesOrder['UniqueId'] = $order['ec_order_id'];
                            }

                            $parameters = array(
                                'securityToken' => $securityToken,
                                'salesOrder' => $salesOrder,
                                'SalesOrderNumber' => $order['ID'],
                                'salesOrderInternalId' => $order['ec_order_internal_id']
                            );

                            $this->log('Update sales order with params: ');
                            $this->log($parameters);

                            $updateOrderResponse = $client->UpdateSalesOrder($parameters);
                            $syncOrderResult = $updateOrderResponse->UpdateSalesOrderResult;

                            $this->log('updated Sales order response: ');
                            $this->log($updateOrderResponse);
                        }

                        if ($syncOrderResult->Status == "Error") {
                            if ($_errorCount == 0)
                                $_messages[] = array(
                                    'type' => 'error',
                                    'message' => 'Errors have occurred during the Sales order sync process, please review the logs. First error occurred is: ' . $syncOrderResult->Error
                                );

                            $_errorCount++;
                        }

                        $now = new DateTime(null);
                        $now->modify("+10 seconds"); //add 10 seconds to make sure sync last_modified_date is greater than object update date
                        $data = array();
                        $data['ec_order_internal_id'] = $syncOrderResult->SalesOrderInternalId;
                        $data['ec_order_status'] = $syncOrderResult->Status;
                        $data['ec_order_error'] = $syncOrderResult->Error;
                        $data['ec_order_last_modified_date'] = $now->format('Y-m-d H:i:s');
                        if (empty($order['ec_order_id'])) {
                            $data['ec_order_id'] = (int)$order['ID'];
                        }
                        if (empty($order['ec_customer_id'])) {
                            $data['ec_customer_id'] = $salesOrder['CustomerId'];
                        }

                        $whereCondition = array('ID' => (int)$order['ID']);

                        $wpdb->update($this->posts_table, $data, $whereCondition);

                        $this->log('Sales order info saved. Order ID:' . (int)$order['ID']);

                    } catch (Exception $e) {
                        $this->log($e->getMessage());

                        if ($_errorCount == 0)
                            $_messages[] = array("type" => 'error', "message" => "Errors have occurred during the Sales orders sync process, please review the logs.
                        First error occurred is: " . $e->getMessage());

                        $_errorCount++;
                    } finally {
                        $_processedCount++;
                    }

                }
            }

            array_unshift($_messages, array("type" => 'notice', "message" => sprintf("Sync Orders process has been completed. %s record(s) processed.", $_processedCount)));

            if ($_errorCount == 0)
                $_messages[] = array("type" => 'success', "message" => "Completed the Sales order sync process with no errors.");

        } catch (Exception $e) {
            $this->log($e->getMessage());
            $_messages[] = array("type" => 'error', "message" => $e->getMessage());
        }

        $this->log($_messages);
        return $this->_prepareMessages($_messages);
    }

    function getOrderBillingAddress($order)
    {
        if (isset($order['_billing_first_name']) && !empty($order['_billing_first_name'])) {
            return array(
                'FirstName' => isset($order['_billing_first_name']) ? $order['_billing_first_name'] : '',
                'LastName' => isset($order['_billing_last_name']) ? $order['_billing_last_name'] : '',
                'CompanyName' => isset($order['_billing_company']) ? $order['_billing_company'] : '',
                'Address1' => isset($order['_billing_address_1']) ? $order['_billing_address_1'] : 'N/A',
                'Address2' => isset($order['_billing_address_2']) ? $order['_billing_address_2'] : 'N/A',
                'City' => isset($order['_billing_city']) ? $order['_billing_city'] : 'N/A',
                'State' => isset($order['_billing_state']) ? $order['_billing_state'] : 'N/A',
                'ZipCode' => isset($order['_billing_postcode']) ? $order['_billing_postcode'] : 'N/A',
                'Country' => isset($order['_billing_country']) ? $order['_billing_country'] : 'N/A',
                'IsDefault' => false
            );
        }

        return [];
    }

    function getOrderShippingAddress($order)
    {
        if (isset($order['_shipping_first_name']) && !empty($order['_shipping_first_name'])) {
            return array(
                'FirstName' => isset($order['_shipping_first_name']) ? $order['_shipping_first_name'] : '',
                'LastName' => isset($order['_shipping_last_name']) ? $order['_shipping_last_name'] : '',
                'CompanyName' => isset($order['_shipping_company']) ? $order['_shipping_company'] : '',
                'Address1' => isset($order['_shipping_address_1']) ? $order['_shipping_address_1'] : 'N/A',
                'Address2' => isset($order['_shipping_address_2']) ? $order['_shipping_address_2'] : 'N/A',
                'City' => isset($order['_shipping_city']) ? $order['_shipping_city'] : 'N/A',
                'State' => isset($order['_shipping_state']) ? $order['_shipping_state'] : 'N/A',
                'ZipCode' => isset($order['_shipping_postcode']) ? $order['_shipping_postcode'] : 'N/A',
                'Country' => isset($order['_shipping_country']) ? $order['_shipping_country'] : 'N/A',
                'IsDefault' => false,
            );
        }

        return [];
    }

    function getOrderItems($orderId, $wpProducts)
    {
        $lineItems = array();
        $lineNumber = 0;

        $order = wc_get_order($orderId);
        // Iterating through each WC_Order_Item_Product objects
        foreach ($order->get_items() as $key => $item) {

            $product = $item->get_product(); // the WC_Product object

            ## Access Order Items data properties (in an array of values) ##
            $item_data = $item->get_data();
            if (array_key_exists($item_data['product_id'], $wpProducts)) {
                $tempProduct = $wpProducts[$item_data['product_id']];
                $productId = $tempProduct->ec_product_id;
            } else {
                $productId = $item_data['product_id'];
            }

            $lineItems[] = array(
                'ItemId' => $productId,
                'Name' => $item_data['name'],
                'Description' => $item_data['name'],
                'UnitPrice' => is_object($product) ? $product->get_price() : $item_data['total'],
                'Qty' => $item_data['quantity'],
                'Taxable' => ($item_data['total_tax']) > 0 ? true : false,
                'TaxRate' => '0',
                'TotalLineAmount' => $item_data['total'],
                'TotalLineTax' => $item_data['total_tax'],
                'ItemLineNumber' => ++$lineNumber,
                'GrossPrice' => 0,
                'WarrantyDiscount' => 0,
                'SalesDiscount' => 0,
            );
        }

        return $lineItems;
    }

    public function log($msg)
    {
        try {

            if (!is_string($msg)) {
                $msg = print_r($msg, true);
            }

            $file = fopen(plugin_dir_path(__FILE__) . "econnect.log", "a");
            @fwrite($file, "\n" . date('d-M-Y h:i:s') . " :: " . $msg);
            @fclose($file);

        } catch (Exception $e) {

        }
    }

}