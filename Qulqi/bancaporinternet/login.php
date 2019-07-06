<?php 
    session_start();
    if (isset($_SESSION['user_id'])){
    header('Location: index.php');
    }

    include 'conexion.php';
     $ingresar = false ;

    if (!empty($_POST['dni']) && !empty($_POST['tarjeta']) && !empty($_POST['password']))
    {   
        
        $sentencia = "SELECT dni,num_tarjeta , password FROM cliente WHERE dni='".$_POST['dni']."' " ;
        $resultado = $conn->query($sentencia) or die (mysqli_error($conn)) ;
        while ($fila = $resultado->fetch_assoc())
        {
            if ($fila['dni']==$_POST['dni'] && $fila['tarjeta']==$_POST['num_tarjeta'] && $fila['password']==$_POST['password'] ) {
                $ingresar = true ;
                $_SESSION['user_id'] = $_POST['dni'];
                break;
            }
        }

        $message = '';

        if ($ingresar) {
          header("Location: index.php");
        } else {
            
          $message = 'Disculpe,No se encuentra registrado o datos incorrectos.';
        }

    }
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login | Qulqui</title>
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

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="../index.html"><img class="logo-img" src="assets/images/logo2.png" alt="logo"></a><span class="splash-description">Iniciar Sesión</span></div>
            <div class="card-body">

                <?php if(!empty($message)): ?>
                  <p> <?= $message ?></p>
                <?php endif; ?>

                <form action="login.php" method="POST">
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="dni" id="dni" type="text" placeholder="DNI" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="tarjeta" id="tarjeta" type="text" placeholder="Numero de Tarjeta" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" id="password" type="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Recordar</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Ingresar</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="aperturarCuenta.php" class="footer-link">Aperturar</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Recuperar Contraseña</a>
                </div>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>