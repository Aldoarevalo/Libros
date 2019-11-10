<?php
include('db.php');
include('functionlector.php');
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Registrar")
 {
   $statement = $connection->query("SELECT (max(id_lector)+1)idlector from lector");
           $idlector = $statement->fetchColumn();
  $statement = $connection->prepare("
   INSERT INTO lector (id_lector,Nombre,Edad,Ci,Telefono,Email,Direccion) 
   VALUES (:idlector ,:Nombre,:Edad,:Cedula,:Tel,:Email,:Dir)
  ");
  $result = $statement->execute(
   array(
  
     ':idlector'               =>  $idlector,
     ':Nombre' => $_POST["Nombre"],
      ':Edad' => $_POST["Edad"],
      ':Cedula' => $_POST["Cedula"],
      ':Tel' => $_POST["Tel"],
      ':Email' => $_POST["Email"],
      ':Dir' => $_POST["Dir"], 
   )
  );
  if(!empty($result))
  {
   echo 'Los Datos Han Sido Grabados';
  }
 }
 if($_POST["operation"] == "Editar")
 {
 
 
  $statement = $connection->prepare(
   "UPDATE lector 
   SET Nombre = :Nombre, Edad = :Edad, Ci = :Cedula, Telefono = :Tel,Email = :Email,
   Direccion= :Dir
   WHERE id_lector=:lector_id
   "
  );
  $result = $statement->execute(
   array(
    ':Nombre' => $_POST["Nombre"],
    ':Edad' => $_POST["Edad"],
    ':Cedula'  => $_POST["Cedula"],
    ':Tel'  => $_POST["Tel"],
     ':Email'  => $_POST["Email"],
     ':Dir'  => $_POST["Dir"],
    ':lector_id'   => $_POST["lector_id"]
   )
  );
  if(!empty($result))
  {
   echo 'Los Datos Han Sido Editados';
  }
  
  
 }
}

?>
   
