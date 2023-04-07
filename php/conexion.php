<?php
class mysqlconex
{
    public function conex()
    {
        $enlace = mysqli_connect("localhost", "root", "", "mabe");
        return $enlace;

        /*if(!$enlace){
        die("no pudo conectarse a la bases de datos ". mysqli_error());
        }
        
        echo "conexion exitosa";
        mysqli_close($enlace)*/
    }
}

?>

