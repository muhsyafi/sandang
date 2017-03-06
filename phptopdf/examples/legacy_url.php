<?php
 // INCLUDE THE phpToPDF.php FILE
 require("phpToPDF.php"); 
 
 // GENERATE PDF FILE FROM SPECIFIED URL, SAVES TO CURRENT DIRECTORY ('/')
 phptopdf_url('http://google.com/','', 'legacy_url_example.pdf');
  
 // OPTIONAL - PUT A LINK TO DOWNLOAD THE PDF YOU JUST CREATED
 echo ("<a href='legacy_url_example.pdf'>Download Your PDF</a>");
?> 