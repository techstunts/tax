<?php
include('keys-in-form-16.php');
include('func.php');

$dom = new DOMDocument;
libxml_use_internal_errors(TRUE);

$files = array(
'file:///home/amit/projects/returnkaro/extracts/tika-1.4-c1439Form16-AY15-16-Cvent.html',
'file:///home/amit/projects/returnkaro/extracts/tika-1.4-form16-Mridul.html'
);

foreach($files as $f){
	parse_pdf_file($f);
}


?>
