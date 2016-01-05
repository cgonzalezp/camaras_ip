<?PHP
require("conexion2.php");

$usu = $_POST["usu"];
$pass  = $_POST["pass"];
$enviar = $_POST["enviar"];

$var1 = base64_encode($pass);
$var2 = $pass;
conex_usu();
if(isset($enviar))
{		   
$registro = mssql_query("SELECT * FROM dbo.adm_usuari WHERE codigo_usuario='$usu' and clave_usuario ='$var1';",$conex_usu);
$registro2 = mssql_query("SELECT * FROM dbo.adm_usuari WHERE codigo_usuario='$usu' and clave_usuario ='$var2';",$conex_usu);
}

$num_registros = mssql_num_rows($registro);
$num_registros2 = mssql_num_rows($registro2);

if ($num_registros > 0 )
{	$fila=mssql_fetch_array($registro);
	session_start();
	$_SESSION["usuario"]=$fila["nombre_usuario"];
	header("location:../inicio.php");
	
}	else
	{

		if ($num_registros2 > 0)
		{	
		$fila2=mssql_fetch_array($registro2);
		session_start();
		$_SESSION["usuario"]=$fila2["nombre_usuario"];
		header("location:../inicio.php");
		}	else
		 	{
	
			header("Location:../index.html?error=1");
		 	}
	mssql_close($conex_usu);
	}
?>
	 