<?php

class Conexion {

    public function getConexion(){
     try {
           $host = "67.217.34.84";   //127.0.0.1  localhost
           $db = "hlsoluti_owm838";        //base de datos de mysql
           $user = "hlsoluti";        //usuario de mysql
           $password = "elchaneque2012";        //contraseña de mysql
           $db = new PDO("mysql:host=$host;dbname=$db;",$user, $password);
           return $db;

         }catch(PDOException $e){  
            echo "¡Error!: " . $e->getMessage() . "<br/>";
            die(); 
         }  
  }
}
?>

