<?php
include('db.php');
include('function.php');

 if($_POST["user_id"])
 {
 $statement = $connection->prepare(
   "DELETE FROM libro WHERE id_libro = :user_id"
  );
  $result = $statement->execute(
   array(
    ':user_id' => $_POST["user_id"]
   )
  );
 if(!empty($result))
  {
   echo 'El Registro Ha Sido Eliminado';
  }
 }?>
   
