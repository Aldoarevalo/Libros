<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Registrar")
 {
   $statement = $connection->query("SELECT (max(id_libro)+1)idlibro from libro");
           $idlibro = $statement->fetchColumn();
  $statement = $connection->prepare("
   INSERT INTO libro (id_libro,Nombre,Autor,Anio,Tipo,Precio,Cantidad_Total,Cantidad_Disponible) 
   VALUES (:idlibro ,:Nombre,:Autor,:Anio,:Tipo,:precio,:cantotal,:cantdisponible)
  ");
  $result = $statement->execute(
   array(
  
     ':idlibro'               =>  $idlibro,
     ':Nombre' => $_POST["Nombre"],
      ':Autor' => $_POST["Autor"],
      ':Anio' => $_POST["Anio"],
      ':Tipo' => $_POST["Tipo"],
      ':precio' => $_POST["precio"],
      ':cantotal' => $_POST["cantotal"],
      ':cantdisponible' => $_POST["cantdisponible"], 
   )
  );
  if(!empty($result))
  {
   echo 'El Libro Se Ha Insertado con exito';
  }
 }
 if($_POST["operation"] == "Edit")
 {
 
 
  $statement = $connection->prepare(
   "UPDATE libro 
   SET Nombre = :Nombre, Autor = :Autor, Anio = :Anio, Tipo = :Tipo,precio= :precio,Cantidad_Total = :cantotal,
   Cantidad_Disponible = :cantdisponible    
   WHERE id_libro = :user_id
   "
  );
  $result = $statement->execute(
   array(
    ':Nombre' => $_POST["Nombre"],
    ':Autor' => $_POST["Autor"],
    ':Anio'  => $_POST["Anio"],
    ':Tipo'  => $_POST["Tipo"],
    ':precio'  => $_POST["precio"],
     ':cantotal'  => $_POST["cantotal"],
     ':cantdisponible'  => $_POST["cantdisponible"],
    ':user_id'   => $_POST["user_id"]
   )
  );
  if(!empty($result))
  {
   echo 'Los Datos Han Sido Editados';
  }
  
 
 }
}

?>
   
