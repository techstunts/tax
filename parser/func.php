<?php

function parse_pdf_file($file){

	global $dom;
	$dom->loadHTMLFile($file);

	libxml_clear_errors();

	$xPath = new DOMXPath($dom);
	$paras = $xPath->query('//p'); //This is xPath. Really nice and better than anything

	$level_0_key_found = $level_1_key_found = false;
	$level_1_key_iteration = -1;
	$level_match_found = $level_match_mapped = false;
	$map = array();

	foreach($paras as $para) {
		
		$level_match_found = $level_match_mapped = false;
		
		$nodeValue = str_ireplace(Keys::$stopwords_to_filter, ' ', trim($para->nodeValue));
		
		if(in_array(strtolower($nodeValue), Keys::$keys_in_form_16_level_0)){
			$level_0_key_found = trim($para->nodeValue);
			$level_1_key_found = false;
			$level_match_found = true;
		}
		
		if(in_array(strtolower($nodeValue), Keys::$keys_in_form_16_level_1)){
			$level_1_key_found = trim($para->nodeValue);
			$level_1_key_iteration = 0;
			$level_match_found = true;
		}
		
		if($level_match_found == true){
			continue;
		}
		
		if($level_0_key_found != false){
			$map[$level_0_key_found] = trim($para->nodeValue);
			$level_0_key_found = false;
			$level_match_mapped = true;
		}
		
		if($level_1_key_found != false){
			if($level_1_key_iteration == 0){
				$level_1_key_iteration++;
			}
			else if($level_1_key_iteration == 1){
				$map[$level_1_key_found] = trim($para->nodeValue);
				$level_1_key_found = false;
				$level_match_mapped = true;
			}
		}
		
		if($level_match_mapped == true){
			continue;
		}
		
		$nodeLines = preg_split("/\n/", strtolower($para->nodeValue));
		foreach($nodeLines as $line){
			
			$nodeWords = preg_split("/[\s,()-\/]+/", $line);
			
			if(count($nodeWords)==0){
				continue;
			}
			
			//var_dump($nodeWords);
			
			foreach(Keys::$single_line_keys as $key => $value){
				//var_dump($value);
				if(count(array_diff($value['required'], $nodeWords)) == 0){
					//var_dump($nodeWords);
					if(isset($value['optional'])){
						if(count(array_intersect($value['optional'], $nodeWords)) == 0){
							continue;
						}
					}
					if(preg_match("/([\d,]{4,})(\.\d*)?/", $line, $matches)){
						$map[$key] = $matches[0];
					}
				}
			}
		}		
		
	}

	var_dump($map);
}
