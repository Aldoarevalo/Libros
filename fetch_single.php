<?php
include('db.php');
include('function.php');
if(isset($_POST["user_id"]))
{
 $output = array();
 $statement = $connection->prepare(
  "SELECT * FROM libro 
  WHERE id_libro = '".$_POST["user_id"]."' 
  LIMIT 1"
 );
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
 
  $output["Nombre"] = $row["Nombre"];
  $output["Autor"] = $row["Autor"];
  $output["Anio"] = $row["Anio"];
  $output["Tipo"] = $row["Tipo"];
   $output["precio"] = $row["Precio"];
  $output["cantotal"] = $row["Cantidad_Total"];
  $output["cantdisponible"] = $row["Cantidad_Disponible"];
 
 }
 echo json_encode($output);
}
?>
   
