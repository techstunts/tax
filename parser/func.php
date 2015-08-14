<?php

function parse_pdf_file($file){

	global $dom;
	$dom->loadHTMLFile($file);

	libxml_clear_errors();

	$xPath = new DOMXPath($dom);
	$paras = $xPath->query('//p'); //This is xPath. Really nice and better than anything

	$simple_key_found = $level_1_key_found = false;
	$level_1_key_iteration = -1;
	$map = array();

	foreach($paras as $para) {
		
		$match_found = false;
		
		$nodeValue = str_ireplace(Keys::$stopwords_to_filter, ' ', trim($para->nodeValue));
		
		if(in_array(strtolower($nodeValue), Keys::$keys_in_form_16_level_0)){
			$simple_key_found = trim($para->nodeValue);
			$level_1_key_found = false;
			$match_found = true;
		}
		
		if(in_array(strtolower($nodeValue), Keys::$keys_in_form_16_level_1)){
			$level_1_key_found = trim($para->nodeValue);
			$level_1_key_iteration = 0;
			$match_found = true;
		}
		
		if($match_found == true){
			continue;
		}
		
		if($simple_key_found != false){
			$map[$simple_key_found] = trim($para->nodeValue);
			$simple_key_found = false;
		}
		
		if($level_1_key_found != false){
			if($level_1_key_iteration == 0){
				$level_1_key_iteration++;
			}
			else if($level_1_key_iteration == 1){
				$map[$level_1_key_found] = trim($para->nodeValue);
				$level_1_key_found = false;
			}
		}
		
		
	}

	var_dump($map);
}
