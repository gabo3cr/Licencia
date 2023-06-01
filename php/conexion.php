<?php
class mysqlconex
{
    public function conex()
    {
        $enlace = mysqli_connect("67.217.34.84", "hlsoluti", "elchaneque2012", "hlsoluti_owm838");
        return $enlace;

        /*if(!$enlace){
        die("no pudo conectarse a la bases de datos ". mysqli_error());
        }
        
        echo "conexion exitosa";
        mysqli_close($enlace)*/
    }
}

?>

