<?php
include("conexion.php");
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

if(isset($_POST["eliminar"])){
    $clave = $_POST["clave"];

    $query= "DELETE FROM licencia WHERE clave=?";
    $sentencia = mysqli_prepare($getconex, $query);
    mysqli_stmt_bind_param($sentencia, "s", $clave);
    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);
    if($afectado==1){

        echo "<script> alert('El password [$clave] se elimino correctamente'); location.href='../index.php'; </script>";

    }else{

        echo "<script> alert('El password [$clave] no pudo ser eliminado correctamente'); location.href='../index.php'; </script>";
    }
}
?>