<?php
session_start();
if ($_SESSION["usuario"]==""){
	header("Location:../index.html?nosession=1");}
else{
$most_usu=$_SESSION["usuario"];
$switch=1;
}
?>