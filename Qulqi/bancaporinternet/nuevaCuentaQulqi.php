<?php 
session_start();

if (!isset($_SESSION['user_id'])){
    header('Location: login.php');
}

include 'conexion.php';

if (!empty($_POST['Monto'])) {

	$numeroCuenta = '124567890';
	$numeroCuenta_digitos = (strlen($numeroCuenta) - 1);
	$cuenta = $numeroCuenta{ rand(0, $numeroCuenta_digitos) };
	for ($i = 1; $i < 13; $i = strlen($cuenta))
	{
		$r = $numeroCuenta{ rand(0, $numeroCuenta_digitos) };
		if ($r != $cuenta{$i - 1}) $cuenta .= $r;
	}

	
	$num_cuenta = $cuenta;
	$insertarCuenta= "INSERT INTO cuentas (num_cuenta,saldo,Cliente_dni) VALUES ('".$num_cuenta."', '".$_POST['Monto']."', '".$_SESSION['user_id']."') ";

	$conn->query($insertarCuenta) or die ("Error al insertar Cuenta".mysqli_error($conexion));
	header('Location: index.php');
} else {
	//echo "No funca" ;
	header('Location: index.php');
}

?>