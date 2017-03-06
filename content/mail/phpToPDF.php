<?php	
	function phptopdf_url($source_url,$save_directory,$save_filename)
	{		
		$API_KEY = 'cyfzya23k6usecug0';
                $url = 'http://phptopdf.com/urltopdf.php?key='.$API_KEY.'&url='.urlencode($source_url);
		$resultsXml = file_get_contents(($url)); 		
		file_put_contents($save_directory.$save_filename,$resultsXml);
	}
	function phptopdf_html($html,$save_directory,$save_filename)
	{		
		$API_KEY = 'cyfzya23k6usecug0';
                $postdata = http_build_query(
			array(
				'html' => $html,
				'key' => $API_KEY
			)
		);
		
		$opts = array('http' =>
			array(
				'method'  => 'POST',
				'header'  => 'Content-type: application/x-www-form-urlencoded',				
				'content' => $postdata
			)
		);
		
		$context  = stream_context_create($opts);
		
		
		$resultsXml = file_get_contents('http://phptopdf.com/htmltopdf.php', false, $context);
		file_put_contents($save_directory.$save_filename,$resultsXml);
	}
?>