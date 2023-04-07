<?php

class AuthController
{

  public function iniciarSesion($data)
  {
    try {
      $password = $data['clave'];
      $sessionId = $data['session_id']; // identificador único del dispositivo
      $conexion = new Conexion();
      $db = $conexion->getConexion();
      $query = "SELECT * FROM licencia WHERE clave=:clave";
      $statement = $db->prepare($query);
      $statement->bindParam("clave", $password);
      $statement->execute();
      $resultData = $statement->fetch();
      if ($resultData == null) {
        return ["status" => "400", "data" => $resultData, "login" => false];
      } else {
        // Comprobar si la clave ya ha sido utilizada en cualquier dispositivo
        $query = "SELECT COUNT(*) as count FROM licencia WHERE clave=:clave AND session_id != :session_id";
        $statement = $db->prepare($query);
        $statement->bindParam("clave", $password);
        $statement->bindParam("session_id", $sessionId);
        $statement->execute();
        $count = $statement->fetchColumn();

        if ($count > 0) {
          return ["status" => "400", "data" => $resultData, "login" => false, "message" => "La clave ya ha sido utilizada en otra sesión"];
        } else {
          // Guardar el identificador del dispositivo en la tabla de licencias
          $query = "UPDATE licencia SET session_id = :session_id WHERE ID = :ID";
          $statement = $db->prepare($query);
          $statement->bindParam("session_id", $sessionId);
          $statement->bindParam("ID", $resultData["ID"]);
          $statement->execute();

          return [
            "status" => "Activa",
            "data" => ["clave" => $resultData["clave"]],
            "login" => true
          ];
        }
      }
    } catch (PDOException $e) {
      echo "¡Error!: " . $e->getMessage() . "<br/>";
    }
  }

}
?>