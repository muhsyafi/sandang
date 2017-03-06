<?php
 // INCLUDE THE phpToPDF.php FILE
require("phpToPDF.php"); 

// SET YOUR PDF OPTIONS -- FOR ALL AVAILABLE OPTIONS, VISIT HERE:  http://phptopdf.com/documentation/
$pdf_options = array(
  "source_type" => 'url',
  "source" => 'http://slashdot.org/',
  "action" => 'view',
  "color" => 'monochrome',
  "page_orientation" => 'landscape');

// CALL THE phpToPDF FUNCTION WITH THE OPTIONS SET ABOVE
phptopdf($pdf_options);

?>