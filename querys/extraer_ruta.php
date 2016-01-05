<?php
include ("../conex/conexion2.php");
conex_usu();
$consul=mssql_query("SELECT directorio_menu FROM dbo.www_menu WHERE codigo_menu='$cod1'",$conex_usu);
$consul_directorio=mssql_fetch_array($consul);							 
$var_dir=$consul_directorio['directorio_menu'];

?>