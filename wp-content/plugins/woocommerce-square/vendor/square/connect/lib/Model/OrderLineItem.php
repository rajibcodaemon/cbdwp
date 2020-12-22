<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace SquareConnect\Model;

use \ArrayAccess;
/**
 * OrderLineItem Class Doc Comment
 *
 * @category Class
 * @package  SquareConnect
 * @author   Square Inc.
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache License v2
 * @link     https://squareup.com/developers
 */
class OrderLineItem implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'uid' => 'string',
        'name' => 'string',
        'quantity' => 'string',
        'quantity_unit' => '\SquareConnect\Model\OrderQuantityUnit',
        'note' => 'string',
        'catalog_object_id' => 'string',
        'variation_name' => 'string',
        'modifiers' => '\SquareConnect\Model\OrderLineItemModifier[]',
        'taxes' => '\SquareConnect\Model\OrderLineItemTax[]',
        'discounts' => '\SquareConnect\Model\OrderLineItemDiscount[]',
        'applied_taxes' => '\SquareConnect\Model\OrderLineItemAppliedTax[]',
        'applied_discounts' => '\SquareConnect\Model\OrderLineItemAppliedDiscount[]',
        'base_price_money' => '\SquareConnect\Model\Money',
        'variation_total_price_money' => '\SquareConnect\Model\Money',
        'gross_sales_money' => '\SquareConnect\Model\Money',
        'total_tax_money' => '\SquareConnect\Model\Money',
        'total_discount_money' => '\SquareConnect\Model\Money',
        'total_money' => '\SquareConnect\Model\Money'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'uid' => 'uid',
        'name' => 'name',
        'quantity' => 'quantity',
        'quantity_unit' => 'quantity_unit',
        'note' => 'note',
        'catalog_object_id' => 'catalog_object_id',
        'variation_name' => 'variation_name',
        'modifiers' => 'modifiers',
        'taxes' => 'taxes',
        'discounts' => 'discounts',
        'applied_taxes' => 'applied_taxes',
        'applied_discounts' => 'applied_discounts',
        'base_price_money' => 'base_price_money',
        'variation_total_price_money' => 'variation_total_price_money',
        'gross_sales_money' => 'gross_sales_money',
        'total_tax_money' => 'total_tax_money',
        'total_discount_money' => 'total_discount_money',
        'total_money' => 'total_money'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'uid' => 'setUid',
        'name' => 'setName',
        'quantity' => 'setQuantity',
        'quantity_unit' => 'setQuantityUnit',
        'note' => 'setNote',
        'catalog_object_id' => 'setCatalogObjectId',
        'variation_name' => 'setVariationName',
        'modifiers' => 'setModifiers',
        'taxes' => 'setTaxes',
        'discounts' => 'setDiscounts',
        'applied_taxes' => 'setAppliedTaxes',
        'applied_discounts' => 'setAppliedDiscounts',
        'base_price_money' => 'setBasePriceMoney',
        'variation_total_price_money' => 'setVariationTotalPriceMoney',
        'gross_sales_money' => 'setGrossSalesMoney',
        'total_tax_money' => 'setTotalTaxMoney',
        'total_discount_money' => 'setTotalDiscountMoney',
        'total_money' => 'setTotalMoney'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'uid' => 'getUid',
        'name' => 'getName',
        'quantity' => 'getQuantity',
        'quantity_unit' => 'getQuantityUnit',
        'note' => 'getNote',
        'catalog_object_id' => 'getCatalogObjectId',
        'variation_name' => 'getVariationName',
        'modifiers' => 'getModifiers',
        'taxes' => 'getTaxes',
        'discounts' => 'getDiscounts',
        'applied_taxes' => 'getAppliedTaxes',
        'applied_discounts' => 'getAppliedDiscounts',
        'base_price_money' => 'getBasePriceMoney',
        'variation_total_price_money' => 'getVariationTotalPriceMoney',
        'gross_sales_money' => 'getGrossSalesMoney',
        'total_tax_money' => 'getTotalTaxMoney',
        'total_discount_money' => 'getTotalDiscountMoney',
        'total_money' => 'getTotalMoney'
    );
  
    /**
      * $uid Unique ID that identifies the line item only within this order.
      * @var string
      */
    protected $uid;
    /**
      * $name The name of the line item.
      * @var string
      */
    protected $name;
    /**
      * $quantity The quantity purchased, formatted as a decimal number. For example: `\"3\"`.  Line items with a `quantity_unit` can have non-integer quantities. For example: `\"1.70000\"`.
      * @var string
      */
    protected $quantity;
    /**
      * $quantity_unit The unit and precision that this line item's quantity is measured in.
      * @var \SquareConnect\Model\OrderQuantityUnit
      */
    protected $quantity_unit;
    /**
      * $note The note of the line item.
      * @var string
      */
    protected $note;
    /**
      * $catalog_object_id The [CatalogItemVariation](#type-catalogitemvariation) id applied to this line item.
      * @var string
      */
    protected $catalog_object_id;
    /**
      * $variation_name The name of the variation applied to this line item.
      * @var string
      */
    protected $variation_name;
    /**
      * $modifiers The [CatalogModifier](#type-catalogmodifier)s applied to this line item.
      * @var \SquareConnect\Model\OrderLineItemModifier[]
      */
    protected $modifiers;
    /**
      * $taxes A list of taxes applied to this line item. On read or retrieve, this list includes both item-level taxes and any order-level taxes apportioned to this item. When creating an Order, set your item-level taxes in this list.  This field has been deprecated in favour of `applied_taxes`. Usage of both this field and `applied_taxes` when creating an order will result in an error. Usage of this field when sending requests to the UpdateOrder endpoint will result in an error.
      * @var \SquareConnect\Model\OrderLineItemTax[]
      */
    protected $taxes;
    /**
      * $discounts A list of discounts applied to this line item. On read or retrieve, this list includes both item-level discounts and any order-level discounts apportioned to this item. When creating an Order, set your item-level discounts in this list.  This field has been deprecated in favour of `applied_discounts`. Usage of both this field and `applied_discounts` when creating an order will result in an error. Usage of this field when sending requests to the UpdateOrder endpoint will result in an error.
      * @var \SquareConnect\Model\OrderLineItemDiscount[]
      */
    protected $discounts;
    /**
      * $applied_taxes The list of references to taxes applied to this line item. Each `OrderLineItemAppliedTax` has a `tax_uid` that references the `uid` of a top-level `OrderLineItemTax` applied to the line item. On reads, the amount applied is populated.  An `OrderLineItemAppliedTax` will be automatically created on every line item for all `ORDER` scoped taxes added to the order. `OrderLineItemAppliedTax` records for `LINE_ITEM` scoped taxes must be added in requests for the tax to apply to any line items.  To change the amount of a tax, modify the referenced top-level tax.
      * @var \SquareConnect\Model\OrderLineItemAppliedTax[]
      */
    protected $applied_taxes;
    /**
      * $applied_discounts The list of references to discounts applied to this line item. Each `OrderLineItemAppliedDiscount` has a `discount_uid` that references the `uid` of a top-level `OrderLineItemDiscounts` applied to the line item. On reads, the amount applied is populated.  An `OrderLineItemAppliedDiscount` will be automatically created on every line item for all `ORDER` scoped discounts that are added to the order. `OrderLineItemAppliedDiscount` records for `LINE_ITEM` scoped discounts must be added in requests for the discount to apply to any line items.  To change the amount of a discount, modify the referenced top-level discount.
      * @var \SquareConnect\Model\OrderLineItemAppliedDiscount[]
      */
    protected $applied_discounts;
    /**
      * $base_price_money The base price for a single unit of the line item.
      * @var \SquareConnect\Model\Money
      */
    protected $base_price_money;
    /**
      * $variation_total_price_money The total price of all item variations sold in this line item. Calculated as `base_price_money` multiplied by `quantity`. Does not include modifiers.
      * @var \SquareConnect\Model\Money
      */
    protected $variation_total_price_money;
    /**
      * $gross_sales_money The amount of money made in gross sales for this line item. Calculated as the sum of the variation's total price and each modifier's total price.
      * @var \SquareConnect\Model\Money
      */
    protected $gross_sales_money;
    /**
      * $total_tax_money The total tax amount of money to collect for the line item.
      * @var \SquareConnect\Model\Money
      */
    protected $total_tax_money;
    /**
      * $total_discount_money The total discount amount of money to collect for the line item.
      * @var \SquareConnect\Model\Money
      */
    protected $total_discount_money;
    /**
      * $total_money The total amount of money to collect for this line item.
      * @var \SquareConnect\Model\Money
      */
    protected $total_money;

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initializing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            if (isset($data["uid"])) {
              $this->uid = $data["uid"];
            } else {
              $this->uid = null;
            }
            if (isset($data["name"])) {
              $this->name = $data["name"];
            } else {
              $this->name = null;
            }
            if (isset($data["quantity"])) {
              $this->quantity = $data["quantity"];
            } else {
              $this->quantity = null;
            }
            if (isset($data["quantity_unit"])) {
              $this->quantity_unit = $data["quantity_unit"];
            } else {
              $this->quantity_unit = null;
            }
            if (isset($data["note"])) {
              $this->note = $data["note"];
            } else {
              $this->note = null;
            }
            if (isset($data["catalog_object_id"])) {
              $this->catalog_object_id = $data["catalog_object_id"];
            } else {
              $this->catalog_object_id = null;
            }
            if (isset($data["variation_name"])) {
              $this->variation_name = $data["variation_name"];
            } else {
              $this->variation_name = null;
            }
            if (isset($data["modifiers"])) {
              $this->modifiers = $data["modifiers"];
            } else {
              $this->modifiers = null;
            }
            if (isset($data["taxes"])) {
              $this->taxes = $data["taxes"];
            } else {
              $this->taxes = null;
            }
            if (isset($data["discounts"])) {
              $this->discounts = $data["discounts"];
            } else {
              $this->discounts = null;
            }
            if (isset($data["applied_taxes"])) {
              $this->applied_taxes = $data["applied_taxes"];
            } else {
              $this->applied_taxes = null;
            }
            if (isset($data["applied_discounts"])) {
              $this->applied_discounts = $data["applied_discounts"];
            } else {
              $this->applied_discounts = null;
            }
            if (isset($data["base_price_money"])) {
              $this->base_price_money = $data["base_price_money"];
            } else {
              $this->base_price_money = null;
            }
            if (isset($data["variation_total_price_money"])) {
              $this->variation_total_price_money = $data["variation_total_price_money"];
            } else {
              $this->variation_total_price_money = null;
            }
            if (isset($data["gross_sales_money"])) {
              $this->gross_sales_money = $data["gross_sales_money"];
            } else {
              $this->gross_sales_money = null;
            }
            if (isset($data["total_tax_money"])) {
              $this->total_tax_money = $data["total_tax_money"];
            } else {
              $this->total_tax_money = null;
            }
            if (isset($data["total_discount_money"])) {
              $this->total_discount_money = $data["total_discount_money"];
            } else {
              $this->total_discount_money = null;
            }
            if (isset($data["total_money"])) {
              $this->total_money = $data["total_money"];
            } else {
              $this->total_money = null;
            }
        }
    }
    /**
     * Gets uid
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }
  
    /**
     * Sets uid
     * @param string $uid Unique ID that identifies the line item only within this order.
     * @return $this
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
        return $this;
    }
    /**
     * Gets name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
  
    /**
     * Sets name
     * @param string $name The name of the line item.
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    /**
     * Gets quantity
     * @return string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
  
    /**
     * Sets quantity
     * @param string $quantity The quantity purchased, formatted as a decimal number. For example: `\"3\"`.  Line items with a `quantity_unit` can have non-integer quantities. For example: `\"1.70000\"`.
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }
    /**
     * Gets quantity_unit
     * @return \SquareConnect\Model\OrderQuantityUnit
     */
    public function getQuantityUnit()
    {
        return $this->quantity_unit;
    }
  
    /**
     * Sets quantity_unit
     * @param \SquareConnect\Model\OrderQuantityUnit $quantity_unit The unit and precision that this line item's quantity is measured in.
     * @return $this
     */
    public function setQuantityUnit($quantity_unit)
    {
        $this->quantity_unit = $quantity_unit;
        return $this;
    }
    /**
     * Gets note
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }
  
    /**
     * Sets note
     * @param string $note The note of the line item.
     * @return $this
     */
    public function setNote($note)
    {
        $this->note = $note;
        return $this;
    }
    /**
     * Gets catalog_object_id
     * @return string
     */
    public function getCatalogObjectId()
    {
        return $this->catalog_object_id;
    }
  
    /**
     * Sets catalog_object_id
     * @param string $catalog_object_id The [CatalogItemVariation](#type-catalogitemvariation) id applied to this line item.
     * @return $this
     */
    public function setCatalogObjectId($catalog_object_id)
    {
        $this->catalog_object_id = $catalog_object_id;
        return $this;
    }
    /**
     * Gets variation_name
     * @return string
     */
    public function getVariationName()
    {
        return $this->variation_name;
    }
  
    /**
     * Sets variation_name
     * @param string $variation_name The name of the variation applied to this line item.
     * @return $this
     */
    public function setVariationName($variation_name)
    {
        $this->variation_name = $variation_name;
        return $this;
    }
    /**
     * Gets modifiers
     * @return \SquareConnect\Model\OrderLineItemModifier[]
     */
    public function getModifiers()
    {
        return $this->modifiers;
    }
  
    /**
     * Sets modifiers
     * @param \SquareConnect\Model\OrderLineItemModifier[] $modifiers The [CatalogModifier](#type-catalogmodifier)s applied to this line item.
     * @return $this
     */
    public function setModifiers($modifiers)
    {
        $this->modifiers = $modifiers;
        return $this;
    }
    /**
     * Gets taxes
     * @return \SquareConnect\Model\OrderLineItemTax[]
     */
    public function getTaxes()
    {
        return $this->taxes;
    }
  
    /**
     * Sets taxes
     * @param \SquareConnect\Model\OrderLineItemTax[] $taxes A list of taxes applied to this line item. On read or retrieve, this list includes both item-level taxes and any order-level taxes apportioned to this item. When creating an Order, set your item-level taxes in this list.  This field has been deprecated in favour of `applied_taxes`. Usage of both this field and `applied_taxes` when creating an order will result in an error. Usage of this field when sending requests to the UpdateOrder endpoint will result in an error.
     * @return $this
     */
    public function setTaxes($taxes)
    {
        $this->taxes = $taxes;
        return $this;
    }
    /**
     * Gets discounts
     * @return \SquareConnect\Model\OrderLineItemDiscount[]
     */
    public function getDiscounts()
    {
        return $this->discounts;
    }
  
    /**
     * Sets discounts
     * @param \SquareConnect\Model\OrderLineItemDiscount[] $discounts A list of discounts applied to this line item. On read or retrieve, this list includes both item-level discounts and any order-level discounts apportioned to this item. When creating an Order, set your item-level discounts in this list.  This field has been deprecated in favour of `applied_discounts`. Usage of both this field and `applied_discounts` when creating an order will result in an error. Usage of this field when sending requests to the UpdateOrder endpoint will result in an error.
     * @return $this
     */
    public function setDiscounts($discounts)
    {
        $this->discounts = $discounts;
        return $this;
    }
    /**
     * Gets applied_taxes
     * @return \SquareConnect\Model\OrderLineItemAppliedTax[]
     */
    public function getAppliedTaxes()
    {
        return $this->applied_taxes;
    }
  
    /**
     * Sets applied_taxes
     * @param \SquareConnect\Model\OrderLineItemAppliedTax[] $applied_taxes The list of references to taxes applied to this line item. Each `OrderLineItemAppliedTax` has a `tax_uid` that references the `uid` of a top-level `OrderLineItemTax` applied to the line item. On reads, the amount applied is populated.  An `OrderLineItemAppliedTax` will be automatically created on every line item for all `ORDER` scoped taxes added to the order. `OrderLineItemAppliedTax` records for `LINE_ITEM` scoped taxes must be added in requests for the tax to apply to any line items.  To change the amount of a tax, modify the referenced top-level tax.
     * @return $this
     */
    public function setAppliedTaxes($applied_taxes)
    {
        $this->applied_taxes = $applied_taxes;
        return $this;
    }
    /**
     * Gets applied_discounts
     * @return \SquareConnect\Model\OrderLineItemAppliedDiscount[]
     */
    public function getAppliedDiscounts()
    {
        return $this->applied_discounts;
    }
  
    /**
     * Sets applied_discounts
     * @param \SquareConnect\Model\OrderLineItemAppliedDiscount[] $applied_discounts The list of references to discounts applied to this line item. Each `OrderLineItemAppliedDiscount` has a `discount_uid` that references the `uid` of a top-level `OrderLineItemDiscounts` applied to the line item. On reads, the amount applied is populated.  An `OrderLineItemAppliedDiscount` will be automatically created on every line item for all `ORDER` scoped discounts that are added to the order. `OrderLineItemAppliedDiscount` records for `LINE_ITEM` scoped discounts must be added in requests for the discount to apply to any line items.  To change the amount of a discount, modify the referenced top-level discount.
     * @return $this
     */
    public function setAppliedDiscounts($applied_discounts)
    {
        $this->applied_discounts = $applied_discounts;
        return $this;
    }
    /**
     * Gets base_price_money
     * @return \SquareConnect\Model\Money
     */
    public function getBasePriceMoney()
    {
        return $this->base_price_money;
    }
  
    /**
     * Sets base_price_money
     * @param \SquareConnect\Model\Money $base_price_money The base price for a single unit of the line item.
     * @return $this
     */
    public function setBasePriceMoney($base_price_money)
    {
        $this->base_price_money = $base_price_money;
        return $this;
    }
    /**
     * Gets variation_total_price_money
     * @return \SquareConnect\Model\Money
     */
    public function getVariationTotalPriceMoney()
    {
        return $this->variation_total_price_money;
    }
  
    /**
     * Sets variation_total_price_money
     * @param \SquareConnect\Model\Money $variation_total_price_money The total price of all item variations sold in this line item. Calculated as `base_price_money` multiplied by `quantity`. Does not include modifiers.
     * @return $this
     */
    public function setVariationTotalPriceMoney($variation_total_price_money)
    {
        $this->variation_total_price_money = $variation_total_price_money;
        return $this;
    }
    /**
     * Gets gross_sales_money
     * @return \SquareConnect\Model\Money
     */
    public function getGrossSalesMoney()
    {
        return $this->gross_sales_money;
    }
  
    /**
     * Sets gross_sales_money
     * @param \SquareConnect\Model\Money $gross_sales_money The amount of money made in gross sales for this line item. Calculated as the sum of the variation's total price and each modifier's total price.
     * @return $this
     */
    public function setGrossSalesMoney($gross_sales_money)
    {
        $this->gross_sales_money = $gross_sales_money;
        return $this;
    }
    /**
     * Gets total_tax_money
     * @return \SquareConnect\Model\Money
     */
    public function getTotalTaxMoney()
    {
        return $this->total_tax_money;
    }
  
    /**
     * Sets total_tax_money
     * @param \SquareConnect\Model\Money $total_tax_money The total tax amount of money to collect for the line item.
     * @return $this
     */
    public function setTotalTaxMoney($total_tax_money)
    {
        $this->total_tax_money = $total_tax_money;
        return $this;
    }
    /**
     * Gets total_discount_money
     * @return \SquareConnect\Model\Money
     */
    public function getTotalDiscountMoney()
    {
        return $this->total_discount_money;
    }
  
    /**
     * Sets total_discount_money
     * @param \SquareConnect\Model\Money $total_discount_money The total discount amount of money to collect for the line item.
     * @return $this
     */
    public function setTotalDiscountMoney($total_discount_money)
    {
        $this->total_discount_money = $total_discount_money;
        return $this;
    }
    /**
     * Gets total_money
     * @return \SquareConnect\Model\Money
     */
    public function getTotalMoney()
    {
        return $this->total_money;
    }
  
    /**
     * Sets total_money
     * @param \SquareConnect\Model\Money $total_money The total amount of money to collect for this line item.
     * @return $this
     */
    public function setTotalMoney($total_money)
    {
        $this->total_money = $total_money;
        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset 
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->$offset);
    }
  
    /**
     * Gets offset.
     * @param  integer $offset Offset 
     * @return mixed 
     */
    public function offsetGet($offset)
    {
        return $this->$offset;
    }
  
    /**
     * Sets value based on offset.
     * @param  integer $offset Offset 
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->$offset = $value;
    }
  
    /**
     * Unsets offset.
     * @param  integer $offset Offset 
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->$offset);
    }
  
    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) {
            return json_encode(\SquareConnect\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        } else {
            return json_encode(\SquareConnect\ObjectSerializer::sanitizeForSerialization($this));
        }
    }
}
