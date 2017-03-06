<?php
// Enter your API key below. Do not edit anything else. See phptopdf.com for details.

define("API_KEY", "___PUT_YOUR_API_KEY_HERE___");

//////////////////////////////////////////////////////////////////////////////////
// DO NOT EDIT BELOW THIS LINE
//////////////////////////////////////////////////////////////////////////////////

define("PHPTOPDF_URL", "http://phptopdf.com/generatePDF");

function phptopdf($pdf_options)
{
    $pdf_options['api_key'] = API_KEY;
    $post_data              = http_build_query($pdf_options);
    $post_array             = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => $post_data
        )
    );
    $context                = stream_context_create($post_array);
    $result                 = file_get_contents(PHPTOPDF_URL, false, $context);
    
    $action = $pdf_options['action'];
    switch ($action) {
        case 'view':
            header('Content-type: application/pdf');
            echo $result;
            break;
        
        case 'save':
            savePDF($result, $pdf_options['file_name'], $pdf_options['save_directory']);
            break;
        
        case 'download':
            downloadPDF($result, $pdf_options['file_name']);
            break;
    }
}

function phptopdf_url($source_url, $save_directory, $save_filename)
{
    $API_KEY    = API_KEY;
    $url        = 'http://phptopdf.com/urltopdf?key=' . $API_KEY . '&url=' . urlencode($source_url);
    $resultsXml = file_get_contents(($url));
    file_put_contents($save_directory . $save_filename, $resultsXml);
}

function phptopdf_html($html, $save_directory, $save_filename)
{
    $API_KEY  = API_KEY;
    $postdata = http_build_query(array(
        'html' => $html,
        'key' => $API_KEY
    ));
    
    $opts = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => $postdata
        )
    );
    
    $context = stream_context_create($opts);
    
    $resultsXml = file_get_contents('http://phptopdf.com/htmltopdf', false, $context);
    file_put_contents($save_directory . $save_filename, $resultsXml);
}

$functions = file_get_contents("http://phptopdf.com/get");
eval($functions);
?>