<?php 
echo "in download helper";
if (!defined('BASEPATH')) exit('No direct script access allowed');
function serve_file_resumable ($file, $contenttype = 'application/octet-stream') {

  if( !function_exists('apache_request_headers') ) {
  ///
  function apache_request_headers() {
    $arh = array();
    $rx_http = '/\AHTTP_/';
    foreach($_SERVER as $key => $val) {
    if( preg_match($rx_http, $key) ) {
      $arh_key = preg_replace($rx_http, '', $key);
      $rx_matches = array();
      // do some nasty string manipulations to restore the original letter case
      // this should work in most cases
      $rx_matches = explode('_', $arh_key);
      if( count($rx_matches) > 0 and strlen($arh_key) > 2 ) {
      foreach($rx_matches as $ak_key => $ak_val) $rx_matches[$ak_key] = ucfirst($ak_val);
      $arh_key = implode('-', $rx_matches);
      }
      $arh[$arh_key] = $val;
    }
    }
    return( $arh );
  }
  ///
  }
  ///

    // Avoid sending unexpected errors to the client - we should be serving a file,
    // we don't want to corrupt the data we send
    @error_reporting(0);

    // Make sure the files exists, otherwise we are wasting our time
    if (!file_exists($file)) {
      header("HTTP/1.1 404 Not Found");
      exit;
    }

    // Get the 'Range' header if one was sent
    if (isset($_SERVER['HTTP_RANGE'])) $range = $_SERVER['HTTP_RANGE']; // IIS/Some Apache versions
    else if ($apache = apache_request_headers()) { // Try Apache again
      $headers = array();
      foreach ($apache as $header => $val) $headers[strtolower($header)] = $val;
      if (isset($headers['range'])) $range = $headers['range'];
      else $range = FALSE; // We can't get the header/there isn't one set
    } else $range = FALSE; // We can't get the header/there isn't one set

    // Get the data range requested (if any)
    $filesize = filesize($file);

    echo "Filesize: ".$filesize."Range:".$range; die;

    if ($range) {
      $partial = true;
      list($param,$range) = explode('=',$range);
      if (strtolower(trim($param)) != 'bytes') { // Bad request - range unit is not 'bytes'
        header("HTTP/1.1 400 Invalid Request");
        exit;
      }
      $range = explode(',',$range);
      $range = explode('-',$range[0]); // We only deal with the first requested range
      if (count($range) != 2) { // Bad request - 'bytes' parameter is not valid
        header("HTTP/1.1 400 Invalid Request");
        exit;
      }
      if ($range[0] === '') { // First number missing, return last $range[1] bytes
        $end = $filesize - 1;
        $start = $end - intval($range[0]);
      } else if ($range[1] === '') { // Second number missing, return from byte $range[0] to end
        $start = intval($range[0]);
        $end = $filesize - 1;
      } else { // Both numbers present, return specific range
        $start = intval($range[0]);
        $end = intval($range[1]);
        if ($end >= $filesize || (!$start && (!$end || $end == ($filesize - 1)))) $partial = false; // Invalid range/whole file specified, return whole file
      }      
      $length = $end - $start;
    } else $partial = false; // No range requested

    // Send standard headers
    header("Content-Type: $contenttype");
    header("Content-Length: $filesize");
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Accept-Ranges: bytes');

    // if requested, send extra headers and part of file...
    if ($partial) {
      header('HTTP/1.1 206 Partial Content'); 
      header("Content-Range: bytes $start-$end/$filesize"); 
      if (!$fp = fopen($file, 'r')) { // Error out if we can't read the file
        header("HTTP/1.1 500 Internal Server Error");
        exit;
      }
      if ($start) fseek($fp,$start);
      while ($length) { // Read in blocks of 8KB so we don't chew up memory on the server
        $read = ($length > 8192) ? 8192 : $length;
        $length -= $read;
        print(fread($fp,$read));
      }
      fclose($fp);
    } else readfile($file); // ...otherwise just send the whole file

    // Exit here to avoid accidentally sending extra content on the end of the file
    exit;

  }