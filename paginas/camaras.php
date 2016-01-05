<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title>Camaras</title>
<meta name="viewport" content="width=device-width"/>
<link href="../jquery-mobile/jquery.mobile-1.0.min.css" rel="stylesheet" type="text/css"/>
<script src="../jquery-mobile/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="../jquery-mobile/jquery.mobile-1.0.min.js" type="text/javascript"></script>


</head>



<body>
<div data-role="page" data-id="camaras">
<div data-theme="b" data-role="header" c><a href="/movil/paginas/inicio.html" data-direction="reverse" data-icon="home"data-transition="slide"> Menu
		</a>
  <h1>Camaras</h1>
</div>
     
<?php 
include ("../conex/conexion2.php");
conex_usu();
	$mostemp = mssql_query("SELECT nombre_empresas,codigo_empresas FROM dbo.www_empresas", $conex_usu);
							
	mssql_close($conex_usu);
?>

     </p>
<table width=device-width height="37" border="0" align="center" class="tablaprincipal" id = "tablaprincipal">
	 <tr>
    		<td align="center">
    	<form action="camaras.php?cod1=9&cod2=2" method="post">
	 	<table width=device-width height="68" border="0" id = "tabla1">
 			 <tr>
    			<td width=device-width><select name="sel_emp" onchange="this.form.submit();">
                
                      <option>Seleccione una Empresa</option>
                      <?php while ($fila=mssql_fetch_array ($mostemp))
					  { ?>
                      <?php
					  error_reporting(E_ERROR);
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
    			  <?php 
			  
			   if ($codigo_empresas = $_POST['sel_emp'])
			   {?>
    			  <?php
        	   conex_usu();
        
        	   $mostsuc = mssql_query("SELECT codigo_sucurs,nombre_sucurs 
                               FROM dbo.www_sucurs WHERE empresa_sucurs = '$codigo_empresas'" , $conex_usu);
							
    			?>
    			  <select name="sel_suc" onchange="this.form.action='camaras.php?cod1=9&cod2=2&sw=1';this.form.submit()">
    			    <option >Seleccione una Sucursal</option>
    			    <?php while ($fila2=mssql_fetch_array ($mostsuc)){ ?>
    			    <?php
				  $valor_preseleccionado2 = $_POST['sel_suc'];
				  $cod2 = $fila2["codigo_sucurs"]; $nom2= $fila2["nombre_sucurs"];


                   		if($valor_preseleccionado2 == $cod2) 
						{?>
    			    <option value="<?php echo $cod2 ?>" selected="selected"><?php echo $nom2?></option>
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
               
  			   <td width=device-width>&nbsp;</td>
                
  			    <td width=device-width>&nbsp;</td>
 			 </tr>
	     </table>
<table	>	
<?php

 	
//echo "cod: $cod";				
//echo "mosttemp: $mostemp ";
//echo "columnas: $columns ";
//echo"cod2: $cod2 ";
//echo "codigo empresas: $codigo_empresas ";
//echo "sw: $sw ";

?>
</table>
       </form>

       </td>
  </tr>
</table>
            

<p>
  <?php 
//echo "if del mal";
	 $sw=1;
if ($codigosucursal = $_POST['sel_suc']  and $sw==1)
{ 
//echo "if del bien :)";

?>
       
       <?php
    //Establezco el numero de columnas
    conex_usu();
    $columns = 2;
    $query="SELECT * FROM dbo.www_camaras WHERE empresas_camaras_adm = $codigo_empresas and sucurs_camaras = $codigosucursal ORDER BY tipo_camaras";
	
    $result = mssql_query($query,$conex_usu);
    $num_rows = mssql_num_rows($result);
	if ($num_rows > 0)
	{
    echo "<br>"."<table WIDTH=\"300\" ALIGN=\"CENTER\" border=\"0\">\n";
    for($i = 0; $i < $num_rows; $i++) {
          $row = mssql_fetch_array($result);
          if($i % $columns == 0) {
                //SI NO HAY RESTO SIGNIFICA QUE INICIAMOS UNA NUEVA FILA

                echo "<tr>\n";
       
    }
				
                
                $tipo= $row["tipo_camaras"];
                $nombre= $row["nombre_camaras"];
                $url= $row["url_camaras"];
				//$user=$row["usuario_camaras"];
				//$pass=$row["clave_camaras"];
			    //$img = "<a href=$url target=_blank><img src=imagenes/logo_cam.png></a>";
				$img = "<a href=$url target=_blank><img src=imagenes/logo_cam3.png></a>";
				$variable="<a href=uti_logos1.php?var=$url><img src=imagenes/logo_cam1.png></a>";
			
		         //echo "<TD ALIGN=\"center\" valign=\"middle\">".$img."<br>"."Tipo: ".$tipo."<br>"."Nombre: ".$nombre."<br>"."                <a href=".$url." target=_blank>".$url." </a>"."</TD>\n";
				
				 echo "<TD ALIGN=\"left\" valign=\"middle\">".$img."<bd>                 <bd>".$variable."<br>"."Tipo: ".$tipo."<br>"."Nombre: ".$nombre."<br>"."               </TD>\n";
 			
          if(($i % $columns) == ($columns - 1) || ($i + 1) == $num_rows) {
                //SI EL RESTO ES UNO
                //O SI NO HAY NADA MAS A LA IZQUIERDA
                //ES EL FINAL DE LA TABLA
        
                echo "</tr>\n";
                
                
      }
    }
    echo "</table>\n";
	}//else { echo "No existen camaras asociadas"; }
    ?> 
    <?php 
}

?>
</p>
</div>
</div>
<div data-theme="b" data-role="footer">
		<h4>Pie de página</h4>
	</div>
</body>
</html>