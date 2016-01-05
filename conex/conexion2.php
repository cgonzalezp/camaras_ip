<?php 
function conex_usu ()
{
global $conex_usu; 
$conex_usu = mssql_connect("localhost", "sa", "soporte")
or die (mssql_error());
mssql_select_db("nucleo",$conex_usu)
or die (mssql_error());
}
?>
