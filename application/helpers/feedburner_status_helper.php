<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
    *Get your average Feedburner subscribers
    *Recently, Feedburner counts had lots of problems and it’s hard to say that the provided info is still relevant. This code will grab your subscriber count from the last 7 days and will return the average.
*/

function get_average_readers($feed_id,$interval = 7){
    $today = date('Y-m-d', strtotime("now"));
    $ago = date('Y-m-d', strtotime("-".$interval." days"));
    $feed_url="https://feedburner.google.com/api/awareness/1.0/GetFeedData?uri=".$feed_id."&dates=".$ago.",".$today;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $feed_url);
    $data = curl_exec($ch);
    curl_close($ch);
    $xml = new SimpleXMLElement($data);
    $fb = $xml->feed->entry['circulation'];

    $nb = 0;
    foreach($xml->feed->children() as $circ){
        $nb += $circ['circulation'];
    }

    return round($nb/$interval);
}