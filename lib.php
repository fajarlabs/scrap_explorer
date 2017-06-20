<?php 
function scrapExplorer($url="", $preg_match_list = array(), $_xpath="") {
	// Create a stream
	$opts = array(
	  'http'=>array(
	    'method'=>"GET",
	    'header'=>"Accept-language: en\r\n" .
	              "Cookie: foo=bar\r\n"
	  )
	);
	$context = stream_context_create($opts);
	// Open the file using the HTTP headers set above
	$raw = file_get_contents($url, false, $context);

	$strProcessing = "";

	foreach($preg_match_list as $preg_match) {

		if(empty($strProcessing)) {
			// reference output
			preg_match_all($preg_match, $raw, $output);
			// implode an array
			$strProcessing = _arrayConversion(@array_unique($output));
		} else {
			// reference output
			preg_match_all($preg_match, $strProcessing, $output);
			// implode an array
			$strProcessing = _arrayConversion(@array_unique($output));
		}
	}

	return _buildNodeList($strProcessing,$_xpath);
}

// convert to nodes
function _buildNodeList($str_html = "", $_xpath = "") {
	libxml_use_internal_errors(true) && libxml_clear_errors(); // for html5

	// convert encoding
	$string = mb_convert_encoding($str_html, 'utf-8', mb_detect_encoding($str_html)); 
	$string = mb_convert_encoding($string, 'html-entities', 'utf-8'); 

	// dom html
	$html = new DOMDocument('1.0', 'UTF-8');
	$html->preserveWhiteSpace = false;  
	$html->loadhtml($string);
	$xpath = new DOMXPath($html);
	$nodelist = $xpath->query($_xpath);

	// export data
	$nodeArr = array();
	foreach($nodelist as $n) {
		$nodeArr[] = $n;
	}

	return $nodeArr;

}

// function rekursif
function _arrayConversion($data) {
	$string = "";
	if(is_array($data)) {
		foreach($data as $str) {
			$string .= _arrayConversion($str);
		}
	} else {
		$string .= $data;
	}
	return $string;
} ?>