<?php
 // INCLUDE THE phpToPDF.php FILE
require("phpToPDF.php"); 

// PUT YOUR HTML IN A VARIABLE -- I fill this up with text to take up about 4 pages
$my_html="<HTML>
<h2>phpToPDF - Page Numbers In Footer</h2><br><br>
<div style=\"display:block; padding:20px; border:2pt solid:#FE9A2E; background-color:#F6E3CE;\">
In our PDF Options array, we set: &nbsp; &nbsp; <xmp>footer => 'Page phptopdf_on_page_number of phptopdf_pages_total'</xmp><br><br>
Read More Here: &nbsp; &nbsp; &nbsp; http://phptopdf.com/documentation/#page_numbers
</div><br><br>
For more examples, visit us here --> http://phptopdf.com/examples/ <br><br><br><br><br>
<div style=\"margin:750px 0px 750px 0px;\">Lorem ipsum dolor sit amet</div>
<div style=\"margin:750px 0px 750px 0px;\">Lorem ipsum dolor sit amet</div>
<div style=\"margin:750px 0px 750px 0px;\">Lorem ipsum dolor sit amet</div>
<div style=\"margin:750px 0px 750px 0px;\">Lorem ipsum dolor sit amet</div>
<div style=\"margin:750px 0px 750px 0px;\">Lorem ipsum dolor sit amet</div>
<div style=\"margin:750px 0px 750px 0px;\">Lorem ipsum dolor sit amet</div>
<div style=\"margin:750px 0px 750px 0px;\">Lorem ipsum dolor sit amet</div>
</HTML>";

// SET YOUR PDF OPTIONS
// FOR ALL AVAILABLE OPTIONS, VISIT HERE:  http://phptopdf.com/documentation/
$pdf_options = array(
  "source_type" => 'html',
  "source" => $my_html,
  "footer" => 'Page phptopdf_on_page_number of phptopdf_pages_total',
  "action" => 'save',
  "save_directory" => '',
  "file_name" => 'simple_page_nums.pdf');

// CALL THE phpToPDF FUNCTION WITH THE OPTIONS SET ABOVE
phptopdf($pdf_options);

// OPTIONAL - PUT A LINK TO DOWNLOAD THE PDF YOU JUST CREATED
echo ("<a href='simple_page_nums.pdf'>Download Your PDF</a>");
?>