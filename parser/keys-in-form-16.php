<?php
class Keys{
	public static $stopwords_to_filter = array(
	' a ',' and ',' an ',' of ',' the ', ' to ', ' at '
	);

	public static $keys_in_form_16_level_0 = array(
	'name address employer',
	'name address employee',
	'pan deductor',
	'tan deductor',
	'pan deductee', 'pan employee',
	'assessment year',
	);


	public static $keys_in_form_16_level_1 = array(
	'name address employee',
	);
	
	public static $single_line_keys = array(
		'Gross total income' => array('required' => array('gross', 'income', '6', '7')),
		'Deductible amount under Chapter VI-A ' => array('required' => array('aggregate','chapter', 'vi','a')),
		'Tax payable' => array('required' => array('tax', 'payable'), 'optional' => array('14','15','16','17')),
	);

	public static $composite_keys_in_form_16 = array(
	'Period' => array('To', 'From'),
	'Summary Tax Deducted Source' => array('Status of Booking' => array('end' => 'Total')),
	'ANNEXURE - B' => array('Challan Serial Number Status of Booking*' => array('end' => 'Total')),
	'ANNEXURE FORM 16' => array('Description Gross Amount Exempted Taxable' => array('end' => 'Total')),
	''
	);
}

//var_dump($keys_in_form_16_level_0, $keys_in_form_16_level_1, $composite_keys_in_form_16);
