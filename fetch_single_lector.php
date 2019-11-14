<?php
include('db.php');
include('functionlector.php');
if(isset($_POST["lector_id"]))
{
 $output = array();
 $statement = $connection->prepare(
  "SELECT * FROM lector 
  WHERE id_lector = '".$_POST["lector_id"]."' 
  LIMIT 1"
 );
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
 
  $output["Nombre"] = $row["Nombre"];
  $output["Edad"] = $row["Edad"];
  $output["Cedula"] = $row["Ci"];
  $output["Tel"] = $row["Telefono"];
  $output["Email"] = $row["Email"];
  $output["Dir"] = $row["Direccion"];
 
 }
 echo json_encode($output);
}
?>
   
