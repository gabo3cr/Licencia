<?php
include("conexion.php");
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

if(isset($_POST["registrar"])){

    $clave = $_POST["clave"];

    $query = "INSERT INTO licencia (clave) VALUES (?)";
    $sentencia = mysqli_prepare($getconex, $query);
    mysqli_stmt_bind_param($sentencia, "s",$clave);
    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);
    
    if($afectado==1){
        //echo "<script> alert('El password [$clave] se registro correctamente'); location.href='../index.php'; </script>";
        echo "<script> location.href='../index.php'; </script>";

    }else{
        //echo "<script> alert('El password [$clave] no se registro correctamente'); location.href='../index.php'; </script>";
        echo "<script> location.href='../index.php'; </script>";
    }
    mysqli_stmt_close($sentencia);
    mysqli_close($getconex);
}   

?>