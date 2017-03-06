<?php
 // INCLUDE THE phpToPDF.php FILE
require("phpToPDF.php"); 

// PUT YOUR HTML IN A VARIABLE
$my_html="<HTML>
<h2>Test HTML 02</h2><br><br>
<div style=\"display:block; padding:20px; border:2pt solid:#FE9A2E; background-color:#F6E3CE; font-weight:bold;\">
phpToPDF is pretty cool! <br><br>
[This was orange, but I set the PDF option to monochrome (Black & White)]
</div><br><br>
For more examples, visit us here --> http://phptopdf.com/examples/
</HTML>";

// SET YOUR PDF OPTIONS -- FOR ALL AVAILABLE OPTIONS, VISIT HERE:  http://phptopdf.com/documentation/
$pdf_options = array(
  "source_type" => 'html',
  "source" => $my_html,
  "action" => 'view',
  "color" => 'monochrome',
  "page_orientation" => 'landscape');

// CALL THE phpToPDF FUNCTION WITH THE OPTIONS SET ABOVE
phptopdf($pdf_options);

?>