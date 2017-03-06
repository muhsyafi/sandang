<?php
 // INCLUDE THE phpToPDF.php FILE
require("phpToPDF.php"); 


///////////////////////////////////////////////////////////////////
// SAMPLE DATA -- YOU WOULD SELECT DATA FROM YOUR DATABASE HERE
// MySQL, etc --> SELECT * FROM EMPLOYEES....
$employees =   array( array( id => 1, 
                             name => "James Red",
                             hours => 36,
                             rate => 12.25, 
                            ),
                     array( id => 2, 
                            name => "Bob Green",
                            hours => 25,                            
                            rate => 14.00,
                          ),
                     array( id => 3, 
                            name => "Mark Yellow",
                            hours => 12,
                            rate => 8.50,
                          ),
                     array( id => 4, 
                            name => "Kevin Blue",
                            hours => 38,
                            rate => 24.00,
                          ),
                     array( id => 5, 
                            name => "Mike Pink",
                            hours => 40,
                            rate => 16.00,
                          ),
                     array( id => 6, 
                            name => "John White",
                            hours => 29,
                            rate => 9.25,
                          ),                                                                         
             );
///////////////////////////////////////////////////////////////////





$pdf_download_links="";





///////////////////////////////////////////////////////////////////
// LOOP THROUGH EACH RECORD AND CREATE INDIVIDUAL PDF FOR EACH
//
// EACH PDF WILL BE SAVED AS pdf_timesheet_$name.pdf
//
foreach ($employees as $row) {
    // GATHER THE VARIABLES
    $on_id=$row['id'];
    $on_name=$row['name'];
    $on_hours=$row['hours'];
    $on_rate=number_format($row['rate'], 2, '.', ',');
    /////////////////////////
    $on_total_pay=number_format($on_hours*$on_rate, 2, '.', ',');
    $on_safe_name=strtolower(str_replace(' ', '_', $on_name));
    $on_filename="pdf_timesheet_$on_safe_name.pdf";





    // PUT YOUR HTML IN A VARIABLE
    $my_html="<html lang=\"en\">
      <head>
        <meta charset=\"UTF-8\">
        <title>Sample Invoice</title>
        <link rel=\"stylesheet\" href=\"http://phptopdf.com/bootstrap.css\">
        <style>
          @import url(http://fonts.googleapis.com/css?family=Bree+Serif);
          body, h1, h2, h3, h4, h5, h6{
          font-family: 'Bree Serif', serif;
          }
        </style>
      </head>
      
      <body>
        <div class=\"container\">
          <div class=\"row\">
            <div class=\"col-xs-6\">
              <h1>
                <a href=\"http://phptopdf.com\">            
                Logo here
                </a>
              </h1>
            </div>
            <div class=\"col-xs-6 text-right\">
              <h1>Timesheet</h1>
              <h1><small>Week Of Jan 01 - Jan 07</small></h1>
            </div>
          </div>
          <div class=\"row\">
            <div class=\"col-xs-5\">
              <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                  <h4>For: &nbsp; <a href=\"#\">$on_name</a></h4>
                </div>
                <div class=\"panel-body\">
                  <p>
                  </p>
                </div>
              </div>
            </div>
            <div class=\"col-xs-5 col-xs-offset-2 text-right\">
              <!-- <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                  <h4>To : <a href=\"#\">Client Name</a></h4>
                </div>
                <div class=\"panel-body\">
                  <p>
                    Address <br>
                    details <br>
                    more <br>
                  </p>
                </div>
              </div> -->
            </div>
          </div>
          <!-- / end client details section -->
          <table class=\"table table-bordered\">
            <thead>
              <tr>
                <th class=\"text-center\">
                  <h4>Hours</h4>
                </th>
                <th class=\"text-center\">
                  <h4>Rate</h4>
                </th>
                <th class=\"text-center\">
                  <h4>Total</h4>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class=\"text-right\">$on_hours</td>
                <td class=\"text-right\">$on_rate</td>
                <td class=\"text-right\">$on_total_pay</td>
              </tr>
            </tbody>
          </table>
          </div>
          <br><br>
          This is a sample timesheet.  An indivdual timesheet is created for each employee (6 in this example).<br><br>
          In this example the css style is pulled from phptopdf.com/bootstrap.css
          You could also put all CSS in the header wrapped in <xmp> < style > </xmp> tags
        </div>
      </body>
    </html>";







// SET YOUR PDF OPTIONS -- FOR ALL AVAILABLE OPTIONS, VISIT HERE:  http://phptopdf.com/documentation/
$pdf_options = array(
  "source_type" => 'html',
  "source" => $my_html,
  "action" => 'save',
  "save_directory" => '',
  "file_name" => $on_filename);

// CALL THE phpToPDF FUNCTION WITH THE OPTIONS SET ABOVE
phptopdf($pdf_options);





$pdf_download_links.="<a href='$on_filename'>Download Timesheet For:  $on_name</a><br><br>";
}





// OPTIONAL - PUT A LINK TO DOWNLOAD THE PDFs YOU JUST CREATED
echo ("<h2>Download Timesheets</h2>$pdf_download_links");
?>