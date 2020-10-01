<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$this->init_settings(); 
global $woocommerce;
$_carriers = array(
	'FIRST_OVERNIGHT'                    => 'FedEx First Overnight',
	'PRIORITY_OVERNIGHT'                 => 'FedEx Priority Overnight',
	'STANDARD_OVERNIGHT'                 => 'FedEx Standard Overnight',
	'FEDEX_2_DAY_AM'                     => 'FedEx 2Day A.M',
	'FEDEX_2_DAY'                        => 'FedEx 2Day',
	'SAME_DAY'                        => 'FedEx Same Day',
	'SAME_DAY_CITY'                        => 'FedEx Same Day City',
	'SAME_DAY_METRO_AFTERNOON'                        => 'FedEx Same Day Metro Afternoon',
	'SAME_DAY_METRO_MORNING'                        => 'FedEx Same Day Metro Morning',
	'SAME_DAY_METRO_RUSH'                        => 'FedEx Same Day Metro Rush',
	'FEDEX_EXPRESS_SAVER'                => 'FedEx Express Saver',
	'GROUND_HOME_DELIVERY'               => 'FedEx Ground Home Delivery',
	'FEDEX_GROUND'                       => 'FedEx Ground',
	'INTERNATIONAL_ECONOMY'              => 'FedEx International Economy',
	'INTERNATIONAL_ECONOMY_DISTRIBUTION'              => 'FedEx International Economy Distribution',
	'INTERNATIONAL_FIRST'                => 'FedEx International First',
	'INTERNATIONAL_GROUND'                => 'FedEx International Ground',
	'INTERNATIONAL_PRIORITY'             => 'FedEx International Priority',
	'INTERNATIONAL_PRIORITY_DISTRIBUTION'             => 'FedEx International Priority Distribution',
	'EUROPE_FIRST_INTERNATIONAL_PRIORITY' => 'FedEx Europe First International Priority',
	'INTERNATIONAL_PRIORITY_EXPRESS' => 'FedEx International Priority Express',
	'FEDEX_INTERNATIONAL_PRIORITY_PLUS' => 'FedEx First International Priority Plus',
	'INTERNATIONAL_DISTRIBUTION_FREIGHT' => 'FedEx International Distribution Fright',
	'FEDEX_1_DAY_FREIGHT'                => 'FedEx 1 Day Freight',
	'FEDEX_2_DAY_FREIGHT'                => 'FedEx 2 Day Freight',
	'FEDEX_3_DAY_FREIGHT'                => 'FedEx 3 Day Freight',
	'INTERNATIONAL_ECONOMY_FREIGHT'      => 'FedEx Economy Freight',
	'INTERNATIONAL_PRIORITY_FREIGHT'     => 'FedEx Priority Freight',
	'SMART_POST'                         => 'FedEx Smart Post',
	'FEDEX_FIRST_FREIGHT'                => 'FedEx First Freight',
	'FEDEX_FREIGHT_ECONOMY'              => 'FedEx Freight Economy',
	'FEDEX_FREIGHT_PRIORITY'             => 'FedEx Freight Priority',
	'FEDEX_CARGO_AIRPORT_TO_AIRPORT'             => 'FedEx CARGO Airport to Airport',
	'FEDEX_CARGO_FREIGHT_FORWARDING'             => 'FedEx CARGO Freight FOrwarding',
	'FEDEX_CARGO_INTERNATIONAL_EXPRESS_FREIGHT'             => 'FedEx CARGO International Express Fright',
	'FEDEX_CARGO_INTERNATIONAL_PREMIUM'             => 'FedEx CARGO International Premium',
	'FEDEX_CARGO_MAIL'             => 'FedEx CARGO Mail',
	'FEDEX_CARGO_REGISTERED_MAIL'             => 'FedEx CARGO Registered Mail',
	'FEDEX_CARGO_SURFACE_MAIL'             => 'FedEx CARGO Surface Mail',
	'FEDEX_CUSTOM_CRITICAL_AIR_EXPEDITE_EXCLUSIVE_USE'             => 'FedEx Custom Critical Air Expedite Exclusive Use',
	'FEDEX_CUSTOM_CRITICAL_AIR_EXPEDITE_NETWORK'             => 'FedEx Custom Critical Air Expedite Network',
	'FEDEX_CUSTOM_CRITICAL_CHARTER_AIR'             => 'FedEx Custom Critical Charter Air',
	'FEDEX_CUSTOM_CRITICAL_POINT_TO_POINT'             => 'FedEx Custom Critical Point to Point',
	'FEDEX_CUSTOM_CRITICAL_SURFACE_EXPEDITE'             => 'FedEx Custom Critical Surface Expedite',
	'FEDEX_CUSTOM_CRITICAL_SURFACE_EXPEDITE_EXCLUSIVE_USE'             => 'FedEx Custom Critical Surface Expedite Exclusive Use',
	'FEDEX_CUSTOM_CRITICAL_TEMP_ASSURE_AIR'             => 'FedEx Custom Critical Temp Assure Air',
	'FEDEX_CUSTOM_CRITICAL_TEMP_ASSURE_VALIDATED_AIR'             => 'FedEx Custom Critical Temp Assure Validated Air',
	'FEDEX_CUSTOM_CRITICAL_WHITE_GLOVE_SERVICES'             => 'FedEx Custom Critical White Glove Services',
	'TRANSBORDER_DISTRIBUTION_CONSOLIDATION'             => 'Fedex Transborder Distribution Consolidation',
	'FEDEX_DISTANCE_DEFERRED'            => 'FedEx Distance Deferred',
	'FEDEX_NEXT_DAY_EARLY_MORNING'       => 'FedEx Next Day Early Morning',
	'FEDEX_NEXT_DAY_MID_MORNING'         => 'FedEx Next Day Mid Morning',
	'FEDEX_NEXT_DAY_AFTERNOON'           => 'FedEx Next Day Afternoon',
	'FEDEX_NEXT_DAY_END_OF_DAY'          => 'FedEx Next Day End of Day',
	'FEDEX_NEXT_DAY_FREIGHT'             => 'FedEx Next Day Freight',
	);
$countires =  array(
			'AF' => 'Afghanistan',
			'AX' => 'Aland Islands',
			'AL' => 'Albania',
			'DZ' => 'Algeria',
			'AS' => 'American Samoa',
			'AD' => 'Andorra',
			'AO' => 'Angola',
			'AI' => 'Anguilla',
			'AQ' => 'Antarctica',
			'AG' => 'Antigua and Barbuda',
			'AR' => 'Argentina',
			'AM' => 'Armenia',
			'AW' => 'Aruba',
			'AU' => 'Australia',
			'AT' => 'Austria',
			'AZ' => 'Azerbaijan',
			'BS' => 'Bahamas',
			'BH' => 'Bahrain',
			'BD' => 'Bangladesh',
			'BB' => 'Barbados',
			'BY' => 'Belarus',
			'BE' => 'Belgium',
			'BZ' => 'Belize',
			'BJ' => 'Benin',
			'BM' => 'Bermuda',
			'BT' => 'Bhutan',
			'BO' => 'Bolivia',
			'BQ' => 'Bonaire, Saint Eustatius and Saba',
			'BA' => 'Bosnia and Herzegovina',
			'BW' => 'Botswana',
			'BV' => 'Bouvet Island',
			'BR' => 'Brazil',
			'IO' => 'British Indian Ocean Territory',
			'VG' => 'British Virgin Islands',
			'BN' => 'Brunei',
			'BG' => 'Bulgaria',
			'BF' => 'Burkina Faso',
			'BI' => 'Burundi',
			'KH' => 'Cambodia',
			'CM' => 'Cameroon',
			'CA' => 'Canada',
			'CV' => 'Cape Verde',
			'KY' => 'Cayman Islands',
			'CF' => 'Central African Republic',
			'TD' => 'Chad',
			'CL' => 'Chile',
			'CN' => 'China',
			'CX' => 'Christmas Island',
			'CC' => 'Cocos Islands',
			'CO' => 'Colombia',
			'KM' => 'Comoros',
			'CK' => 'Cook Islands',
			'CR' => 'Costa Rica',
			'HR' => 'Croatia',
			'CU' => 'Cuba',
			'CW' => 'Curacao',
			'CY' => 'Cyprus',
			'CZ' => 'Czech Republic',
			'CD' => 'Democratic Republic of the Congo',
			'DK' => 'Denmark',
			'DJ' => 'Djibouti',
			'DM' => 'Dominica',
			'DO' => 'Dominican Republic',
			'TL' => 'East Timor',
			'EC' => 'Ecuador',
			'EG' => 'Egypt',
			'SV' => 'El Salvador',
			'GQ' => 'Equatorial Guinea',
			'ER' => 'Eritrea',
			'EE' => 'Estonia',
			'ET' => 'Ethiopia',
			'FK' => 'Falkland Islands',
			'FO' => 'Faroe Islands',
			'FJ' => 'Fiji',
			'FI' => 'Finland',
			'FR' => 'France',
			'GF' => 'French Guiana',
			'PF' => 'French Polynesia',
			'TF' => 'French Southern Territories',
			'GA' => 'Gabon',
			'GM' => 'Gambia',
			'GE' => 'Georgia',
			'DE' => 'Germany',
			'GH' => 'Ghana',
			'GI' => 'Gibraltar',
			'GR' => 'Greece',
			'GL' => 'Greenland',
			'GD' => 'Grenada',
			'GP' => 'Guadeloupe',
			'GU' => 'Guam',
			'GT' => 'Guatemala',
			'GG' => 'Guernsey',
			'GN' => 'Guinea',
			'GW' => 'Guinea-Bissau',
			'GY' => 'Guyana',
			'HT' => 'Haiti',
			'HM' => 'Heard Island and McDonald Islands',
			'HN' => 'Honduras',
			'HK' => 'Hong Kong',
			'HU' => 'Hungary',
			'IS' => 'Iceland',
			'IN' => 'India',
			'ID' => 'Indonesia',
			'IR' => 'Iran',
			'IQ' => 'Iraq',
			'IE' => 'Ireland',
			'IM' => 'Isle of Man',
			'IL' => 'Israel',
			'IT' => 'Italy',
			'CI' => 'Ivory Coast',
			'JM' => 'Jamaica',
			'JP' => 'Japan',
			'JE' => 'Jersey',
			'JO' => 'Jordan',
			'KZ' => 'Kazakhstan',
			'KE' => 'Kenya',
			'KI' => 'Kiribati',
			'XK' => 'Kosovo',
			'KW' => 'Kuwait',
			'KG' => 'Kyrgyzstan',
			'LA' => 'Laos',
			'LV' => 'Latvia',
			'LB' => 'Lebanon',
			'LS' => 'Lesotho',
			'LR' => 'Liberia',
			'LY' => 'Libya',
			'LI' => 'Liechtenstein',
			'LT' => 'Lithuania',
			'LU' => 'Luxembourg',
			'MO' => 'Macao',
			'MK' => 'Macedonia',
			'MG' => 'Madagascar',
			'MW' => 'Malawi',
			'MY' => 'Malaysia',
			'MV' => 'Maldives',
			'ML' => 'Mali',
			'MT' => 'Malta',
			'MH' => 'Marshall Islands',
			'MQ' => 'Martinique',
			'MR' => 'Mauritania',
			'MU' => 'Mauritius',
			'YT' => 'Mayotte',
			'MX' => 'Mexico',
			'FM' => 'Micronesia',
			'MD' => 'Moldova',
			'MC' => 'Monaco',
			'MN' => 'Mongolia',
			'ME' => 'Montenegro',
			'MS' => 'Montserrat',
			'MA' => 'Morocco',
			'MZ' => 'Mozambique',
			'MM' => 'Myanmar',
			'NA' => 'Namibia',
			'NR' => 'Nauru',
			'NP' => 'Nepal',
			'NL' => 'Netherlands',
			'NC' => 'New Caledonia',
			'NZ' => 'New Zealand',
			'NI' => 'Nicaragua',
			'NE' => 'Niger',
			'NG' => 'Nigeria',
			'NU' => 'Niue',
			'NF' => 'Norfolk Island',
			'KP' => 'North Korea',
			'MP' => 'Northern Mariana Islands',
			'NO' => 'Norway',
			'OM' => 'Oman',
			'PK' => 'Pakistan',
			'PW' => 'Palau',
			'PS' => 'Palestinian Territory',
			'PA' => 'Panama',
			'PG' => 'Papua New Guinea',
			'PY' => 'Paraguay',
			'PE' => 'Peru',
			'PH' => 'Philippines',
			'PN' => 'Pitcairn',
			'PL' => 'Poland',
			'PT' => 'Portugal',
			'PR' => 'Puerto Rico',
			'QA' => 'Qatar',
			'CG' => 'Republic of the Congo',
			'RE' => 'Reunion',
			'RO' => 'Romania',
			'RU' => 'Russia',
			'RW' => 'Rwanda',
			'BL' => 'Saint Barthelemy',
			'SH' => 'Saint Helena',
			'KN' => 'Saint Kitts and Nevis',
			'LC' => 'Saint Lucia',
			'MF' => 'Saint Martin',
			'PM' => 'Saint Pierre and Miquelon',
			'VC' => 'Saint Vincent and the Grenadines',
			'WS' => 'Samoa',
			'SM' => 'San Marino',
			'ST' => 'Sao Tome and Principe',
			'SA' => 'Saudi Arabia',
			'SN' => 'Senegal',
			'RS' => 'Serbia',
			'SC' => 'Seychelles',
			'SL' => 'Sierra Leone',
			'SG' => 'Singapore',
			'SX' => 'Sint Maarten',
			'SK' => 'Slovakia',
			'SI' => 'Slovenia',
			'SB' => 'Solomon Islands',
			'SO' => 'Somalia',
			'ZA' => 'South Africa',
			'GS' => 'South Georgia and the South Sandwich Islands',
			'KR' => 'South Korea',
			'SS' => 'South Sudan',
			'ES' => 'Spain',
			'LK' => 'Sri Lanka',
			'SD' => 'Sudan',
			'SR' => 'Suriname',
			'SJ' => 'Svalbard and Jan Mayen',
			'SZ' => 'Swaziland',
			'SE' => 'Sweden',
			'CH' => 'Switzerland',
			'SY' => 'Syria',
			'TW' => 'Taiwan',
			'TJ' => 'Tajikistan',
			'TZ' => 'Tanzania',
			'TH' => 'Thailand',
			'TG' => 'Togo',
			'TK' => 'Tokelau',
			'TO' => 'Tonga',
			'TT' => 'Trinidad and Tobago',
			'TN' => 'Tunisia',
			'TR' => 'Turkey',
			'TM' => 'Turkmenistan',
			'TC' => 'Turks and Caicos Islands',
			'TV' => 'Tuvalu',
			'VI' => 'U.S. Virgin Islands',
			'UG' => 'Uganda',
			'UA' => 'Ukraine',
			'AE' => 'United Arab Emirates',
			'GB' => 'United Kingdom',
			'US' => 'United States',
			'UM' => 'United States Minor Outlying Islands',
			'UY' => 'Uruguay',
			'UZ' => 'Uzbekistan',
			'VU' => 'Vanuatu',
			'VA' => 'Vatican',
			'VE' => 'Venezuela',
			'VN' => 'Vietnam',
			'WF' => 'Wallis and Futuna',
			'EH' => 'Western Sahara',
			'YE' => 'Yemen',
			'ZM' => 'Zambia',
			'ZW' => 'Zimbabwe',
		);
		$print_format = array(
			'PDF'=>'PDF',
			'DOC'=>'DOC',
			'EPL2'=>'EPL2',
			'ZPLII'=>'ZPLII',
			'PNG'=>'PNG',
			'RTF' => 'RTF',
			'TEXT' => 'TEXT'
		);
		$printer_doc_size = array(
			'PAPER_7X4.75'=>'PAPER_7X4.75',
			'PAPER_4X6'=>'PAPER_4X6' , 
			'PAPER_4X8' => 'PAPER_4X8', 
			'PAPER_4X9' => 'PAPER_4X9', 
			'PAPER_7X4.75' => 'PAPER_7X4.75', 
			'PAPER_8.5X11_BOTTOM_HALF_LABEL' => 'PAPER_8.5X11_BOTTOM_HALF_LABEL', 
			'PAPER_8.5X11_TOP_HALF_LABEL' => 'PAPER_8.5X11_TOP_HALF_LABEL', 
			'PAPER_LETTER' => 'PAPER_LETTER', 
			'STOCK_4X6' => 'STOCK_4X6', 
			'STOCK_4X6.75_LEADING_DOC_TAB' => 'STOCK_4X6.75_LEADING_DOC_TAB', 
			'STOCK_4X6.75_TRAILING_DOC_TAB' => 'STOCK_4X6.75_TRAILING_DOC_TAB', 
			'STOCK_4X8' => 'STOCK_4X8', 
			'STOCK_4X9_LEADING_DOC_TAB' => 'STOCK_4X9_LEADING_DOC_TAB', 
			'STOCK_4X9_TRAILING_DOC_TAB' => 'STOCK_4X9_TRAILING_DOC_TAB'
		);
		$printer_doc_type = array(
			'COMMON2D'=>'COMMON2D');

		$shipment_packing_type =array(
			'YOUR_PACKAGING'=>'YOUR PACKAGING',
			'FEDEX_BOX'=>'FEDEX BOX',
			'FEDEX_PAK'=>'FEDEX PAK',
			'FEDEX_TUBE'=>'FEDEX TUBE',
			'FEDEX_10KG_BOX'=>'FEDEX 10KG BOX',
			'FEDEX_25KG_BOX'=>'FEDEX 25KG  BOX',
			'FEDEX_ENVELOPE'=>'FEDEX ENVELOPE',
			'FEDEX_EXTRA_LARGE_BOX'=>'FEDEX EXTRA LARGE BOX',
			'FEDEX_LARGE_BOX'=>'FEDEX LARGE BOX',
			'FEDEX_MEDIUM_BOX'=>'FEDEX MEDIUM BOX',
			'FEDEX_SMALL_BOX'=>'FEDEX SMALL BOX');

		$shipment_drop_off_type =array(
			'REGULAR_PICKUP' => 'REGULAR PICKUP',
			'REQUEST_COURIER' => 'REQUEST COURIER',
			'DROP_BOX' => 'DROP BOX',
			'BUSINESS_SERVICE_CENTER' => 'BUSINESS SERVICE CENTER',
			'STATION' => 'STATION');

		$packing_type = array("per_item" => "Pack Items Induviually", "weight_based" => "Weight Based Packing");
		$collection_type = array("ANY" => "Any", "CASH" => "Cash", "COMPANY_CHECK" => "Company Check", "GUARANTEED_FUNDS" => "Guaranteed_Funds", "PERSONAL_CHECK" => "Personal_Check");

		$value = array();
		$value['AD'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['AE'] = array('region' => 'AP', 'currency' =>'AED', 'weight' => 'KG_CM');
		$value['AF'] = array('region' => 'AP', 'currency' =>'AFN', 'weight' => 'KG_CM');
		$value['AG'] = array('region' => 'AM', 'currency' =>'XCD', 'weight' => 'LB_IN');
		$value['AI'] = array('region' => 'AM', 'currency' =>'XCD', 'weight' => 'LB_IN');
		$value['AL'] = array('region' => 'AP', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['AM'] = array('region' => 'AP', 'currency' =>'AMD', 'weight' => 'KG_CM');
		$value['AN'] = array('region' => 'AM', 'currency' =>'ANG', 'weight' => 'KG_CM');
		$value['AO'] = array('region' => 'AP', 'currency' =>'AOA', 'weight' => 'KG_CM');
		$value['AR'] = array('region' => 'AM', 'currency' =>'ARS', 'weight' => 'KG_CM');
		$value['AS'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
		$value['AT'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['AU'] = array('region' => 'AP', 'currency' =>'AUD', 'weight' => 'KG_CM');
		$value['AW'] = array('region' => 'AM', 'currency' =>'AWG', 'weight' => 'LB_IN');
		$value['AZ'] = array('region' => 'AM', 'currency' =>'AZN', 'weight' => 'KG_CM');
		$value['AZ'] = array('region' => 'AM', 'currency' =>'AZN', 'weight' => 'KG_CM');
		$value['GB'] = array('region' => 'EU', 'currency' =>'GBP', 'weight' => 'KG_CM');
		$value['BA'] = array('region' => 'AP', 'currency' =>'BAM', 'weight' => 'KG_CM');
		$value['BB'] = array('region' => 'AM', 'currency' =>'BBD', 'weight' => 'LB_IN');
		$value['BD'] = array('region' => 'AP', 'currency' =>'BDT', 'weight' => 'KG_CM');
		$value['BE'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['BF'] = array('region' => 'AP', 'currency' =>'XOF', 'weight' => 'KG_CM');
		$value['BG'] = array('region' => 'EU', 'currency' =>'BGN', 'weight' => 'KG_CM');
		$value['BH'] = array('region' => 'AP', 'currency' =>'BHD', 'weight' => 'KG_CM');
		$value['BI'] = array('region' => 'AP', 'currency' =>'BIF', 'weight' => 'KG_CM');
		$value['BJ'] = array('region' => 'AP', 'currency' =>'XOF', 'weight' => 'KG_CM');
		$value['BM'] = array('region' => 'AM', 'currency' =>'BMD', 'weight' => 'LB_IN');
		$value['BN'] = array('region' => 'AP', 'currency' =>'BND', 'weight' => 'KG_CM');
		$value['BO'] = array('region' => 'AM', 'currency' =>'BOB', 'weight' => 'KG_CM');
		$value['BR'] = array('region' => 'AM', 'currency' =>'BRL', 'weight' => 'KG_CM');
		$value['BS'] = array('region' => 'AM', 'currency' =>'BSD', 'weight' => 'LB_IN');
		$value['BT'] = array('region' => 'AP', 'currency' =>'BTN', 'weight' => 'KG_CM');
		$value['BW'] = array('region' => 'AP', 'currency' =>'BWP', 'weight' => 'KG_CM');
		$value['BY'] = array('region' => 'AP', 'currency' =>'BYR', 'weight' => 'KG_CM');
		$value['BZ'] = array('region' => 'AM', 'currency' =>'BZD', 'weight' => 'KG_CM');
		$value['CA'] = array('region' => 'AM', 'currency' =>'CAD', 'weight' => 'LB_IN');
		$value['CF'] = array('region' => 'AP', 'currency' =>'XAF', 'weight' => 'KG_CM');
		$value['CG'] = array('region' => 'AP', 'currency' =>'XAF', 'weight' => 'KG_CM');
		$value['CH'] = array('region' => 'EU', 'currency' =>'CHF', 'weight' => 'KG_CM');
		$value['CI'] = array('region' => 'AP', 'currency' =>'XOF', 'weight' => 'KG_CM');
		$value['CK'] = array('region' => 'AP', 'currency' =>'NZD', 'weight' => 'KG_CM');
		$value['CL'] = array('region' => 'AM', 'currency' =>'CLP', 'weight' => 'KG_CM');
		$value['CM'] = array('region' => 'AP', 'currency' =>'XAF', 'weight' => 'KG_CM');
		$value['CN'] = array('region' => 'AP', 'currency' =>'CNY', 'weight' => 'KG_CM');
		$value['CO'] = array('region' => 'AM', 'currency' =>'COP', 'weight' => 'KG_CM');
		$value['CR'] = array('region' => 'AM', 'currency' =>'CRC', 'weight' => 'KG_CM');
		$value['CU'] = array('region' => 'AM', 'currency' =>'CUC', 'weight' => 'KG_CM');
		$value['CV'] = array('region' => 'AP', 'currency' =>'CVE', 'weight' => 'KG_CM');
		$value['CY'] = array('region' => 'AP', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['CZ'] = array('region' => 'EU', 'currency' =>'CZF', 'weight' => 'KG_CM');
		$value['DE'] = array('region' => 'AP', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['DJ'] = array('region' => 'EU', 'currency' =>'DJF', 'weight' => 'KG_CM');
		$value['DK'] = array('region' => 'AM', 'currency' =>'DKK', 'weight' => 'KG_CM');
		$value['DM'] = array('region' => 'AM', 'currency' =>'XCD', 'weight' => 'LB_IN');
		$value['DO'] = array('region' => 'AP', 'currency' =>'DOP', 'weight' => 'LB_IN');
		$value['DZ'] = array('region' => 'AM', 'currency' =>'DZD', 'weight' => 'KG_CM');
		$value['EC'] = array('region' => 'EU', 'currency' =>'USD', 'weight' => 'KG_CM');
		$value['EE'] = array('region' => 'AP', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['EG'] = array('region' => 'AP', 'currency' =>'EGP', 'weight' => 'KG_CM');
		$value['ER'] = array('region' => 'EU', 'currency' =>'ERN', 'weight' => 'KG_CM');
		$value['ES'] = array('region' => 'AP', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['ET'] = array('region' => 'AU', 'currency' =>'ETB', 'weight' => 'KG_CM');
		$value['FI'] = array('region' => 'AP', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['FJ'] = array('region' => 'AP', 'currency' =>'FJD', 'weight' => 'KG_CM');
		$value['FK'] = array('region' => 'AM', 'currency' =>'GBP', 'weight' => 'KG_CM');
		$value['FM'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
		$value['FO'] = array('region' => 'AM', 'currency' =>'DKK', 'weight' => 'KG_CM');
		$value['FR'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['GA'] = array('region' => 'AP', 'currency' =>'XAF', 'weight' => 'KG_CM');
		$value['GB'] = array('region' => 'EU', 'currency' =>'GBP', 'weight' => 'KG_CM');
		$value['GD'] = array('region' => 'AM', 'currency' =>'XCD', 'weight' => 'LB_IN');
		$value['GE'] = array('region' => 'AM', 'currency' =>'GEL', 'weight' => 'KG_CM');
		$value['GF'] = array('region' => 'AM', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['GG'] = array('region' => 'AM', 'currency' =>'GBP', 'weight' => 'KG_CM');
		$value['GH'] = array('region' => 'AP', 'currency' =>'GBS', 'weight' => 'KG_CM');
		$value['GI'] = array('region' => 'AM', 'currency' =>'GBP', 'weight' => 'KG_CM');
		$value['GL'] = array('region' => 'AM', 'currency' =>'DKK', 'weight' => 'KG_CM');
		$value['GM'] = array('region' => 'AP', 'currency' =>'GMD', 'weight' => 'KG_CM');
		$value['GN'] = array('region' => 'AP', 'currency' =>'GNF', 'weight' => 'KG_CM');
		$value['GP'] = array('region' => 'AM', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['GQ'] = array('region' => 'AP', 'currency' =>'XAF', 'weight' => 'KG_CM');
		$value['GR'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['GT'] = array('region' => 'AM', 'currency' =>'GTQ', 'weight' => 'KG_CM');
		$value['GU'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
		$value['GW'] = array('region' => 'AP', 'currency' =>'XOF', 'weight' => 'KG_CM');
		$value['GY'] = array('region' => 'AP', 'currency' =>'GYD', 'weight' => 'LB_IN');
		$value['HK'] = array('region' => 'AM', 'currency' =>'HKD', 'weight' => 'KG_CM');
		$value['HN'] = array('region' => 'AM', 'currency' =>'HNL', 'weight' => 'KG_CM');
		$value['HR'] = array('region' => 'AP', 'currency' =>'HRK', 'weight' => 'KG_CM');
		$value['HT'] = array('region' => 'AM', 'currency' =>'HTG', 'weight' => 'LB_IN');
		$value['HU'] = array('region' => 'EU', 'currency' =>'HUF', 'weight' => 'KG_CM');
		$value['IC'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['ID'] = array('region' => 'AP', 'currency' =>'IDR', 'weight' => 'KG_CM');
		$value['IE'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['IL'] = array('region' => 'AP', 'currency' =>'ILS', 'weight' => 'KG_CM');
		$value['IN'] = array('region' => 'AP', 'currency' =>'INR', 'weight' => 'KG_CM');
		$value['IQ'] = array('region' => 'AP', 'currency' =>'IQD', 'weight' => 'KG_CM');
		$value['IR'] = array('region' => 'AP', 'currency' =>'IRR', 'weight' => 'KG_CM');
		$value['IS'] = array('region' => 'EU', 'currency' =>'ISK', 'weight' => 'KG_CM');
		$value['IT'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['JE'] = array('region' => 'AM', 'currency' =>'GBP', 'weight' => 'KG_CM');
		$value['JM'] = array('region' => 'AM', 'currency' =>'JMD', 'weight' => 'KG_CM');
		$value['JO'] = array('region' => 'AP', 'currency' =>'JOD', 'weight' => 'KG_CM');
		$value['JP'] = array('region' => 'AP', 'currency' =>'JPY', 'weight' => 'KG_CM');
		$value['KE'] = array('region' => 'AP', 'currency' =>'KES', 'weight' => 'KG_CM');
		$value['KG'] = array('region' => 'AP', 'currency' =>'KGS', 'weight' => 'KG_CM');
		$value['KH'] = array('region' => 'AP', 'currency' =>'KHR', 'weight' => 'KG_CM');
		$value['KI'] = array('region' => 'AP', 'currency' =>'AUD', 'weight' => 'KG_CM');
		$value['KM'] = array('region' => 'AP', 'currency' =>'KMF', 'weight' => 'KG_CM');
		$value['KN'] = array('region' => 'AM', 'currency' =>'XCD', 'weight' => 'LB_IN');
		$value['KP'] = array('region' => 'AP', 'currency' =>'KPW', 'weight' => 'LB_IN');
		$value['KR'] = array('region' => 'AP', 'currency' =>'KRW', 'weight' => 'KG_CM');
		$value['KV'] = array('region' => 'AM', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['KW'] = array('region' => 'AP', 'currency' =>'KWD', 'weight' => 'KG_CM');
		$value['KY'] = array('region' => 'AM', 'currency' =>'KYD', 'weight' => 'KG_CM');
		$value['KZ'] = array('region' => 'AP', 'currency' =>'KZF', 'weight' => 'LB_IN');
		$value['LA'] = array('region' => 'AP', 'currency' =>'LAK', 'weight' => 'KG_CM');
		$value['LB'] = array('region' => 'AP', 'currency' =>'USD', 'weight' => 'KG_CM');
		$value['LC'] = array('region' => 'AM', 'currency' =>'XCD', 'weight' => 'KG_CM');
		$value['LI'] = array('region' => 'AM', 'currency' =>'CHF', 'weight' => 'LB_IN');
		$value['LK'] = array('region' => 'AP', 'currency' =>'LKR', 'weight' => 'KG_CM');
		$value['LR'] = array('region' => 'AP', 'currency' =>'LRD', 'weight' => 'KG_CM');
		$value['LS'] = array('region' => 'AP', 'currency' =>'LSL', 'weight' => 'KG_CM');
		$value['LT'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['LU'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['LV'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['LY'] = array('region' => 'AP', 'currency' =>'LYD', 'weight' => 'KG_CM');
		$value['MA'] = array('region' => 'AP', 'currency' =>'MAD', 'weight' => 'KG_CM');
		$value['MC'] = array('region' => 'AM', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['MD'] = array('region' => 'AP', 'currency' =>'MDL', 'weight' => 'KG_CM');
		$value['ME'] = array('region' => 'AM', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['MG'] = array('region' => 'AP', 'currency' =>'MGA', 'weight' => 'KG_CM');
		$value['MH'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
		$value['MK'] = array('region' => 'AP', 'currency' =>'MKD', 'weight' => 'KG_CM');
		$value['ML'] = array('region' => 'AP', 'currency' =>'COF', 'weight' => 'KG_CM');
		$value['MM'] = array('region' => 'AP', 'currency' =>'USD', 'weight' => 'KG_CM');
		$value['MN'] = array('region' => 'AP', 'currency' =>'MNT', 'weight' => 'KG_CM');
		$value['MO'] = array('region' => 'AP', 'currency' =>'MOP', 'weight' => 'KG_CM');
		$value['MP'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
		$value['MQ'] = array('region' => 'AM', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['MR'] = array('region' => 'AP', 'currency' =>'MRO', 'weight' => 'KG_CM');
		$value['MS'] = array('region' => 'AM', 'currency' =>'XCD', 'weight' => 'LB_IN');
		$value['MT'] = array('region' => 'AP', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['MU'] = array('region' => 'AP', 'currency' =>'MUR', 'weight' => 'KG_CM');
		$value['MV'] = array('region' => 'AP', 'currency' =>'MVR', 'weight' => 'KG_CM');
		$value['MW'] = array('region' => 'AP', 'currency' =>'MWK', 'weight' => 'KG_CM');
		$value['MX'] = array('region' => 'AM', 'currency' =>'MXN', 'weight' => 'KG_CM');
		$value['MY'] = array('region' => 'AP', 'currency' =>'MYR', 'weight' => 'KG_CM');
		$value['MZ'] = array('region' => 'AP', 'currency' =>'MZN', 'weight' => 'KG_CM');
		$value['NA'] = array('region' => 'AP', 'currency' =>'NAD', 'weight' => 'KG_CM');
		$value['NC'] = array('region' => 'AP', 'currency' =>'XPF', 'weight' => 'KG_CM');
		$value['NE'] = array('region' => 'AP', 'currency' =>'XOF', 'weight' => 'KG_CM');
		$value['NG'] = array('region' => 'AP', 'currency' =>'NGN', 'weight' => 'KG_CM');
		$value['NI'] = array('region' => 'AM', 'currency' =>'NIO', 'weight' => 'KG_CM');
		$value['NL'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['NO'] = array('region' => 'EU', 'currency' =>'NOK', 'weight' => 'KG_CM');
		$value['NP'] = array('region' => 'AP', 'currency' =>'NPR', 'weight' => 'KG_CM');
		$value['NR'] = array('region' => 'AP', 'currency' =>'AUD', 'weight' => 'KG_CM');
		$value['NU'] = array('region' => 'AP', 'currency' =>'NZD', 'weight' => 'KG_CM');
		$value['NZ'] = array('region' => 'AP', 'currency' =>'NZD', 'weight' => 'KG_CM');
		$value['OM'] = array('region' => 'AP', 'currency' =>'OMR', 'weight' => 'KG_CM');
		$value['PA'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'KG_CM');
		$value['PE'] = array('region' => 'AM', 'currency' =>'PEN', 'weight' => 'KG_CM');
		$value['PF'] = array('region' => 'AP', 'currency' =>'XPF', 'weight' => 'KG_CM');
		$value['PG'] = array('region' => 'AP', 'currency' =>'PGK', 'weight' => 'KG_CM');
		$value['PH'] = array('region' => 'AP', 'currency' =>'PHP', 'weight' => 'KG_CM');
		$value['PK'] = array('region' => 'AP', 'currency' =>'PKR', 'weight' => 'KG_CM');
		$value['PL'] = array('region' => 'EU', 'currency' =>'PLN', 'weight' => 'KG_CM');
		$value['PR'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
		$value['PT'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['PW'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'KG_CM');
		$value['PY'] = array('region' => 'AM', 'currency' =>'PYG', 'weight' => 'KG_CM');
		$value['QA'] = array('region' => 'AP', 'currency' =>'QAR', 'weight' => 'KG_CM');
		$value['RE'] = array('region' => 'AP', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['RO'] = array('region' => 'EU', 'currency' =>'RON', 'weight' => 'KG_CM');
		$value['RS'] = array('region' => 'AP', 'currency' =>'RSD', 'weight' => 'KG_CM');
		$value['RU'] = array('region' => 'AP', 'currency' =>'RUB', 'weight' => 'KG_CM');
		$value['RW'] = array('region' => 'AP', 'currency' =>'RWF', 'weight' => 'KG_CM');
		$value['SA'] = array('region' => 'AP', 'currency' =>'SAR', 'weight' => 'KG_CM');
		$value['SB'] = array('region' => 'AP', 'currency' =>'SBD', 'weight' => 'KG_CM');
		$value['SC'] = array('region' => 'AP', 'currency' =>'SCR', 'weight' => 'KG_CM');
		$value['SD'] = array('region' => 'AP', 'currency' =>'SDG', 'weight' => 'KG_CM');
		$value['SE'] = array('region' => 'EU', 'currency' =>'SEK', 'weight' => 'KG_CM');
		$value['SG'] = array('region' => 'AP', 'currency' =>'SGD', 'weight' => 'KG_CM');
		$value['SH'] = array('region' => 'AP', 'currency' =>'SHP', 'weight' => 'KG_CM');
		$value['SI'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['SK'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['SL'] = array('region' => 'AP', 'currency' =>'SLL', 'weight' => 'KG_CM');
		$value['SM'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['SN'] = array('region' => 'AP', 'currency' =>'XOF', 'weight' => 'KG_CM');
		$value['SO'] = array('region' => 'AM', 'currency' =>'SOS', 'weight' => 'KG_CM');
		$value['SR'] = array('region' => 'AM', 'currency' =>'SRD', 'weight' => 'KG_CM');
		$value['SS'] = array('region' => 'AP', 'currency' =>'SSP', 'weight' => 'KG_CM');
		$value['ST'] = array('region' => 'AP', 'currency' =>'STD', 'weight' => 'KG_CM');
		$value['SV'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'KG_CM');
		$value['SY'] = array('region' => 'AP', 'currency' =>'SYP', 'weight' => 'KG_CM');
		$value['SZ'] = array('region' => 'AP', 'currency' =>'SZL', 'weight' => 'KG_CM');
		$value['TC'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
		$value['TD'] = array('region' => 'AP', 'currency' =>'XAF', 'weight' => 'KG_CM');
		$value['TG'] = array('region' => 'AP', 'currency' =>'XOF', 'weight' => 'KG_CM');
		$value['TH'] = array('region' => 'AP', 'currency' =>'THB', 'weight' => 'KG_CM');
		$value['TJ'] = array('region' => 'AP', 'currency' =>'TJS', 'weight' => 'KG_CM');
		$value['TL'] = array('region' => 'AP', 'currency' =>'USD', 'weight' => 'KG_CM');
		$value['TN'] = array('region' => 'AP', 'currency' =>'TND', 'weight' => 'KG_CM');
		$value['TO'] = array('region' => 'AP', 'currency' =>'TOP', 'weight' => 'KG_CM');
		$value['TR'] = array('region' => 'AP', 'currency' =>'TRY', 'weight' => 'KG_CM');
		$value['TT'] = array('region' => 'AM', 'currency' =>'TTD', 'weight' => 'LB_IN');
		$value['TV'] = array('region' => 'AP', 'currency' =>'AUD', 'weight' => 'KG_CM');
		$value['TW'] = array('region' => 'AP', 'currency' =>'TWD', 'weight' => 'KG_CM');
		$value['TZ'] = array('region' => 'AP', 'currency' =>'TZS', 'weight' => 'KG_CM');
		$value['UA'] = array('region' => 'AP', 'currency' =>'UAH', 'weight' => 'KG_CM');
		$value['UG'] = array('region' => 'AP', 'currency' =>'USD', 'weight' => 'KG_CM');
		$value['US'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
		$value['UY'] = array('region' => 'AM', 'currency' =>'UYU', 'weight' => 'KG_CM');
		$value['UZ'] = array('region' => 'AP', 'currency' =>'UZS', 'weight' => 'KG_CM');
		$value['VC'] = array('region' => 'AM', 'currency' =>'XCD', 'weight' => 'LB_IN');
		$value['VE'] = array('region' => 'AM', 'currency' =>'VEF', 'weight' => 'KG_CM');
		$value['VG'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
		$value['VI'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
		$value['VN'] = array('region' => 'AP', 'currency' =>'VND', 'weight' => 'KG_CM');
		$value['VU'] = array('region' => 'AP', 'currency' =>'VUV', 'weight' => 'KG_CM');
		$value['WS'] = array('region' => 'AP', 'currency' =>'WST', 'weight' => 'KG_CM');
		$value['XB'] = array('region' => 'AM', 'currency' =>'EUR', 'weight' => 'LB_IN');
		$value['XC'] = array('region' => 'AM', 'currency' =>'EUR', 'weight' => 'LB_IN');
		$value['XE'] = array('region' => 'AM', 'currency' =>'ANG', 'weight' => 'LB_IN');
		$value['XM'] = array('region' => 'AM', 'currency' =>'EUR', 'weight' => 'LB_IN');
		$value['XN'] = array('region' => 'AM', 'currency' =>'XCD', 'weight' => 'LB_IN');
		$value['XS'] = array('region' => 'AP', 'currency' =>'SIS', 'weight' => 'KG_CM');
		$value['XY'] = array('region' => 'AM', 'currency' =>'ANG', 'weight' => 'LB_IN');
		$value['YE'] = array('region' => 'AP', 'currency' =>'YER', 'weight' => 'KG_CM');
		$value['YT'] = array('region' => 'AP', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['ZA'] = array('region' => 'AP', 'currency' =>'ZAR', 'weight' => 'KG_CM');
		$value['ZM'] = array('region' => 'AP', 'currency' =>'ZMW', 'weight' => 'KG_CM');
		$value['ZW'] = array('region' => 'AP', 'currency' =>'USD', 'weight' => 'KG_CM');

	$general_settings = get_option('hitshippo_fedex_main_settings');
	$general_settings = empty($general_settings) ? array() : $general_settings;
	if(isset($_POST['save']))
	{
		
		$general_settings['hitshippo_fedex_site_id'] = sanitize_text_field(isset($_POST['hitshippo_fedex_site_id']) ? $_POST['hitshippo_fedex_site_id'] : '');
		$general_settings['hitshippo_fedex_site_pwd'] = sanitize_text_field(isset($_POST['hitshippo_fedex_site_pwd']) ? $_POST['hitshippo_fedex_site_pwd'] : '');
		$general_settings['hitshippo_fedex_acc_no'] = sanitize_text_field(isset($_POST['hitshippo_fedex_acc_no']) ? $_POST['hitshippo_fedex_acc_no'] : '');
		$general_settings['hitshippo_fedex_access_key'] = sanitize_text_field(isset($_POST['hitshippo_fedex_access_key']) ? $_POST['hitshippo_fedex_access_key'] : '');
		$general_settings['hitshippo_fedex_weight_unit'] = sanitize_text_field(isset($_POST['hitshippo_fedex_weight_unit']) ? $_POST['hitshippo_fedex_weight_unit'] : '');
		$general_settings['hitshippo_fedex_test'] = sanitize_text_field(isset($_POST['hitshippo_fedex_test']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_rates'] = sanitize_text_field(isset($_POST['hitshippo_fedex_rates']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_res_f'] = sanitize_text_field(isset($_POST['hitshippo_fedex_res_f']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_shipper_name'] = sanitize_text_field(isset($_POST['hitshippo_fedex_shipper_name']) ? $_POST['hitshippo_fedex_shipper_name'] : '');
		$general_settings['hitshippo_fedex_company'] = sanitize_text_field(isset($_POST['hitshippo_fedex_company']) ? $_POST['hitshippo_fedex_company'] : '');
		$general_settings['hitshippo_fedex_mob_num'] = sanitize_text_field(isset($_POST['hitshippo_fedex_mob_num']) ? $_POST['hitshippo_fedex_mob_num'] : '');
		$general_settings['hitshippo_fedex_email'] = sanitize_text_field(isset($_POST['hitshippo_fedex_email']) ? $_POST['hitshippo_fedex_email'] : '');
		$general_settings['hitshippo_fedex_address1'] = sanitize_text_field(isset($_POST['hitshippo_fedex_address1']) ? $_POST['hitshippo_fedex_address1'] : '');
		$general_settings['hitshippo_fedex_address2'] = sanitize_text_field(isset($_POST['hitshippo_fedex_address2']) ? $_POST['hitshippo_fedex_address2'] : '');
		$general_settings['hitshippo_fedex_city'] = sanitize_text_field(isset($_POST['hitshippo_fedex_city']) ? $_POST['hitshippo_fedex_city'] : '');
		$general_settings['hitshippo_fedex_state'] = sanitize_text_field(isset($_POST['hitshippo_fedex_state']) ? $_POST['hitshippo_fedex_state'] : '');
		$general_settings['hitshippo_fedex_zip'] = sanitize_text_field(isset($_POST['hitshippo_fedex_zip']) ? $_POST['hitshippo_fedex_zip'] : '');
		$general_settings['hitshippo_fedex_country'] = sanitize_text_field(isset($_POST['hitshippo_fedex_country']) ? $_POST['hitshippo_fedex_country'] : '');
		$general_settings['hitshippo_fedex_carrier'] = !empty($_POST['hitshippo_fedex_carrier']) ? $_POST['hitshippo_fedex_carrier'] : array();
		$general_settings['hitshippo_fedex_carrier_name'] = !empty($_POST['hitshippo_fedex_carrier_name']) ? $_POST['hitshippo_fedex_carrier_name'] : array();
		$general_settings['hitshippo_fedex_account_rates'] = sanitize_text_field(isset($_POST['hitshippo_fedex_account_rates']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_one_rates'] = sanitize_text_field(isset($_POST['hitshippo_fedex_one_rates']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_developer_rate'] = sanitize_text_field(isset($_POST['hitshippo_fedex_developer_rate']) ? 'yes' :'no');
		// $general_settings['hitshippo_fedex_developer_shipment'] = sanitize_text_field(isset($_POST['hitshippo_fedex_developer_shipment']) ? 'yes' :'no');
		// $general_settings['hitshippo_fedex_insure'] = sanitize_text_field(isset($_POST['hitshippo_fedex_insure']) ? 'yes' :'no');
		// $general_settings['hitshippo_fedex_sd'] = sanitize_text_field(isset($_POST['hitshippo_fedex_sd']) ? 'yes' :'no');
		$general_settings['hitshippo_fedex_shippo_int_key'] = sanitize_text_field(isset($_POST['hitshippo_fedex_shippo_int_key']) ? $_POST['hitshippo_fedex_shippo_int_key'] : '');
		$general_settings['hitshippo_fedex_shippo_label_gen'] = sanitize_text_field(isset($_POST['hitshippo_fedex_shippo_label_gen']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_cod'] = sanitize_text_field(isset($_POST['hitshippo_fedex_cod']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_shippo_mail'] = sanitize_text_field(isset($_POST['hitshippo_fedex_shippo_mail']) ? $_POST['hitshippo_fedex_shippo_mail'] : '');
		$general_settings['hitshippo_fedex_label_size'] = sanitize_text_field(isset($_POST['hitshippo_fedex_label_size']) ? $_POST['hitshippo_fedex_label_size'] : '');
		$general_settings['hitshippo_fedex_drop_off'] = sanitize_text_field(isset($_POST['hitshippo_fedex_drop_off']) ? $_POST['hitshippo_fedex_drop_off'] : '');
		$general_settings['hitshippo_fedex_ship_pack_type'] = sanitize_text_field(isset($_POST['hitshippo_fedex_ship_pack_type']) ? $_POST['hitshippo_fedex_ship_pack_type'] : '');
		$general_settings['hitshippo_fedex_collection_type'] = sanitize_text_field(isset($_POST['hitshippo_fedex_collection_type']) ? $_POST['hitshippo_fedex_collection_type'] : 'CASH');
		$general_settings['hitshippo_fedex_shipment_content'] = sanitize_text_field(isset($_POST['hitshippo_fedex_shipment_content']) ? $_POST['hitshippo_fedex_shipment_content'] : '');
		$general_settings['hitshippo_fedex_packing_type'] = sanitize_text_field(isset($_POST['hitshippo_fedex_packing_type']) ? $_POST['hitshippo_fedex_packing_type'] : '');
		$general_settings['hitshippo_fedex_max_weight'] = sanitize_text_field(isset($_POST['hitshippo_fedex_max_weight']) ? $_POST['hitshippo_fedex_max_weight'] : '');
		$general_settings['hitshippo_fedex_con_rate'] = sanitize_text_field(isset($_POST['hitshippo_fedex_con_rate']) ? $_POST['hitshippo_fedex_con_rate'] : '');
		$general_settings['hitshippo_fedex_auto_con_rate'] = sanitize_text_field(isset($_POST['hitshippo_fedex_auto_con_rate']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_currency'] = sanitize_text_field(isset($_POST['hitshippo_fedex_currency']) ? $_POST['hitshippo_fedex_currency'] : '');
		// update_option('hitshippo_fedex_main_settings', $general_settings);
	
		// Multi Vendor Settings

		$general_settings['hitshippo_fedex_v_enable'] = sanitize_text_field(isset($_POST['hitshippo_fedex_v_enable']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_v_rates'] = sanitize_text_field(isset($_POST['hitshippo_fedex_v_rates']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_v_labels'] = sanitize_text_field(isset($_POST['hitshippo_fedex_v_labels']) ? 'yes' : 'no');
		$general_settings['hitshippo_fedex_v_roles'] = !empty($_POST['hitshippo_fedex_v_roles']) ? $_POST['hitshippo_fedex_v_roles'] : array();
		$general_settings['hitshippo_fedex_v_email'] = sanitize_text_field(isset($_POST['hitshippo_fedex_v_email']) ? 'yes' : 'no');

		update_option('hitshippo_fedex_main_settings', $general_settings);
	
	}
// $general_settings['hitshippo_fedex_currency'] = isset($value[(isset($general_settings['hitshippo_fedex_country']) ? $general_settings['hitshippo_fedex_country'] : '')]) ? $value[$general_settings['hitshippo_fedex_country']]['currency'] : '';
$general_settings['hitshippo_fedex_woo_currency'] = get_option('woocommerce_currency');
?>
<style type="text/css">
	/*hit_tabs*/
.hit_tabs {
  max-width: 100%;
  min-width: 100%;
  margin-top: 20px;
  padding: 0 20px;
}
.hit_tabs label {
  display: inline-block;
  padding: 6px 0 6px 0;
  margin: 0 -2px;
  width: 11%; /* =100/hit_tabs number */
  border-bottom: 1px solid #dadada;
  text-align: center;
  font-weight:600;
}
.hit_tabs label:hover {
  cursor: pointer;
}
.hit_tabs input:checked + label {
  border: 1px solid #dadada;
  border-width: 1px 1px 0 1px;
}
.hit_tabs #tab1:checked ~ .content #content1,
.hit_tabs #tab2:checked ~ .content #content2,
.hit_tabs #tab3:checked ~ .content #content3,
.hit_tabs #tab4:checked ~ .content #content4,
.hit_tabs #tab5:checked ~ .content #content5,
.hit_tabs #tab6:checked ~ .content #content6,
.hit_tabs #tab7:checked ~ .content #content7,
.hit_tabs #tab8:checked ~ .content #content8,
.hit_tabs #tab9:checked ~ .content #content9 {
  display: block;
}
.hit_tabs .content > div {
  display: none;
  padding-top: 20px;
  text-align: left;
  min-height: 240px;
  overflow: auto;
}
.woocommerce-save-button{margin-left:27px !important;}
</style>

<?php
if(!isset($general_settings['hitshippo_fedex_site_id']) || $general_settings['hitshippo_fedex_site_id'] == ''){
	?>
	<p style="    /* display: inline-block; */
    line-height: 1.4;
    padding: 11px 15px;
    font-size: 14px;
    text-align: left;
    margin: 25px 20px 0 2px;
    background-color: #fff;
    border-left: 4px solid #ffba00;
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}"><?php _e('Required: Save DHL Account Settings.','hitshippo_fedex') ?></p>

	<?php
}else if(!isset($general_settings['hitshippo_fedex_shipper_name']) || $general_settings['hitshippo_fedex_shipper_name'] == ''){
	?>
	<p style="    /* display: inline-block; */
    line-height: 1.4;
    padding: 11px 15px;
    font-size: 14px;
    text-align: left;
    margin: 25px 20px 0 2px;
    background-color: #fff;
    border-left: 4px solid #ffba00;
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}"><?php _e('Required: Save Shipper Address.','hitshippo_fedex') ?></p>

	<?php
}else if(!isset($general_settings['hitshippo_fedex_carrier']) || empty($general_settings['hitshippo_fedex_carrier'])){
	?>
	<p style="    /* display: inline-block; */
    line-height: 1.4;
    padding: 11px 15px;
    font-size: 14px;
    text-align: left;
    margin: 25px 20px 0 2px;
    background-color: #fff;
    border-left: 4px solid #ffba00;
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}"><?php _e('Required: Choose serivices to continue. All domestic & international services are available','hitshippo_fedex') ?></p>

	<?php
}

?>

 <img src="https://hitstacks.com/assets/img/others/fedex.png" style="width:100px;float:right;margin-top: -100px;">
 <div class="hit_tabs" style="width: 100%">
   <input id="tab1" type="radio" name="hit_tabs" style="display: none;" checked>
   <label for="tab1" >Fedex Account</label>
   <input id="tab2" type="radio" name="hit_tabs" style="display: none;">
   <label for="tab2">Address</label>
   <input id="tab3" type="radio" name="hit_tabs" style="display: none;">
   <label for="tab3">Shipping Rates</label>
   <input id="tab4" type="radio" name="hit_tabs" style="display: none;">
   <label for="tab4">Services</label>
   <input id="tab5" type="radio" name="hit_tabs" style="display: none;">
   <label for="tab5">Packing</label>
   <input id="tab6" type="radio" name="hit_tabs" style="display: none;">
   <label for="tab6">Shipping Label</label>
   <input id="tab7" type="radio" name="hit_tabs" style="display: none;">
   <label for="tab7">Multi Vendor</label>
   <input id="tab8" type="radio" name="hit_tabs" style="display: none;">
   <label for="tab8">Hooks</label>
   <div class="content">

   	<div id="content1">
   		<h3><?php _e('Fedex Account Informations','hitshippo_fedex') ?></h3>
			<div>
				<table style="width:100%;">
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('This is fedex.com login Username.','hitshippo_fedex') ?>"></span>	<?php _e('Fedex Web Service Key','hitshippo_fedex') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<input type="text" name="hitshippo_fedex_site_id" value="<?php echo (isset($general_settings['hitshippo_fedex_site_id'])) ? $general_settings['hitshippo_fedex_site_id'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('This is fedex.com login Password','hitshippo_fedex') ?>"></span>	<?php _e('Web Service Password','hitshippo_fedex') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<input type="text" name="hitshippo_fedex_site_pwd" value="<?php echo (isset($general_settings['hitshippo_fedex_site_pwd'])) ? $general_settings['hitshippo_fedex_site_pwd'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('fedex Integration Team will give this details to you.','hitshippo_fedex') ?>"></span>	<?php _e('Fedex Account Number','hitshippo_fedex') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<input type="text" name="hitshippo_fedex_acc_no" value="<?php echo (isset($general_settings['hitshippo_fedex_acc_no'])) ? $general_settings['hitshippo_fedex_acc_no'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('fedex Integration Team will give this details to you.','hitshippo_fedex') ?>"></span>	<?php _e('Fedex Meter Number','hitshippo_fedex') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<input type="text" name="hitshippo_fedex_access_key" value="<?php echo (isset($general_settings['hitshippo_fedex_access_key'])) ? $general_settings['hitshippo_fedex_access_key'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Enable this to Run the plugin in Test Mode','hitshippo_fedex') ?>"></span>	<?php _e('Is this Test Credentilas?','hitshippo_fedex') ?></h4>
						</td>
						<td>
							<input type="checkbox" name="hitshippo_fedex_test" <?php echo (isset($general_settings['hitshippo_fedex_test']) && $general_settings['hitshippo_fedex_test'] == 'yes') ? 'checked="true"' : ''; ?> value="yes" > <?php _e('Yes','hitshippo_fedex') ?>
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Select the fedex Weight Unit of Yours.','hitshippo_fedex') ?>"></span>	<?php _e('Fedex Weight Unit','hitshippo_fedex') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<select name="hitshippo_fedex_weight_unit">
								<option value="LB_IN" <?php echo (isset($general_settings['hitshippo_fedex_weight_unit']) && $general_settings['hitshippo_fedex_weight_unit'] == 'LB_IN') ? 'Selected="true"' : ''; ?>> LB & IN </option>
								<option value="KG_CM" <?php echo (isset($general_settings['hitshippo_fedex_weight_unit']) && $general_settings['hitshippo_fedex_weight_unit'] == 'KG_CM') ? 'Selected="true"' : ''; ?>> KG & CM </option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('This will Update automatically.','hitshippo_fedex') ?>"></span>	<?php _e('Woocommerce Currency','hitshippo_fedex') ?><font style="color:red;">*</font></h4><p>You can change your Woocommerce currency <a target = '_blank' href="admin.php?page=wc-settings">here</a>.</p>
						</td>
						<td>
							<h4><?php echo $general_settings['hitshippo_fedex_woo_currency'];?></h4>
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Choose currency that return by fedex, currency will be converted from this currency to woocommerce currency while showing rates on frontoffice.','hitshippo_fedex') ?>"></span><?php _e('Fedex Currecy Code','hitshippo_fedex') ?></h4>
						</td>
						<td>
							<select name="hitshippo_fedex_currency" style="width:153px;">
								<?php foreach($value as  $currency)
								{
									if(isset($general_settings['hitshippo_fedex_currency']) && ($general_settings['hitshippo_fedex_currency'] == $currency['currency']))
									{
										echo "<option value=".$currency['currency']." selected='true'>".$currency['currency']."</option>";
									}
									else
									{
										echo "<option value=".$currency['currency'].">".$currency['currency']."</option>";
									}
								}

								if (!isset($general_settings['hitshippo_fedex_currency']) || ($general_settings['hitshippo_fedex_currency'] != "NMP")) {
										echo "<option value=NMP>NMP</option>";
								}elseif (isset($general_settings['hitshippo_fedex_currency']) && ($general_settings['hitshippo_fedex_currency'] == "NMP")) {
										echo "<option value=NMP selected='true'>NMP</option>";
								} ?>
							</select>
						</td>
					</tr>
					<tr class="auto_con">
						<td>
							<h4  style="display: inline;"> <span class="woocommerce-help-tip" data-tip="<?php _e('Convert currency from woocommerce currency to fedex currency.','hitshippo_fedex') ?>"></span>	<?php _e('Auto Currency Conversion ','hitshippo_fedex') ?></h4><font style="color:red;"><?php _e('( Only for Subscribed users )','hitshippo_fedex') ?></font>
						</td>
						<td>
							<input type="checkbox" id="auto_con" name="hitshippo_fedex_auto_con_rate" <?php echo (isset($general_settings['hitshippo_fedex_auto_con_rate']) && $general_settings['hitshippo_fedex_auto_con_rate'] == 'yes') ? 'checked="true"' : ''; ?> value="yes" > <?php _e('Yes','hitshippo_fedex') ?>
						</td>
					</tr>
					<tr class="con_rate">
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Enter conversion rate.','hitshippo_fedex') ?>"></span>	<?php _e('Exchange Rate','hitshippo_fedex') ?><font style="color:red;">*</font> <?php echo "( ".$general_settings['hitshippo_fedex_woo_currency']."->".$general_settings['hitshippo_fedex_currency']." )"; ?></h4>
						</td>
						<td>
							<input type="text" name="hitshippo_fedex_con_rate" value="<?php echo (isset($general_settings['hitshippo_fedex_con_rate'])) ? $general_settings['hitshippo_fedex_con_rate'] : ''; ?>">
						</td>
					</tr>
				</table>
			</div>
   		</div>
   		<div id="content2">
   			<h3><?php _e('Shipper Address','hitshippo_fedex') ?></h3>
			<div>
				<table style="width:100%;">
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Shipping Person Name','hitshippo_fedex') ?>"></span>	<?php _e('Shipper Name','hitshippo_fedex') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<input type="text" name="hitshippo_fedex_shipper_name" value="<?php echo (isset($general_settings['hitshippo_fedex_shipper_name'])) ? $general_settings['hitshippo_fedex_shipper_name'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Shipper Company Name.','hitshippo_fedex') ?>"></span>	<?php _e('Company Name','hitshippo_fedex') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<input type="text" name="hitshippo_fedex_company" value="<?php echo (isset($general_settings['hitshippo_fedex_company'])) ? $general_settings['hitshippo_fedex_company'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Shipper Mobile / Contact Number.','hitshippo_fedex') ?>"></span>	<?php _e('Contact Number','hitshippo_fedex') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<input type="text" name="hitshippo_fedex_mob_num" value="<?php echo (isset($general_settings['hitshippo_fedex_mob_num'])) ? $general_settings['hitshippo_fedex_mob_num'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Email Address of the Shipper.','hitshippo_fedex') ?>"></span>	<?php _e('Email Address','hitshippo_fedex') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<input type="text" name="hitshippo_fedex_email" value="<?php echo (isset($general_settings['hitshippo_fedex_email'])) ? $general_settings['hitshippo_fedex_email'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Address Line 1 of the Shipper from Address.','hitshippo_fedex') ?>"></span>	<?php _e('Address Line 1','hitshippo_fedex') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<input type="text" name="hitshippo_fedex_address1" value="<?php echo (isset($general_settings['hitshippo_fedex_address1'])) ? $general_settings['hitshippo_fedex_address1'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Address Line 2 of the Shipper from Address.','hitshippo_fedex') ?>"></span>	<?php _e('Address Line 2','hitshippo_fedex') ?></h4>
						</td>
						<td>
							<input type="text" name="hitshippo_fedex_address2" value="<?php echo (isset($general_settings['hitshippo_fedex_address2'])) ? $general_settings['hitshippo_fedex_address2'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('City of the Shipper from address.','hitshippo_fedex') ?>"></span>	<?php _e('City','hitshippo_fedex') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<input type="text" name="hitshippo_fedex_city" value="<?php echo (isset($general_settings['hitshippo_fedex_city'])) ? $general_settings['hitshippo_fedex_city'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('State of the Shipper from address.','hitshippo_fedex') ?>"></span>	<?php _e('State (Two Digit String)','hitshippo_fedex') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<input type="text" name="hitshippo_fedex_state" value="<?php echo (isset($general_settings['hitshippo_fedex_state'])) ? $general_settings['hitshippo_fedex_state'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Postal/Zip Code.','hitshippo_fedex') ?>"></span>	<?php _e('Postal/Zip Code','hitshippo_fedex') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<input type="text" name="hitshippo_fedex_zip" value="<?php echo (isset($general_settings['hitshippo_fedex_zip'])) ? $general_settings['hitshippo_fedex_zip'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Country of the Shipper from Address.','hitshippo_fedex') ?>"></span>	<?php _e('Country','hitshippo_fedex') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<select name="hitshippo_fedex_country" style="width:153px;">
								<?php foreach($countires as $key => $value)
								{
									if(isset($general_settings['hitshippo_fedex_country']) && ($general_settings['hitshippo_fedex_country'] == $key))
									{
										echo "<option value=".$key." selected='true'>".$value."</option>";
									}
									else
									{
										echo "<option value=".$key.">".$value."</option>";
									}
								} ?>
							</select>
						</td>
					</tr>
				</table>
			</div>
   		</div>
   		<div id="content3">
   			<h3><?php _e('Fedex Shipping Rates','hitshippo_fedex') ?></h3>
			<div>
				<table style="width:100%;">
					<tr>
						<td style=" width: 50%; ">
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Enable Real time Rates to Show Rates in Checkout Page','hitshippo_fedex') ?>"></span>	<?php _e('Can I Show Rates?','hitshippo_fedex') ?></h4>
						</td>
						<td>
							<input type="checkbox" name="hitshippo_fedex_rates" <?php echo (isset($general_settings['hitshippo_fedex_rates']) && $general_settings['hitshippo_fedex_rates'] == 'yes') ? 'checked="true"' : ''; ?> value="yes" > <?php _e('Yes','hitshippo_fedex') ?>
						</td>
					</tr>

					<tr>
						<td style=" width: 50%; ">
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Enable this option to fetch the fedex account/negotiable rates','hitshippo_fedex') ?>"></span>	<?php _e('Fedex Account Rates','hitshippo_fedex') ?></h4>
						</td>
						<td>
							<input type="checkbox" name="hitshippo_fedex_account_rates" <?php echo (isset($general_settings['hitshippo_fedex_account_rates']) && $general_settings['hitshippo_fedex_account_rates'] == 'yes') ? 'checked="true"' : ''; ?> value="yes" > <?php _e('Yes','hitshippo_fedex') ?>
						</td>
					</tr>
					<tr>
						<td style=" width: 50%; ">
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Enable this option to show services considered as Fedex One rates','hitshippo_fedex') ?>"></span>	<?php _e('Fedex One Rates','hitshippo_fedex') ?></h4>
						</td>
						<td>
							<input type="checkbox" name="hitshippo_fedex_one_rates" <?php echo (isset($general_settings['hitshippo_fedex_one_rates']) && $general_settings['hitshippo_fedex_one_rates'] == 'yes') ? 'checked="true"' : ''; ?> value="yes" > <?php _e('Yes','hitshippo_fedex') ?>
						</td>
					</tr>
					<tr>
						<td style=" width: 50%; ">
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Enable this option to Door to Door Delivery','hitshippo_fedex') ?>"></span>	<?php _e('Residential Delivery','hitshippo_fedex') ?></h4>
						</td>
						<td>
							<input type="checkbox" name="hitshippo_fedex_res_f" <?php echo (isset($general_settings['hitshippo_fedex_res_f']) && $general_settings['hitshippo_fedex_res_f'] == 'yes') ? 'checked="true"' : ''; ?> value="yes" > <?php _e('Yes','hitshippo_fedex') ?>
						</td>
					</tr>

					<tr>
						<td style=" width: 50%; ">
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Enable this option to Check the Request and Response','hitshippo_fedex') ?>"></span>	<?php _e('Plugin is not Working? (This option show the request and Response in cart / Checkout Page)','hitshippo_fedex') ?></h4>
						</td>
						<td>
							<input type="checkbox" name="hitshippo_fedex_developer_rate" <?php echo (isset($general_settings['hitshippo_fedex_developer_rate']) && $general_settings['hitshippo_fedex_developer_rate'] == 'yes') ? 'checked="true"' : ''; ?> value="yes" > <?php _e('Yes','hitshippo_fedex') ?>
						</td>
					</tr>
					<tr>
						<td style=" width: 50%; ">
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Mail to the following Email address for Quick Support.','hitshippo_fedex') ?>"></span>	<?php _e('HITStacks Support Email','hitshippo_fedex') ?></h4>
						</td>
						<td>
							<a href="#" target="_blank">contact@hitstacks.com</a>
						</td>
					</tr>
					
				</table>
			</div>
   		</div>
   		<div id="content4">
   			<h3><?php _e('Fedex Services (Change Name of the Services As you want)','hitshippo_fedex') ?></h3>
			<div>
				<table style="width:100%;">
				<tr>
					<td colspan="2">
						<h4><?php _e('Why this?','hitshippo_fedex') ?><br/><?php _e('1) Enable Checkbox to Get the Service in Checkout Page','hitshippo_fedex') ?><br/><?php _e('2) Add New Name in the Textbox to Change the Core Service Name.','hitshippo_fedex') ?></h4>
					</td>
				</tr>
						<?php foreach($_carriers as $key => $value)
						{
							echo '	<tr>
									<td style="width:50%;">
									<input type="checkbox" value="yes" class="fedex_service" name="hitshippo_fedex_carrier['.$key.']" '. ((isset($general_settings['hitshippo_fedex_carrier'][$key]) && $general_settings['hitshippo_fedex_carrier'][$key] == 'yes') ? 'checked="true"' : '') .' > <small>'.$value.'</small>
									</td>
									<td>
										<input type="text" name="hitshippo_fedex_carrier_name['.$key.']" value="'.((isset($general_settings['hitshippo_fedex_carrier_name'][$key])) ? $general_settings['hitshippo_fedex_carrier_name'][$key] : '').'">
									</td>
									</tr>';
						} ?>
					<tr>
						<td colspan="2" style="text-align: left;">
							<button type="button" id="checkAll" class="button">Select All</button>
							<button style="margin-left: 15px" type="button" id="uncheckAll" class="button">Unselect All</button>
						</td>
					</tr>
				</table>
			</div>
   		</div>
   		<div id="content5">
   			<h3><?php _e('Package Properties','hitshippo_fedex') ?></h3>
			<div>
				<table style="width:100%;">
					<tr>
						<td style="width:50%;">
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Choose your packing type','hitshippo_fedex') ?>"></span>	<?php _e('Packing type','hitshippo_fedex') ?></h4>
						</td>
						<td>
							<select name="hitshippo_fedex_packing_type" style="width:153px;">
								<?php foreach($packing_type as $key => $value)
								{
									if(isset($general_settings['hitshippo_fedex_packing_type']) && ($general_settings['hitshippo_fedex_packing_type'] == $key))
									{
										echo "<option value=".$key." selected='true'>".$value."</option>";
									}
									else
									{
										echo "<option value=".$key.">".$value."</option>";
									}
								} ?>
							</select>
						</td>
						<tr>
							<td style="width:50%;">
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Enter maximum weight per package. (Manditory for Weight based Packing)','hitshippo_fedex') ?>"></span>	<?php _e('Maximum Weight','hitshippo_fedex') ?><font style="color:red;">*</font></h4>
							</td>
							<td>
							<input type="number" name="hitshippo_fedex_max_weight" placeholder="" value="<?php echo (isset($general_settings['hitshippo_fedex_max_weight'])) ? $general_settings['hitshippo_fedex_max_weight'] : ''; ?>">
							</td>
						</tr>
					</tr>
				</table>
			</div>
   		</div>
   		<div id="content6">
   			<h3><?php _e('Shipping Label','hitshippo_fedex') ?></h3>
			<div>
				<table style="width:100%;">
					<tr>
						<td style="width:50%;">
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Enter HitShippo integration key.','hitshippo_fedex') ?>"></span>	<?php _e('Shippo integration Key','hitshippo_fedex') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<input type="text" name="hitshippo_fedex_shippo_int_key" value="<?php echo (isset($general_settings['hitshippo_fedex_shippo_int_key'])) ? $general_settings['hitshippo_fedex_shippo_int_key'] : ''; ?>">
							<br/><a href="https://hitstacks.com/hitshipo.php">Don't have key? Signup here</a>
						</td>
					</tr>
					<tr>
						<td style="width:50%;">
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Enable this to generate shipping label automatically when the order is placed.','hitshippo_fedex') ?>"></span>	<?php _e('Auto label generation?','hitshippo_fedex') ?></h4>
						</td>
						<td>
							<input type="checkbox" name="hitshippo_fedex_shippo_label_gen" <?php echo (isset($general_settings['hitshippo_fedex_shippo_label_gen']) && $general_settings['hitshippo_fedex_shippo_label_gen'] == 'yes') ? 'checked="true"' : ''; ?> value="yes" > <?php _e('Yes','hitshippo_fedex') ?>
						</td>
					</tr>
					<tr>
						<td style="width:50%;">
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Enter Email, if you want to get the generated labels on mail.','hitshippo_fedex') ?>"></span>	<?php _e('Enter Email','hitshippo_fedex') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<input type="Email" name="hitshippo_fedex_shippo_mail" value="<?php echo (isset($general_settings['hitshippo_fedex_shippo_mail'])) ? $general_settings['hitshippo_fedex_shippo_mail'] : ''; ?>">
						</td>
					</tr>

					<tr>
						<td style="width:50%;">
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Select format for shipping labels','hitshippo_fedex') ?>"></span>	<?php _e('Label Format/Type','hitshippo_fedex') ?></h4>
						</td>
						<td>
							<b>PDF / COMMON2D</b>
						</td>
					</tr>
					
					<tr>
						<td style="width:50%;">
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Select size for shipping labels','hitshippo_fedex') ?>"></span> <?php _e('Shipping Label Size','hitshippo_fedex') ?></h4>
						</td>
						<td>
							<select style='width: 170px' name="hitshippo_fedex_label_size">
								<?php foreach($printer_doc_size as $key => $value)
								{
									if(isset($general_settings['hitshippo_fedex_label_size']) && ($general_settings['hitshippo_fedex_label_size'] == $key))
									{
										echo "<option style='width: 40px' value=".$key." selected='true'>".$value."</option>";
									}
									else
									{
										echo "<option style='width: 40px' value=".$key.">".$value."</option>";
									}
								} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td style="width:50%;">
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Select drop off type for shipments','hitshippo_fedex') ?>"></span> <?php _e('Shipping Drop Off Type','hitshippo_fedex') ?></h4>
						</td>
						<td>
							<select style='width: 170px' name="hitshippo_fedex_drop_off">
								<?php foreach($shipment_drop_off_type as $key => $value)
								{
									if(isset($general_settings['hitshippo_fedex_drop_off']) && ($general_settings['hitshippo_fedex_drop_off'] == $key))
									{
										echo "<option style='width: 40px' value=".$key." selected='true'>".$value."</option>";
									}
									else
									{
										echo "<option style='width: 40px' value=".$key.">".$value."</option>";
									}
								} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td style="width:50%;">
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Select packing type for packages','hitshippo_fedex') ?>"></span> <?php _e('Shipping Pack Type','hitshippo_fedex') ?></h4>
						</td>
						<td>
							<select style='width: 170px' name="hitshippo_fedex_ship_pack_type">
								<?php foreach($shipment_packing_type as $key => $value)
								{
									if(isset($general_settings['hitshippo_fedex_ship_pack_type']) && ($general_settings['hitshippo_fedex_ship_pack_type'] == $key))
									{
										echo "<option style='width: 40px' value=".$key." selected='true'>".$value."</option>";
									}
									else
									{
										echo "<option style='width: 40px' value=".$key.">".$value."</option>";
									}
								} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td style="width:50%;">
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Enable collect on delivery for domestic shipments.','hitshippo_fedex') ?>"></span>	<?php _e('Collect On Delivery (COD)','hitshippo_fedex') ?></h4>
						</td>
						<td>
							<input type="checkbox" id="hitshippo_fedex_cod"  name="hitshippo_fedex_cod" <?php echo (isset($general_settings['hitshippo_fedex_cod']) && $general_settings['hitshippo_fedex_cod'] == 'yes') ? 'checked="true"' : ''; ?> value="yes" > <?php _e('Yes','hitshippo_fedex') ?>
						</td>
					</tr>
					<tr id="col_type">
						<td style="width:50%;">
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Select Collection type for COD','hitshippo_fedex') ?>"></span> <?php _e('Collection Type (for COD)','hitshippo_fedex') ?></h4>
						</td>
						<td>
							<select style='width: 170px' name="hitshippo_fedex_collection_type">
								<?php foreach($collection_type as $key => $value)
								{
									if(isset($general_settings['hitshippo_fedex_collection_type']) && ($general_settings['hitshippo_fedex_collection_type'] == $key))
									{
										echo "<option style='width: 40px' value=".$key." selected='true'>".$value."</option>";
									}
									else
									{
										echo "<option style='width: 40px' value=".$key.">".$value."</option>";
									}
								} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td style="width:50%;">
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Provide some descriptions about the shipment','hitshippo_fedex') ?>"></span>	<?php _e('Shipment Content Description','hitshippo_fedex') ?></h4>
						</td>
						<td>
							<textarea type="text" name="hitshippo_fedex_shipment_content" value="<?php echo (isset($general_settings['hitshippo_fedex_shipment_content'])) ? $general_settings['hitshippo_fedex_shipment_content'] : ''; ?>"></textarea>
						</td>
					</tr>
				</table>
			</div>
   		</div>
   		<div id="content7">
   			<h3><?php _e('Multi Vendor Support','hitshippo_fedex') ?></h3>
      	<p></p>
			<div>
				<table style="width:100%">
					<tr>
						<td style=" width: 50%; ">
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Enable multi vendor to create shipping label from diffrent address.','hitshippo_fedex') ?>"></span>	<?php _e('Are you using Multi vendor?','hitshippo_fedex') ?></h4>
						</td>
						<td>
							<input type="checkbox" name="hitshippo_fedex_v_enable" <?php echo (isset($general_settings['hitshippo_fedex_v_enable']) && $general_settings['hitshippo_fedex_v_enable'] == 'yes') ? 'checked="true"' : ''; ?> value="yes" > <?php _e('Yes','hitshippo_fedex') ?>
						</td>
					</tr>
					<tr>
						<td style=" width: 50%; ">
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('The shipping rates calculates from this address only. Suppose 2 vendors products in same cart. Then We will calculate the each vendor shipping cost then update to customers.','hitshippo_fedex') ?>"></span>	<?php _e('Do I wants to calculate the shipping rates based on vendor address?','hitshippo_fedex') ?></h4>
						</td>
						<td>
							<input type="checkbox" name="hitshippo_fedex_v_rates" <?php echo (isset($general_settings['hitshippo_fedex_v_rates']) && $general_settings['hitshippo_fedex_v_rates'] == 'yes') ? 'checked="true"' : '' ; ?> value="yes" > <?php _e('Yes','hitshippo_fedex') ?>
						</td>
					</tr>
					<tr>
						<td style=" width: 50%; ">
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('The shipping Label created from vendor address to customer address.','hitshippo_fedex') ?>"></span>	<?php _e('Do I wants to create shipping labels based on vendor address?','hitshippo_fedex') ?></h4>
						</td>
						<td>
							<input type="checkbox" name="hitshippo_fedex_v_labels" <?php echo (isset($general_settings['hitshippo_fedex_v_labels']) && $general_settings['hitshippo_fedex_v_labels'] == 'yes') ? 'checked="true"' : '' ; ?> value="yes" > <?php _e('Yes','hitshippo_fedex') ?>
						</td>
					</tr>
					<tr>
						<td style=" width: 50%; ">
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('The shipping Label created from vendor address to customer address.','hitshippo_fedex') ?>"></span>	<?php _e('What all are the user roles used for multi vendor?','hitshippo_fedex') ?></h4>
						</td>
						<td>

							<select name="hitshippo_fedex_v_roles[]" multiple="true" class="wc-enhanced-select">

								<?php foreach (get_editable_roles() as $role_name => $role_info){
									// if (isset($general_settings['hitshippo_fedex_v_roles'])) {

										if(isset($general_settings['hitshippo_fedex_v_roles']) && in_array($role_name, $general_settings['hitshippo_fedex_v_roles'])){
											echo "<option value=".$role_name." selected='true'>".$role_info['name']."</option>";
										}else{
											echo "<option value=".$role_name.">".$role_info['name']."</option>";	
										}
									// }else{
									// 		echo "<option value=".$role_name.">".$role_info['name']."</option>";	
									// 	}
									}
								?>

							</select>
						</td>
					</tr>
					<tr>
						<td style=" width: 50%; ">
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Once shipping label is generated, Shipping Label will email to the vendor emails.','hitshippo_fedex') ?>"></span>	<?php _e('Do i wants to sent created shipping label to the vendor email?','hitshippo_fedex') ?></h4>
						</td>
						<td>
							<input type="checkbox" name="hitshippo_fedex_v_email" <?php echo (isset($general_settings['hitshippo_fedex_v_email']) && $general_settings['hitshippo_fedex_v_email'] == 'yes') ? 'checked="true"' : '' ; ?> value="yes" > <?php _e('Yes','hitshippo_fedex') ?>
						</td>
					</tr>
				</table>
				
			</div>
   		</div>



<!-- Content end -->
   </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var fedex_curr = '<?php echo $general_settings['hitshippo_fedex_currency']; ?>';
	var woo_curr = '<?php echo $general_settings['hitshippo_fedex_woo_currency']; ?>';
	var fedex_cod = '<?php echo $general_settings['hitshippo_fedex_cod']; ?>';

    if('#checkAll'){
    	$('#checkAll').on('click',function(){
            $('.fedex_service').each(function(){
                this.checked = true;
            });
    	});
    }
    if('#uncheckAll'){
    $('#uncheckAll').on('click',function(){
            $('.fedex_service').each(function(){
                this.checked = false;
            });
    	});
	}

	if (fedex_curr != null && fedex_curr == woo_curr) {
		$('.con_rate').each(function(){
		jQuery('.con_rate').hide();
	    });
	}else{
		if($("#auto_con").prop('checked') == true){
			jQuery('.con_rate').hide();
		}else{
			$('.con_rate').each(function(){
			jQuery('.con_rate').show();
		    });
		}
	}

	$("#auto_con").change(function() {
	    if(this.checked) {
	        jQuery('.con_rate').hide();
	    }else{
	    	if (fedex_curr != woo_curr) {
	    		jQuery('.con_rate').show();
	    	}
	    }
	});

	$("#hitshippo_fedex_cod").change(function() {
		if(this.checked) {
	        jQuery('#col_type').show();
	    }else{
	    	jQuery('#col_type').hide();
	    }
	});

	if (fedex_cod != "yes") {
		jQuery('#col_type').hide();
	}

});


</script>
