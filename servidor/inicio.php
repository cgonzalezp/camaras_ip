<!DOCTYPE html> 
<html>
<head>

<meta charset="utf-8">
<title>Dimarsa Movil</title>
<meta name="viewport" content="width=device-width"/>
<link href="jquery-mobile/jquery.mobile-1.0.min.css" rel="stylesheet" type="text/css"/>
<script src="jquery-mobile/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="jquery-mobile/jquery.mobile-1.0.min.js" type="text/javascript"></script>
</head> 
<body> 

<div data-role="page" id="page">
	<div data-theme="b" data-role="header"><a href="../index.html" data-direction="reverse" data-icon="back"data-transition="slide">Salir</a>
		<h1>Página uno</h1>
	</div>
 
	<div data-role="content">	
		<ul data-role="listview">
			<li><a href="#page2">Camaras</a></li>
            <li><a href="#page3">Página tres</a></li>
			<li><a href="#page4">Página cuatro</a>	</li>
		</ul>
	</div>

</div>

<div data-role="page" id="page2">
	<div data-role="header"><a href="#page" data-direction="reverse" data-icon="home"data-transition="slide"> Inicio
		</a>
	  <h1>Camaras</h1>
	</div>
    
<?php 
include ("conex/conexion2.php");
conex_usu();
$mostemp = mssql_query("SELECT nombre_empresas,codigo_empresas 
FROM dbo.www_empresas", $conex_usu);					
mssql_close($conex_usu);
?>
<form action="inicio.php" method="post">
	 	<table width="232" border="0" align="center" id = "tabla1">
 			 <tr>
    			<td width="178">
               
                         
                
                <select name="sel_emp" onchange="this.form.submit();"><option>Seleccione una Empresa</option>
                      
                      <?php while ($fila=mssql_fetch_array ($mostemp))
					  { ?>
                      <?php
					  $valor_preseleccionado = $_POST['sel_emp'];
					  $cod = $fila["codigo_empresas"]; $nom= $fila["nombre_empresas"];
								
								if($valor_preseleccionado == $cod) 
					  			{?>
                      			<option value="<?php echo $cod ?>" selected="selected"><?php echo $nom?></option>
                     			 <?php 
							 	}else 
								{ ?>
                      			<option value="<?php echo $cod ?>"><?php echo $nom?></option>
                      			<?php 
								} ?>
                      <?php 
					  } 
					  ?>
                    </select>
                    
               </td>
               
  			   <td width="39">
               
			   <?php 
			  
			   if ($codigo_empresas = $_POST['sel_emp'])
			   {?>
               
  			   <?php
        	   conex_usu();
        
        	   $mostsuc = mssql_query("SELECT codigo_sucurs,nombre_sucurs 
                               FROM dbo.www_sucurs WHERE empresa_sucurs = '$codigo_empresas'" , $conex_usu);
							
    			?>
                </td>
                
  			    <td width="10">&nbsp;</td>
 			 </tr>
	     </table>
         <table width="232" border="0" align="center" id = "tabla2">
           <tr>
             <td width="178"><select name="sel_suc" onChange="this.form.action='inicio.php';this.form.submit()">
               <option selected="selected" >Seleccione una Sucursal</option>
               <?php while ($fila2=mssql_fetch_array ($mostsuc)){ ?>
               <?php
				  $valor_preseleccionado2 = $_POST['sel_suc'];
				  $cod2 = $fila2["codigo_sucurs"]; $nom2= $fila2["nombre_sucurs"];


                   		if($valor_preseleccionado2 == $cod2) 
						{?>
               <option value="<?php echo $cod2 ?>"><?php echo $nom2?></option>
               <?php 
						}else 
						{ ?>
               <option value="<?php echo $cod2 ?>"><?php echo $nom2?></option>
               <?php 
						} ?>
               <?php 
				  } ?>
               <?php
			  } ?>
             </select></td>
             <td width="39"><?php 
	 $sw=1;
if ($codigosucursal = $_POST['sel_suc']  and $sw==1)
{ 
?></td>
             <td width="10">&nbsp;</td>
           </tr>
         </table>
         <p>&nbsp;</p>
         <p>&nbsp;</p>
         <p>&nbsp;</p>
         <p>&nbsp;</p>
         <p>&nbsp;</p>
         <p>&nbsp;</p>
         <p>&nbsp;</p>
         <table	>	
<?php

?>
    </table>
</form>
       </td>
  </tr>
</table>
<?php
    //Establezco el numero de columnas
    conex_usu();
    $columns = 2;
    $query="SELECT * FROM dbo.www_camaras WHERE empresas_camaras_adm = $codigo_empresas and sucurs_camaras = $codigosucursal ORDER BY tipo_camaras";
	
    $result = mssql_query($query,$conex_usu);
    $num_rows = mssql_num_rows($result);
	if ($num_rows > 0)
	{
    echo "<br>"."<table WIDTH=\"0\" ALIGN=\"LEFT\" border=\"0\">\n";
    for($i = 0; $i < $num_rows; $i++) {
          $row = mssql_fetch_array($result);
          if($i % $columns == 0) {
                echo "<tr>\n";
    }
                $tipo= $row["tipo_camaras"];
                $nombre= $row["nombre_camaras"];
                $url= $row["url_camaras"];
			   // $img = "<a href=$url target=_blank><img src=imagenes/logo_cam.png></a>";
					  //  $img = "<a href=$url target=_blank><img src=imagenes/logo_cam1.jpg></a>";

			$variable="<a href=#page2.php?var=$url><img src=imagenes/logo_cam.png></a>";
				 echo "<TD ALIGN=\"center\" valign=\"middle\">".$img."<bd>                 <bd>".$variable."<br>"."Tipo: ".$tipo."<br>"."Nombre: ".$nombre."<br>"."               </TD>\n";
 


          if(($i % $columns) == ($columns - 1) || ($i + 1) == $num_rows) {
    		echo "</tr>\n";
      }
    }
    echo "</table>\n";
	}
    ?> 

        <?php 
}

?>
</div>

<div data-role="page" id="page3">
	<div data-role="header"> <a href="#page" data-direction="reverse" data-icon="home"data-transition="slide">Inicio</a>
		<h1>Página tres</h1>
	</div>
	<div data-role="content">	
		<p>Contenido </p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
	</div>
	<div data-role="footer">
		<h4>Pie de página</h4>
	</div>
</div>

<div data-role="page" id="page4">
	<div data-role="header"><a href="#page" data-direction="reverse" data-icon="home"data-transition="slide">Inicio</a>
		<h1>Página cuatro</h1>
	</div>
	<div data-role="content">	
		<p>Contenido </p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
	</div>
	<div data-role="footer">
		<h4>Pie de página</h4>
	</div>
</div>
<div data-role="footer">
		<h4>Pie de página</h4>
	</div>
</body>
</html>
