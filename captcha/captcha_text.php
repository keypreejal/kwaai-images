<?php
session_start();
if(isset($_POST['source']))
{
	echo trim($_SESSION['security_code']);
}

?>