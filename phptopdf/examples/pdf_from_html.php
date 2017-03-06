<?php
 // INCLUDE THE phpToPDF.php FILE
require("phpToPDF.php"); 

// PUT YOUR HTML IN A VARIABLE
$my_html="<HTML>
<h2>Test HTML 01</h2><br><br>
<div style=\"display:block; padding:20px; border:2pt solid:#FE9A2E; background-color:#F6E3CE; font-weight:bold;\">
phpToPDF is pretty cool!
</div><br><br>
For more examples, visit us here --> http://phptopdf.com/examples/
</HTML>";

// SET YOUR PDF OPTIONS
// FOR ALL AVAILABLE OPTIONS, VISIT HERE:  http://phptopdf.com/documentation/
$pdf_options = array(
  "source_type" => 'html',
  "source" => $my_html,
  "action" => 'save',
  "save_directory" => '',
  "file_name" => 'html_01.pdf');

// CALL THE phpToPDF FUNCTION WITH THE OPTIONS SET ABOVE
phptopdf($pdf_options);

// OPTIONAL - PUT A LINK TO DOWNLOAD THE PDF YOU JUST CREATED
echo ("<a href='html_01.pdf'>Download Your PDF</a>");
?>