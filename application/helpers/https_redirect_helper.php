<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
function redirectToHTTPS()
{
  if($_SERVER['HTTPS']!="on")
  {
     $redirect= "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
     header("Location:$redirect");
  }
}