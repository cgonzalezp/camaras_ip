<?php
include("../conex/conexion2.php");
conex_usu();

$con = mssql_query("select * from dbo.www_subm
					left join dbo.www_menu on
     				codigo_menu = menu_subm
					where nombre_menu = '$nombre_pagina'",$conex_usu);


if (!mssql_num_rows($con)) {
    echo 'No Existe Menu';
} else {
while($fila2=mssql_fetch_array($con))
	{?>

    	<p>
        
		<?php 
		$cod1=$fila2["menu_subm"];
		//echo"$cod1";
		$cod2=$fila2["codigo_subm"];
		//echo"$cod2";
		echo "<a href=".$fila2["pagina_subm"]."?cod1=$cod1&cod2=$cod2".">".$fila2["descripcion_subm"]."</a>";
		?>			
        
        </p>

<?php
	}
}
?>

