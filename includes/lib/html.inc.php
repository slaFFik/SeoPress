<?php

function rs_get_title($url){
	
	if($html=@file_get_contents($url, false, $context)){

		// If libxml is installed
		if(class_exists('DOMDocument')){
			$doc = new DOMDocument();
			if(@$doc->loadHTML($html)==false){
				return false;
			}
			
			$titles=$doc->getElementsByTagName('title');
			
			foreach ($doc->getElementsByTagName('title') as $nodes)
			{
				 $pageTitle[] = $nodes->nodeValue;
			}
			
			return $pageTitle[0];	
			
		// Otherwise use preg_match				
		}else{
			
			$opts = array('http' =>
			array(
				'timeout' => 5
				)
			);
		
			$context  = stream_context_create($opts);
					
			preg_match('/<title>(\r\n)(.*)<\/title>/U', $html, $pageTitle);

			return $pageTitle[1];
					
		}
	}else{
		return "404 Page not found";
	}
	

	
	/*	
	$r = new HTTPRequest($url);
	$html =  $r->DownloadToString();
	preg_match('/<title>(.*)<\/title>/U', $html, $pageTitle);
	
	return $pageTitle[1];
	
	// $url="www.fachwissen-daten.de/berichte/die-neue-generation-an-gartenmobel/48";
	
	echo "allow_url_fopen: ".ini_get('allow_url_fopen') . '<br>';
	$fp = fsockopen($url, 80, $errno, $errstr, 5);
	if (!$fp) {
		echo "Nein!<br />";
		echo "$errstr ($errno)<br />\n";
	} else {
		
		/*
		$out = "GET / HTTP/1.1\r\n";
		$out .= "Host: www.example.com\r\n";
		$out .= "Connection: Close\r\n\r\n";
		fwrite($fp, $out);
		while (!feof($fp)) {
			echo fgets($fp, 128);
		}
		fclose($fp);
		
	}
	
	
	
	$file = @fopen ($url,"r");
	
	if (trim($file) == "") {
		echo "Service out of order";
		return false;
	} else {
		$i=0;
		while (!feof($file)) {
	
			// Wenn das File entsprechend groß ist, kann es unter Umständen
			// notwendig sein, die Zahl 2000 entsprechend zu erhöhen. Im Falle
			// eines Buffer-Overflows gibt PHP eine entsprechende Fehlermeldung aus.
	
			$zeile[$i] = fgets($file,2000);
			$i++;
		}
		$html=implode($zeile);
		
		preg_match('/<title>(.*)<\/title>/U', $html, $pageTitle);
		
		return $pageTitle[1];
	}
	
	
	fclose($file);
	
	$html=file_get_contents($url);

	
	
	// cURL URL Aufruf
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	
	// Daten aus der URL auslesen
	$inhalt      = curl_exec($ch);
	$daten       = unserialize($inhalt);
	echo $daten[0][0];
	
	// cURL wird geschlossen
	curl_close($ch);
	
	preg_match('/<title>(.*)<\/title>/U', $inhalt, $pageTitle);
	return $pageTitle[1];  
	

	$opts = array('http' =>
    array(
        'timeout' => 5
    	)
	);

	$context  = stream_context_create($opts);
	
	if($html=file_get_contents($url, false, $context)){
		
		// echo $html;
		
		preg_match('/<title>(\r\n)(.*)<\/title>/U', $html, $pageTitle);
		
		return $pageTitle[1];
	}else{
		return "404 Page not found";
	}
	*/ 
}

class HTTPRequest
{
    var $_fp;        // HTTP socket
    var $_url;        // full URL
    var $_host;        // HTTP host
    var $_protocol;    // protocol (HTTP/HTTPS)
    var $_uri;        // request URI
    var $_port;        // port
   
    // scan url
    function _scan_url()
    {
        $req = $this->_url;
       
        $pos = strpos($req, '://');
        $this->_protocol = strtolower(substr($req, 0, $pos));
       
        $req = substr($req, $pos+3);
        $pos = strpos($req, '/');
        if($pos === false)
            $pos = strlen($req);
        $host = substr($req, 0, $pos);
       
        if(strpos($host, ':') !== false)
        {
            list($this->_host, $this->_port) = explode(':', $host);
        }
        else
        {
            $this->_host = $host;
            $this->_port = ($this->_protocol == 'https') ? 443 : 80;
        }
       
        $this->_uri = substr($req, $pos);
        if($this->_uri == '')
            $this->_uri = '/';
    }
   
    // constructor
    function HTTPRequest($url)
    {
        $this->_url = $url;
        $this->_scan_url();
    }
   
    // download URL to string
    function DownloadToString()
    {
        $crlf = "\r\n";
       
        // generate request
        $req = 'GET ' . $this->_uri . ' HTTP/1.0' . $crlf
            .    'Host: ' . $this->_host . $crlf
            .    $crlf;
       
        // fetch
        $this->_fp = fsockopen(($this->_protocol == 'https' ? 'ssl://' : '') . $this->_host, $this->_port,$errno, $errstr, 5);
        fwrite($this->_fp, $req);
        while(is_resource($this->_fp) && $this->_fp && !feof($this->_fp))
            $response .= fread($this->_fp, 1024);
        fclose($this->_fp);
       
        // split header and body
        $pos = strpos($response, $crlf . $crlf);
        if($pos === false)
            return($response);
        $header = substr($response, 0, $pos);
        $body = substr($response, $pos + 2 * strlen($crlf));
       
        // parse headers
        $headers = array();
        $lines = explode($crlf, $header);
        foreach($lines as $line)
            if(($pos = strpos($line, ':')) !== false)
                $headers[strtolower(trim(substr($line, 0, $pos)))] = trim(substr($line, $pos+1));
       
        // redirection?
        if(isset($headers['location']))
        {
            $http = new HTTPRequest($headers['location']);
            return($http->DownloadToString($http));
        }
        else
        {
            return($body);
        }
    }
} 

?>