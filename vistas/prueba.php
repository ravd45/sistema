<?php 
/**
 * 
 */

class Ajax{
	
	function login()
	{
		print_r("Hola desde php");
	}
}
if (isset($_POST["usuario"])) {
	$a = new Ajax();
	$a->login();
}
 ?>