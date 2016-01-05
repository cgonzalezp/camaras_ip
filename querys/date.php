<?php
/*  sube este fichero a tu sitio  
   y llámalo utilizando este include 
   <? include ("date.php"); ?> en la parte 
   que quieras que se visualize la  
   fecha y hora en tu web */ 
 
//Variable nombre del mes 
$nommes = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"); 
 
//variable nombre día 
$nomdia = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"); 
 
/* date(j) toma valores de 1 al 31 según el día del mes 
date(n) devuelve número del 1 al 12 según el mes 
date(w) devuelve 0 a 6 del dia de la semana empezando el domingo 
date(Y) devuelve el año en 4 digitos */ 
 
$dia = date('j'); //Día del mes en número 
$mes = date('n'); //Mes actual en número 
$diasemana = date('w'); //Día de semana en número 
 
$hoy = $nomdia[$diasemana].', '.$dia.' de '.$nommes[$mes-1].' del '.date('Y'); 
 
//echo $hoy;
?>