<?php
include('db.php');
include('functionlector.php');

 if($_POST["lector_id"])
 {
 $statement = $connection->prepare(
   "DELETE FROM lector WHERE id_lector = :lector_id"
  );
  $result = $statement->execute(
   array(
    ':lector_id' => $_POST["lector_id"]
   )
  );
 if(!empty($result))
  {
   echo 'Los Datos Han Sido Eliminados';
  }
 }?>
   
