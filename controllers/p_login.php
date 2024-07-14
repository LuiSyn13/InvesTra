<?php  
session_start();
include("connection.php");
$user=$_POST["user"];
$pass=$_POST["password"];
$sql="select * from usuario where dni = '$user' and password = '$pass';";

$fila=mysqli_query($cn,$sql);

$r=mysqli_fetch_assoc($fila);

$valor=$r["dni"];

if ($valor==null) {
header('location: ../index.php');
} else {
$_SESSION["usuario"]=$valor;
$_SESSION["auth"]=1;
	
header('location: ../views/investigador/inicio.php');	

}

?>