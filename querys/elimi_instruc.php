<?php

$dir='../'.$url; 

if(file_exists($dir))
{
if(unlink($dir))
$fdgdfg=0;
}
else
$fdgdfgdfgdffg=5;


include ("../conex/conexion2.php");

conex_usu();
$listar = ("DELETE FROM dbo.www_upload WHERE menu_upload = $var1 and subm_upload = $var2 and corr_upload = $var3");			
$asup="<br><font color=red size=4><b>Archivo "."<font color=blue size=4>".$nomarch."</font>"." eliminado con Exito!</b></font><br>";
			
$listar_instruc = mssql_query ($listar, $conex_usu) or die ("Error de Conexion<br><b>" . mssql_error()."</b>");
header("Location:../eliminar_doc.php?est=1&asup=$asup&cod1=$var1&cod2=$var2");
	

?>