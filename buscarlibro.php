<?php
//fetch.php

if(isset($_POST['action']))
{
 include('db.php');

 $output = '';

 if($_POST["action"] == 'libro')
 {
  $query = "
  SELECT id_libro FROM libro
  WHERE Nombre = :libro 
  GROUP BY id_libro
  ";
  $statement = $connection->prepare($query);
  $statement->execute(
   array(
    ':libro'  => $_POST["query"]
   )
  );
  $result = $statement->fetchAll();
//  $output .= '<option value="">Select State</option>';
  foreach($result as $row)
  {
   $output .= '<option value="'.$row["id_libro"].'">'.$row["id_libro"].'</option>';
    
  }
 }
 
  echo $output;
 $output1 = '';
 if($_POST["action"] == 'libro')
 {
  $query1 = "
  SELECT Precio FROM libro
  WHERE Nombre = :libro 
  GROUP BY id_libro
  ";
  $statement = $connection->prepare($query1);
  $statement->execute(
   array(
    ':libro'  => $_POST["query1"]
   )
  );
  $result1 = $statement->fetchAll();
//  $output .= '<option value="">Select State</option>';
  foreach($result1 as $row)
  {
   $output1 .= '<option value="'.$row["Precio"].'">'.$row["Precio"].'</option>';
    
  }
 }
 echo $output1;
  $output2 = '';
 if($_POST["action"] == 'libro')
 {
  $query2 = "
  SELECT Cantidad_Disponible FROM libro
  WHERE Nombre = :libro 
  GROUP BY id_libro
  ";
  $statement = $connection->prepare($query2);
  $statement->execute(
   array(
    ':libro'  => $_POST["query2"]
   )
  );
  $result2 = $statement->fetchAll();
//  $output .= '<option value="">Select State</option>';
  foreach($result2 as $row)
  {
   $output2 .= '<option value="'.$row["Cantidad_Disponible"].'">'.$row["Cantidad_Disponible"].'</option>';
    
  }
 }
  echo $output2;
}
 

?>

