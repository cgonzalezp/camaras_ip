<?php
conex_usu();
$cons = ("select max(corr_upload) as codigo from dbo.www_upload");
$cons2 = mssql_query ($cons, $conex_usu) or die ("Error de Conexion<br><b>" . mssql_error()."</b>");
$cons3 = mssql_fetch_array($cons2);
$cons4 = $cons3["codigo"];

if ($cons4 <> 0){
	$cons4 = $cons4 + 1;
	}
	else{ 
	$cons4 = 1;
	}
	
//Grabar
$nombre = $_FILES['fichero']['name'];
$comentario = $_POST['comentario'];

$insertar = ("INSERT INTO dbo.www_upload (menu_upload,subm_upload,corr_upload,archivo_upload,comentario_upload,fecha_upload) values ('$varemp','$varsuc','$cons4', '$nombre','$comentario', getdate())");
			

			
mssql_query ($insertar, $conex_usu) or die ("Error de Conexion<br><b>" . mssql_error()."</b>");

				

?>