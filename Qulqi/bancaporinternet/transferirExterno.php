<?php 

session_start();
date_default_timezone_set('America/New_York');

if (!isset($_SESSION['user_id'])){
    header('Location: login.php');
}

include 'conexion.php';

/*
$_POST['Cuentas_num_cuenta_De'] = "2129406715617" ;
$_POST['Cuentas_num_cuenta_Para'] = "7829456715617" ; 
$_POST['Monto'] = 20;
*/
if (!empty($_POST['Cuentas_num_cuenta_De']) && !empty($_POST['Cuentas_num_cuenta_Para']) && !empty($_POST['Monto'])){

	$fechaHora = date('Y/m/d h:i:s', time());

	$consultaCuenta = "SELECT * FROM cuentas WHERE num_cuenta= '".$_POST['Cuentas_num_cuenta_De']."' " ;
	$Cuentas = $conn->query($consultaCuenta) or die (mysqli_error($conn));
	$Cuenta = $Cuentas->fetch_assoc();

	//Resta el monto al saldo inicial
	$nuevoMonto = $Cuenta['saldo'] - $_POST['Monto'];

	//Actualiza el monto en CUENTAS
	$actualizarCuenta= "UPDATE cuentas SET saldo='".$nuevoMonto."' WHERE num_cuenta ='".$_POST['Cuentas_num_cuenta_De']."' " ;
	$conn->query($actualizarCuenta) or die ("Error al actualizar el saldo CUENTA".mysqli_error($conexion));

	//Ingresa una nueva Transferencia
	$insertarTransferencia= "INSERT INTO transferencia (Cuentas_num_cuenta_De,Cuentas_num_cuenta_Para,Monto,fecha) VALUES ('".$_POST['Cuentas_num_cuenta_De']."', '".$_POST['Cuentas_num_cuenta_Para']."', '".$_POST['Monto']."', '".$fechaHora."')";

	 $conn->query($insertarTransferencia) or die ("Error al insertar transferencia".mysqli_error($conexion));

	 //Ingresa una nuevo Movimiento
	$insertarMovimientos= "INSERT INTO movimientos (Cuentas_num_cuenta,TipoMovimiento_idTipoMovimiento,Monto,Fecha) VALUES ('".$_POST['Cuentas_num_cuenta_De']."', '2' , '".$_POST['Monto']."', '".$fechaHora."')";

	 $conn->query($insertarMovimientos) or die ("Error al insertar transferencia".mysqli_error($conexion));


	 header('Location: index.php');
} else {

	header('Location: index.php');
}

 ?>