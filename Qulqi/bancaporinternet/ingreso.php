<?php 

session_start();

echo "<h1>Ingresaste correctamente prro! </h1>" ;

if (isset($_SESSION['user_id'])){
    echo "Bienvenido DNI xd:".$_SESSION['user_id'] ;
    echo "<h5>Destruyendo la sesion</h5>" ;
	session_destroy();
	echo "Destruyendo ... USER_ID ".$_SESSION['user_id'] ;


 } else {
	echo "No existe USER_ID ";	
	
 }


 ?>