<?php
$sw=0;
conex_usu();
$listar =mssql_query ("SELECT * FROM dbo.www_upload WHERE menu_upload = $varemp and subm_upload = $varsuc" ,$conex_usu) or die ("Error de Conexion<br><b>" .mssql_error()."</b>");	

//$listar_instruc=mssql_query($listar, $conex_usu) or die ("Error de Conexion<br><b>".mssql_error()."</b>");

if (mssql_num_rows($listar /*$listar_instruc*/) == 0){
$varnot = "<br><font color=blue size=4>No hay registros en la base de datos</font>";
}else{
  $sw=1;
}
?>