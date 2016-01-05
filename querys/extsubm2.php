<?php
include("../conex/conexion2.php");
conex_usu();
	
	/*$conexion = mssql_query("select menu_subm,codigo_subm,pagina_subm,
							 descripcion_subm from dbo.www_subm
							 where menu_subm ='$cod1'",$conex_usu); 
		*/
	$conexion = mssql_query("select menu_subm,codigo_subm,pagina_subm,
							descripcion_subm from dbo.www_subm
							left join dbo.www_menu on
							codigo_menu = menu_subm
							where nombre_menu = '$cod1'",$conex_usu);





if (!mssql_num_rows($conexion)) {
    echo 'No Existen Submenus';
} else {
while($fila3=mssql_fetch_array($conexion))
	{?>

    	<p>
        
		<?php 
		$cod3=$fila3["menu_subm"];
		//echo "$cod3";
		$cod4=$fila3["codigo_subm"];
		//echo "cod4";
		echo "<a href=".$fila3["pagina_subm"]."?cod1=$cod3&cod2=$cod4".">".$fila3["descripcion_subm"]."</a>";
		?>			
        
        </p>

<?php
	}
}
?>
	
	
	



