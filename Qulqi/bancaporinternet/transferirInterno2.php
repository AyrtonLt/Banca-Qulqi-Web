<?php 

session_start();
date_default_timezone_set('America/New_York');

if (!isset($_SESSION['user_id'])){
    header('Location: login.php');
}

include 'conexion.php';

/*
$_POST['Cuentas_num_cuenta_De'] = "2129406715617" ;
$_POST['Cuentas_num_cuenta_Para'] = "2704562960658" ; 
$_POST['Monto'] = 657;
*/
echo $_POST['Cuentas_num_cuenta_De']."<br>" ;
echo $_POST['Cuentas_num_cuenta_Para']."<br>" ; 
echo $_POST['Monto']."<br>" ;

if (!empty($_POST['Cuentas_num_cuenta_De']) && !empty($_POST['Cuentas_num_cuenta_Para']) && !empty($_POST['Monto'])){

	$fechaHora = date('Y/m/d h:i:s', time());

	$consultaCuenta = "SELECT * FROM cuentas WHERE num_cuenta= '".$_POST['Cuentas_num_cuenta_De']."' " ;
	$Cuentas = $conn->query($consultaCuenta) or die (mysqli_error($conn));
	$Cuenta = $Cuentas->fetch_assoc();

	//Otra cuenta Qulqi
	$consultaCuenta2 = "SELECT * FROM cuentas WHERE num_cuenta= '".$_POST['Cuentas_num_cuenta_Para']."' " ;
	$Cuentas2 = $conn->query($consultaCuenta2) or die (mysqli_error($conn));
	$Cuenta2 = $Cuentas2->fetch_assoc();

	//Resta y agrega el monto al saldo inicial y final QULQI
	$nuevoMonto = $Cuenta['saldo'] - $_POST['Monto'];
	$nuevoMonto2 = $Cuenta2['saldo'] + $_POST['Monto'];


	//Actualiza la cuenta QULQI ORIGEN	
	$actualizarCuenta= "UPDATE cuentas SET saldo='".$nuevoMonto."' WHERE num_cuenta ='".$_POST['Cuentas_num_cuenta_De']."' " ;

	$conn->query($actualizarCuenta) or die ("Error al actualizar el saldo CUENTA original".mysqli_error($conexion));

	//Actualiza la cuenta QULQI DESTINO	
	$actualizarCuenta2= "UPDATE cuentas SET saldo='".$nuevoMonto2."' WHERE num_cuenta ='".$_POST['Cuentas_num_cuenta_Para']."' " ;

	$conn->query($actualizarCuenta2) or die ("Error al actualizar el saldo CUENTA destino".mysqli_error($conexion));

	//Ingresa una nueva Transferencia QULQI ORIGEN
	$insertarTransferencia= "INSERT INTO transferencia (Cuentas_num_cuenta_De,Cuentas_num_cuenta_Para,Monto,fecha) VALUES ('".$_POST['Cuentas_num_cuenta_De']."', '".$_POST['Cuentas_num_cuenta_Para']."', '".$_POST['Monto']."', '".$fechaHora."')";

	 $conn->query($insertarTransferencia) or die ("Error al insertar transferencia".mysqli_error($conexion));

	 //Ingresa los nuevos Movimientos QULQI ORIGEN
	$insertarMovimientos= "INSERT INTO movimientos (Cuentas_num_cuenta,TipoMovimiento_idTipoMovimiento,Monto,Fecha) VALUES ('".$_POST['Cuentas_num_cuenta_De']."', '2' , '".$_POST['Monto']."', '".$fechaHora."')";

	 $conn->query($insertarMovimientos) or die ("Error al insertar transferencia".mysqli_error($conexion));

	//Ingresa los nuevos Movimientos QULQI DESTINO
	 $insertarMovimientos= "INSERT INTO movimientos (Cuentas_num_cuenta,TipoMovimiento_idTipoMovimiento,Monto,Fecha) VALUES ('".$_POST['Cuentas_num_cuenta_Para']."', '1' , '".$_POST['Monto']."', '".$fechaHora."')";

	 $conn->query($insertarMovimientos) or die ("Error al insertar transferencia".mysqli_error($conexion));


	 header('Location: index.php');
} else {

	header('Location: index.php');
}

 ?>