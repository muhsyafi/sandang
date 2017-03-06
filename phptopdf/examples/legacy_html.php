<?php
 // INCLUDE THE phpToPDF.php FILE
 require("phpToPDF.php"); 
 
 // GENERATE PDF FILE FROM SPECIFIED URL, SAVES TO CURRENT DIRECTORY ('')
 phptopdf_html('<html>Hello World!<br><br>HTML Test using phpToPDF</html>','', 'legacy_html_example.pdf');
  
 // OPTIONAL - PUT A LINK TO DOWNLOAD THE PDF YOU JUST CREATED
 echo ("<a href='legacy_html_example.pdf'>Download Your PDF</a>");
?> 