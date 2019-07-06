<?php 
session_start();

if (!isset($_SESSION['user_id'])){
    header('Location: login.php');
}

include 'conexion.php';

$consultaClientes = "SELECT * FROM cliente WHERE dni= '".$_SESSION['user_id']."' " ;
$clientes = $conn->query($consultaClientes) or die (mysqli_error($conn));
$cliente = $clientes->fetch_assoc();

$consultaCuentas = "SELECT * FROM cuentas WHERE Cliente_dni= '".$cliente['dni']."' " ;
$cuentas =  $conn->query($consultaCuentas) or die (mysqli_error($conn));
$cuentas3 = $conn->query($consultaCuentas) or die (mysqli_error($conn));
$cuentas2 = $conn->query($consultaCuentas) or die (mysqli_error($conn));
$cuentas4 = $conn->query($consultaCuentas) or die (mysqli_error($conn));
$cuentas5 = $conn->query($consultaCuentas) or die (mysqli_error($conn));
$cuentas6 = $conn->query($consultaCuentas) or die (mysqli_error($conn));

$cuentas7 = $conn->query($consultaCuentas) or die (mysqli_error($conn));
$cuentas8 = $conn->query($consultaCuentas) or die (mysqli_error($conn));

 ?>
<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <title>Qulqi - Banca por internet</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
       <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <?php include "cabecera.php" ; ?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <?php include "menu.php" ; ?>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="influence-profile">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h3 class="mb-2">Bancar por internet Qulqi </h3>
                                
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Panel</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Inicio</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- content -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- profile -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- card profile -->
                            <!-- ============================================================== -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="user-avatar text-center d-block">
                                        <img src="assets/images/usuarioQulqi.png" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                                    </div>
                                    <div class="text-center">
                                        <h2 class="font-24 mb-0">
                                            <?php echo $cliente['nombres']." ".$cliente['apellidos'] ; ?>
                                            
                                        </h2>
                                        <p>
                                        <?php
                                        echo
                                         "<b>DNI: </b>".$cliente['dni'] ;
                                         ?>
                                             
                                         </p>

                                         <a href="cerrarSesion.php"><span class="badge badge-pill badge-danger">Cerrar Sesión</span></a> 
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <h3 class="font-16">Atención al cliente</h3>
                                    <div class="">
                                        <ul class="list-unstyled mb-0">
                                        <li class="mb-2"><i class="fas fa-fw fa-envelope mr-2"></i>consultas@qulqi.com</li>
                                        <li class="mb-0"><i class="fas fa-fw fa-phone mr-2"></i>980680542</li>
                                    </ul>
                                    </div>
                                </div>
                               
                               
                            </div>
                            <!-- ============================================================== -->
                            <!-- end card profile -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- end profile -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- campaign data -->
                        <!-- ============================================================== -->
                        <div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- campaign tab one -->
                            <!-- ============================================================== -->
                            <div class="influence-profile-content pills-regular">
                                <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-campaign-tab" data-toggle="pill" href="#pills-campaign" role="tab" aria-controls="pills-campaign" aria-selected="true">Inicio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-packages-tab" data-toggle="pill" href="#pills-packages" role="tab" aria-controls="pills-packages" aria-selected="false">Movimientos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-selected="false">Transferencias</a>
                                    </li>
                                    
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-campaign" role="tabpanel" aria-labelledby="pills-campaign-tab">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                
                                            </div>
                                            <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h1 class="mb-1">Cuentas</h1>
                                                        <div class="card-body p-0">
                                                    <ul class="traffic-sales list-group list-group-flush">

                                                       <?php
                                                        while ($cuenta = $cuentas->fetch_assoc())
                                                        {
                                                       ?> 
                                                            <li class="traffic-sales-content list-group-item ">
                                                               <span class="traffic-sales-name"><?php echo $cuenta['num_cuenta'] ;?></span>
                                                               <span class="traffic-sales-amount">S/.<?php echo $cuenta['saldo'] ; ?></span>
                                                            </li>                                            
                                                        
                                                      <?php } ?>
        
                                    
                                                       
                                                                </ul>
                                                  </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h2 class="mb-1">Aperturar Nueva Cuenta</h2>
                                                        <p>Obten otra cuenta qulqi de manera fácil y sencilla</p>

                                                        <form action="nuevaCuentaQulqi.php" method="POST">
                                                                <div class="row">
                                                                    <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-3 col-md-12 col-sm-12 col-12 p-4">
                                                                        
                                                                    
                                                                    <div class="form-group">
                                                                        <label for="subject">Monto Inicial en soles</label>
                                                                        <input type="text" class="form-control form-control-lg" id="subject" name="Monto" placeholder="">
                                                                    </div>
                                                                   
                                                                    <button type="submit" class="btn btn-rounded btn-success">Aperturar Nueva Cuenta </button>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-body">
                                                        <h2 class="mb-1">Eliminar Cuenta</h2>
                                                        <p>Transfiere el monto de tu cuenta a eliminar a otra cuenta</p>


                                                        <form action="eliminarCuentaQulqi.php" method="POST">
                                                                <div class="row">
                                                                    <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-3 col-md-12 col-sm-12 col-12 p-4">

                                                                    <div class="form-group">
                                                                <label for="name">Cuenta a Eliminar</label>
                                                                <select class="form-control" id="input-select" name="Cuentas_num_cuenta_De">
                                                                  <?php
                                                                    while ($cuenta = $cuentas7->fetch_assoc())
                                                                    {
                                                                   ?> 
                                                                        
                                                                  <option value= <?php echo "'".$cuenta['num_cuenta']."'" ?> ><?php echo $cuenta['num_cuenta'] ;?></option>
                                                                                    
                                                                    
                                                                  <?php } ?>
                                                                    
                                                                    
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name">Transfiere tu monto a</label>
                                                                <select class="form-control" id="input-select" name="Cuentas_num_cuenta_Para">
                                                                  <?php
                                                                    while ($cuenta = $cuentas8->fetch_assoc())
                                                                    {
                                                                   ?> 
                                                                        
                                                                  <option value= <?php echo "'".$cuenta['num_cuenta']."'" ?> ><?php echo $cuenta['num_cuenta'] ;?></option>
                                                                                    
                                                                    
                                                                  <?php } ?>
                                                                    
                                                                    
                                                                </select>
                                                                
                                                            </div>
                                                                   
                                                                    <button type="submit" class="btn btn-rounded btn-danger">Eliminar Cuenta </button>

                                                                </div>

                                                            </div>
                                                        </form>
                                                         <small class="text-danger"><br>El historial de tus movimientos se eliminaran</small>

                                                    </div>
                                                </div>



                                            </div>
                                            
                                        </div>

                                        
 
                                        
                                    </div>
                                    <div class="tab-pane fade" id="pills-packages" role="tabpanel" aria-labelledby="pills-packages-tab">
      <?php
        $i=0;
       while ($cuenta = $cuentas3->fetch_assoc()){
        $i++;
      ?>
                                        <div class="card">
                                            <h5 class="card-header"><?php echo $i." ) Cuenta: ".$cuenta['num_cuenta'] ; ?></h5>
                                            <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Tipo</th>
                                                    <th scope="col">Monto</th>
                                                    <th scope="col">Fecha - Hora</th>
                                                </tr>
                                            </thead>
                                            <tbody>
           <?php 
            $consultaMovimientos = "SELECT * FROM movimientos M INNER JOIN cuentas C ON  M.Cuentas_num_cuenta = C.num_cuenta WHERE Cuentas_num_cuenta = '".$cuenta['num_cuenta']."'" ;
            ;
            $Movimientos = $conn->query($consultaMovimientos) or die (mysqli_error($conn));
                $colorMonto  = "" ; $simbolo = " " ;
                while ($Movimiento = $Movimientos->fetch_assoc()){ 

           ?>
                                                <tr>
                                                    <th scope="row">
                                                       <?php
                                                        if (  $Movimiento['TipoMovimiento_idTipoMovimiento'] == 1 )
                                                        {
                                                            echo "Desposito" ;
                                                            $colorMonto = "text-success";
                                                            $simbolo = "+" ;

                                                        } else {
                                                            echo "Retiro" ;
                                                            $colorMonto = "text-danger" ;
                                                            $simbolo = "-" ;
                                                        }

                                                       ?>
                                                        
                                                    </th>
                                                    <td><p class= <?php echo "'".$colorMonto."'" ?> ><?php echo $simbolo."".$Movimiento['Monto']; ?></p></td>
                                                    <td><?php echo $Movimiento['Fecha'];?></td>
                                                </tr>
            <?php } ?>
                                                
                                                
                                            </tbody>
                                           </table>

                                        </div>


       <?php } ?>

                                        


                                    </div>
                                    <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                                        <div class="card">
                                            <h5 class="card-header">Realizar Transferencia</h5>
                                            <div class="card-body">
                                                <div class="simple-card">
                                                    <ul class="nav nav-tabs" id="myTab5" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link border-left-0 active show" id="home-tab-simple" data-toggle="tab" href="#Entre-cuentas-propias" role="tab" aria-selected="true">Entre cuentas propias </a>
                                                        </li>
                                                          <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#A-cuenta-Qulqi" role="tab" aria-selected="false">A cuenta Qulqi</a>
                                                        </li>

                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#Hacia-cuentas-de-terceros" role="tab" aria-selected="false">Hacia cuentas de terceros</a>
                                                        </li>

                                                      
                                                        
                                                    </ul>
                                                    <div class="tab-content" id="myTabContent5">
                                                        <div class="tab-pane fade active show" id="Entre-cuentas-propias" role="tabpanel">
                                                            <form action="transferirInterno.php" method="POST">
                                                    <div class="row">
                                                        <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-3 col-md-12 col-sm-12 col-12 p-4">
                                                            <div class="form-group">
                                                                <label for="name">Cuenta Origen</label>
                                                                <select class="form-control" id="input-select" name="Cuentas_num_cuenta_De">
                                                                  <?php
                                                                    while ($cuenta = $cuentas2->fetch_assoc())
                                                                    {
                                                                   ?> 
                                                                        
                                                                  <option value= <?php echo "'".$cuenta['num_cuenta']."'" ?> ><?php echo $cuenta['num_cuenta'] ;?></option>
                                                                                    
                                                                    
                                                                  <?php } ?>
                                                                    
                                                                    
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name">Cuenta Destino</label>
                                                                <select class="form-control" id="input-select" name="Cuentas_num_cuenta_Para">
                                                                  <?php
                                                                    while ($cuenta = $cuentas5->fetch_assoc())
                                                                    {
                                                                   ?> 
                                                                        
                                                                  <option value= <?php echo "'".$cuenta['num_cuenta']."'" ?> ><?php echo $cuenta['num_cuenta'] ;?></option>
                                                                                    
                                                                    
                                                                  <?php } ?>
                                                                    
                                                                    
                                                                </select>
                                                                
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="subject">Monto S/.</label>
                                                                <input type="text" class="form-control form-control-lg" id="subject" name="Monto" placeholder="">
                                                            </div>
                                                           
                                                            <button type="submit" class="btn btn-primary float-right">Transferir</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                        </div>
                                                        <div class="tab-pane fade" id="Hacia-cuentas-de-terceros" role="tabpanel">

                                                           <form action="transferirExterno.php" method="POST">
                                                                <div class="row">
                                                                    <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-3 col-md-12 col-sm-12 col-12 p-4">
                                                                        <div class="form-group">
                                                                            <label for="name">Cuenta Origen</label>
                                                                            <select class="form-control" id="input-select" name="Cuentas_num_cuenta_De">
                                                                  <?php
                                                                    while ($cuenta = $cuentas4->fetch_assoc())
                                                                    {
                                                                   ?> 
                                                                        
                                                                  <option value= <?php echo "'".$cuenta['num_cuenta']."'" ?> ><?php echo $cuenta['num_cuenta'] ;?></option>
                                                                                    
                                                                    
                                                                  <?php } ?>
                                                                    
                                                                    
                                                                                </select>
                                                                            </div>
                                                                    <div class="form-group">
                                                                        <label for="name">Cuenta Destino</label>
                                                                        <input type="text" class="form-control form-control-lg" id="email" name="Cuentas_num_cuenta_Para" placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="subject">Monto S/.</label>
                                                                        <input type="text" class="form-control form-control-lg" id="subject" name="Monto" placeholder="">
                                                                    </div>
                                                                   
                                                                    <button type="submit" class="btn btn-primary float-right">Transferir</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        </div>
                                                        
                                                        <div class="tab-pane fade" id="A-cuenta-Qulqi" role="tabpanel" aria-labelledby="contact-tab">
                                                            <form action="transferirInterno2.php" method="POST">
                                                                <div class="row">
                                                                    <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-3 col-md-12 col-sm-12 col-12 p-4">
                                                                        <div class="form-group">
                                                                            <label for="name">Cuenta Origen</label>
                                                                            <select class="form-control" id="input-select" name="Cuentas_num_cuenta_De">
                                                                  <?php
                                                                    while ($cuenta = $cuentas6->fetch_assoc())
                                                                    {
                                                                   ?> 
                                                                        
                                                                  <option value= <?php echo "'".$cuenta['num_cuenta']."'" ?> ><?php echo $cuenta['num_cuenta'] ;?></option>
                                                                                    
                                                                    
                                                                  <?php } ?>
                                                                    
                                                                    
                                                                                </select>
                                                                            </div>
                                                                    <div class="form-group">
                                                                        <label for="name">Cuenta Qulqi Destino</label>
                                                                        <input type="text" class="form-control form-control-lg" id="email" name="Cuentas_num_cuenta_Para" placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="subject">Monto S/.</label>
                                                                        <input type="text" class="form-control form-control-lg" id="subject" name="Monto" placeholder="">
                                                                    </div>
                                                                   
                                                                    <button type="submit" class="btn btn-primary float-right">Transferir</button>
                                                                </div>
                                                            </div>
                                                        </form>

                                                        </div>
    



                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     </div>

                                    </div>
                                    
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end campaign tab one -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- end campaign data -->
                        <!-- ============================================================== -->
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end content -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            Copyright © 2019 Qulqi
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1  -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
   
</body>
 
</html>