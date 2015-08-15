<?php
//https://cleartax.in/guide/UnderstandingForm16

include('keys-in-form-16.php');
include('func.php');

$dom = new DOMDocument;
libxml_use_internal_errors(TRUE);

$files = array(
'file:///home/amit/projects/returnkaro/extracts/tika-1.4-c1439Form16-AY15-16-Cvent.html',
//'file:///home/amit/projects/returnkaro/extracts/tika-1.4-form16-Mridul.html',
'file:///home/amit/projects/returnkaro/extracts/tika-1.4-Form16_FY2015-RahulJain.html',
'file:///home/amit/projects/returnkaro/extracts/tika-1.4-Form16_FY2014-AmitShah.html',
'file:///home/amit/projects/returnkaro/extracts/tika-1.4-Form16_FY2015-PoornimaJain.html',
'file:///home/amit/projects/returnkaro/extracts/tika-1.4-Form16_FY2015-PoornimaJain-b.html',
//'file:///home/amit/projects/returnkaro/extracts/tika-1.4-Form16_FY2015-PoornimaJain-b-short.html',
);

foreach($files as $f){
	parse_pdf_file($f);
}


?>
