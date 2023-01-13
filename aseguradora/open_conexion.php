<?php 
	// Parametros a configurar para la conexion de la base de datos 
	$host = 'localhost';    // sera el valor de nuestra BD 
	$basededatos = 'aseguradora';    // sera el valor de nuestra BD 
	$usuariodb = 'root';    // sera el valor de nuestra BD 
	$clavedb = "";    // sera el valor de nuestra BD 

	// Tablas

	$tabla1 = 'incentivo';
	$tabla2 = 'empleado';
	$tabla3 = 'analista';
	$tabla4 = 'abogado';
	$tabla5 = 'vendedor';

	$conexion = new mysqli($host,$usuariodb,"",$basededatos);


?>