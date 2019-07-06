<?php 
    session_start();
    require 'conexion.php';


    if (!empty($_POST['dni']) && !empty($_POST['nombres']) && !empty($_POST['apellidos']) && !empty($_POST['password']))
    {
    $numeroCuenta = '124567890';
    $numeroCuenta_digitos = (strlen($numeroCuenta) - 1);
    $cuenta = $numeroCuenta{ rand(0, $numeroCuenta_digitos) };
    for ($i = 1; $i < 16; $i = strlen($cuenta))
    {
        $r = $numeroCuenta{ rand(0, $numeroCuenta_digitos) };
        if ($r != $cuenta{$i - 1}) $cuenta .= $r;
    }

    $num_tarjeta = $cuenta;

    echo $insertarUsuario= "INSERT INTO cliente (dni,nombres,apellidos,num_tarjeta,password,estado) VALUES ('".$_POST['dni']."', '".$_POST['nombres']."', '".$_POST['apellidos']."', '".$num_tarjeta."', '".$_POST['password']."', '1') ";
    $conn->query($insertarUsuario) or die ("Error al ingresar usuario nuevo".mysqli_error($conexion));


    $numeroCuenta = '124567890';
    $numeroCuenta_digitos = (strlen($numeroCuenta) - 1);
    $cuenta = $numeroCuenta{ rand(0, $numeroCuenta_digitos) };
    for ($i = 1; $i < 13; $i = strlen($cuenta))
    {
        $r = $numeroCuenta{ rand(0, $numeroCuenta_digitos) };
        if ($r != $cuenta{$i - 1}) $cuenta .= $r;
    }

    $num_cuenta = $cuenta;

    echo $insertarCuenta= "INSERT INTO cuentas (num_cuenta,saldo,Cliente_dni) VALUES ('".$num_cuenta."', '900', '".$_POST['dni']."') ";

    $conn->query($insertarCuenta) or die ("Error al insertar Cuenta nueva".mysqli_error($conexion));
    header('Location: login.php');
    }
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Aperturar Cuenta | Qulqi</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>
<!-- ============================================================== -->
<!-- Aperturar  -->
<!-- ============================================================== -->

<body>
    <!-- ============================================================== -->
    <!-- Apertura cuenta  -->
    <!-- ============================================================== -->
    <form class="splash-container" method="POST" action="aperturarCuenta.php">
        <div class="card">
            <div class="card-header">
                <img src="assets/images/Logo2.png" alt=""><br><br>
                <h3 class="mb-1">Aperturar Cuenta</h3>
                <p>Ingrese su información.</p>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="nombres" required="" placeholder="Nombres" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="apellidos" required="" placeholder="Apellidos" autocomplete="off">
                </div>
                
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="dni" required="" placeholder="DNI" autocomplete="off">
                </div>
               
                <div class="form-group">
                    <input class="form-control form-control-lg" required="" placeholder="Password" name="password" type="password">
                </div>
                
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Acepto los términos y condiciones de Qulqi</a></span>
                        <small class="text-primary">Se apertura con un inicial de S/. 900 soles</small>
                    </label>
                </div>
                
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit">Aperturar Cuenta Qulqi</button>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p>Ya tienes cuenta? <a href="login.php" class="text-secondary">Inicia sesión aquí.</a></p>
            </div>
        </div>
    </form>
</body>

 
</html>