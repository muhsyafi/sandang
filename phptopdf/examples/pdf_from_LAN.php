<?php
 // INCLUDE THE phpToPDF.php FILE
require("phpToPDF.php"); 


 // SINCE AN INTERNAL / LAN WEBPAGE IS NOT ABLE TO BE ACCESSED FROM phptopdf.com
 // THE STANDARD source_type => URL, source => http://192.168.1.1/page.html WILL NOT WORK.  
 // YOU WILL NEED TO USE THE HTML source_type AFTER GETTING YOUR INTERNAL / LAN PAGE
 // INTO AN HTML VARIABLE.   THERE ARE TWO METHODS TO DO THIS.  AT LEAST 1 SHOULD WORK FOR YOU.

 // If you are having a problem, turn this setting in your php.ini to on (1).   allow_url_fopen = 1




// CHANGE THIS TO YOUR INTERNAL URL LIKE http://192.168.1.1/page.html
 $internal_url = 'http://17.178.96.59';
 




 // UNCOMMENT / COMMENT AS NEEDED TO TOGGLE BETWEEN THE TWO METHODS


 // METHOD 1 [using file_get_contents]
    $my_html = file_get_contents($internal_url);
    //die("<xmp>$my_html</xmp>");  // uncomment this to test the result of file_get_contents



    
 // METHOD 2 [using cURL]
/*	
	$ch = curl_init($internal_url);  
	curl_setopt($ch, CURLOPT_HEADER, 0);  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
	$my_html = curl_exec($ch);
	//die("<xmp>$my_html</xmp>");   // uncomment this to test the result of cURL
*/


// SET YOUR PDF OPTIONS -- FOR ALL AVAILABLE OPTIONS, VISIT HERE:  http://phptopdf.com/documentation/
$pdf_options = array(
  "source_type" => 'html',
  "source" => $my_html,
  "action" => 'save',
  "save_directory" => '',
  "file_name" => 'internal_LAN.pdf');

// CALL THE phpToPDF FUNCTION WITH THE OPTIONS SET ABOVE
phptopdf($pdf_options);

// OPTIONAL - PUT A LINK TO DOWNLOAD THE PDF YOU JUST CREATED
echo ("<a href='internal_LAN.pdf'>Download Your PDF</a>");
?>