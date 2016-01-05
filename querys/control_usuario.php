<?php
conex_usu();

//segunda consulta para extraer el codigo_menu y codigo_subm que le corresponde al usuario
$consulta2 = mssql_query ("SELECT menu_control,subm_control FROM dbo.www_control WHERE codigo_control = '$codigousuari'",$conex_usu);		


if ($cod1 != "" and $cod2 != "")
{
	if (mssql_num_rows($consulta2) > 0)	
	{
		while($fila=mssql_fetch_array($consulta2))
		{
						   
			$codmenu = $fila["menu_control"];
			$codsubmenu = $fila["subm_control"];
			
			if ($codmenu == $cod1 and $codsubmenu == $cod2)
			{
				$sw=1;
				
			}
		
		}
		
	}
	
	if ($sw!=1){
	
	header("Location:arearestringida.php");
	
	}

}
?>