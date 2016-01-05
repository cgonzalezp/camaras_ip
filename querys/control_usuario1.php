<?php
conex_usu();

//Query para extraer codigo del usuario autentificado
$nomusuari=$_SESSION["usuario"];
$consulta1 = mssql_query ("SELECT codigo_usuario FROM dbo.adm_usuari WHERE nombre_usuario = '$nomusuari'",$conex_usu);
$dato = mssql_fetch_array ($consulta1);				   
$codigousuari = $dato["codigo_usuario"];

//Query para extraer codigo menu segun pagina actual
$query = mssql_query ("SELECT codigo_menu from dbo.www_menu WHERE nombre_menu = '$nombre_pagina'",$conex_usu);
$varconsulta = mssql_fetch_array ($query);				   
$controlmenu = $varconsulta["codigo_menu"];

$query2 = mssql_query ("SELECT * from dbo.www_control WHERE menu_control = '$controlmenu' and codigo_control = '$codigousuari' ",$conex_usu);

if ($cod1 =="" and $cod2 == "")
{
	if (mssql_num_rows($query2) == 0 )
	{
		header("Location:arearestringida.php");
	}

}

?>