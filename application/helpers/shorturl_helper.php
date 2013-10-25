<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
    * Get short urls for Twitter
    *Are you on Twitter? If yes, you probably use a url shortener such as bit.ly or TinyUrl to share your favorite blog posts and links on the network.
    *This snippet take a url as a parameter and will return a short url.
 */


function getTinyUrl($url) {
    return file_get_contents("http://tinyurl.com/api-create.php?url=".$url);
}