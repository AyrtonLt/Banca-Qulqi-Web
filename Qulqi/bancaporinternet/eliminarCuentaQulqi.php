<?php 

session_start();

if (!isset($_SESSION['user_id'])){
    header('Location: login.php');
}

include 'conexion.php';


if ( !empty($_POST['Cuentas_num_cuenta_De']) && !empty($_POST['Cuentas_num_cuenta_Para'])) {
	echo $_POST['Cuentas_num_cuenta_De']."<br>" ;
	echo $_POST['Cuentas_num_cuenta_Para']."<br>" ;
	//Transferencia de CUENTA QULQI a otra

	// cuenta Qulqi a eliminar
	echo $consultaCuenta = "SELECT * FROM cuentas WHERE num_cuenta= '".$_POST['Cuentas_num_cuenta_De']."' " ;
	$Cuentas = $conn->query($consultaCuenta) or die (mysqli_error($conn));
	$Cuenta = $Cuentas->fetch_assoc();


	// cuenta Qulqi destino
	echo $consultaCuenta2 = "SELECT * FROM cuentas WHERE num_cuenta= '".$_POST['Cuentas_num_cuenta_Para']."' " ;
	$Cuentas2 = $conn->query($consultaCuenta2) or die (mysqli_error($conn));
	$Cuenta2 = $Cuentas2->fetch_assoc();

	//Agregar nuevo monto
	$nuevoMonto2 = $Cuenta2['saldo'] + $Cuenta['saldo'];

	echo $actualizarCuenta2= "UPDATE cuentas SET saldo='".$nuevoMonto2."' WHERE num_cuenta ='".$_POST['Cuentas_num_cuenta_Para']."' " ;

	$conn->query($actualizarCuenta2) or die ("Error al actualizar el saldo CUENTA destino".mysqli_error($conexion));

	//Agregar movimiento a la cuenta Qulqi destino
	date_default_timezone_set('America/New_York');
	$fechaHora = date('Y/m/d h:i:s', time());

	echo $insertarMovimientos= "INSERT INTO movimientos (Cuentas_num_cuenta,TipoMovimiento_idTipoMovimiento,Monto,Fecha) VALUES ('".$_POST['Cuentas_num_cuenta_Para']."', '1' , '".$Cuenta['saldo']."', '".$fechaHora."')";

	 $conn->query($insertarMovimientos) or die ("Error al insertar transferencia".mysqli_error($conexion));

	//Eliminar todo relacionado a la CUENTA QULQI ORIGEN

	//Borrar MOVIMIENTOS CUENTA QULQI origen
	echo $borrarMovimientos = "DELETE FROM movimientos WHERE Cuentas_num_cuenta ='".$_POST['Cuentas_num_cuenta_De']."' " ;
	$conn->query($borrarMovimientos) or die("Error al eliminar movimientos: ".mysqli_error($conn)) ;

	//Borrar TRANSFERENCIAS CUENTA QULQI
	echo $eliminarTransferencias = "DELETE FROM transferencia WHERE Cuentas_num_cuenta_De ='".$_POST['Cuentas_num_cuenta_De']."' " ;
	$conn->query($eliminarTransferencias) or die("Error al eliminar transfencia: ".mysqli_error($conn)) ;

	//Borrar CUENTA QULQI ORIGEN
	echo $borrarCuenta = "DELETE FROM cuentas WHERE num_cuenta ='".$_POST['Cuentas_num_cuenta_De']."' " ;
	$conn->query($borrarCuenta) or die("Error al eliminar cuenta: ".mysqli_error($conn)) ;

header('Location: index.php');

} else {
	//echo "No funca" ;
	header('Location: index.php');
}



?>