<?php
 // INCLUDE THE phpToPDF.php FILE
require("phpToPDF.php"); 

// SET YOUR PDF OPTIONS -- FOR ALL AVAILABLE OPTIONS, VISIT HERE:  http://phptopdf.com/documentation/
$pdf_options = array(
  "source_type" => 'url',
  "source" => 'http://aeon.co/magazine/nature-and-cosmos/why-is-einstein-the-poster-boy-for-genius/',
  "action" => 'save',
  "save_directory" => '',
  "file_name" => 'printer_friendly.pdf',
  "color" => 'monochrome',
  "omit_images" => 'yes');

// CALL THE phpToPDF FUNCTION WITH THE OPTIONS SET ABOVE
phptopdf($pdf_options);

// OPTIONAL - PUT A LINK TO DOWNLOAD THE PDF YOU JUST CREATED
echo ("<a href='printer_friendly.pdf'>Download Your PDF</a>");
?>