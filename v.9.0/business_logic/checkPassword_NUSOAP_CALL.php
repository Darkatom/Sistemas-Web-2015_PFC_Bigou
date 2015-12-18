<?php
	//incluimos la clase nusoap.php
	require_once("http://bigou.pe.hu/business_logic/lib/nusoap/lib/nusoap.php");
	require_once("http://bigou.pe.hu/business_logic/lib/nusoap/lib/class.wsdlcache.php");

	//Creamos el objeto de tipo soapclient, donde se encuentra el servicio SOAP que vamos a utilizar.
	$soapclient = new nusoap_client("http://bigou.pe.hu/business_logic/checkPassword_NUSOAP.php?wsdl",false);
	
	//Llamamos la función que habíamos implementado en el Web Service e imprimimos lo que nos devuelve.
	$password = $_GET['password'];
	$result = $soapclient->call('checkPassword', array('password'=>$password));
	echo $result;
?>