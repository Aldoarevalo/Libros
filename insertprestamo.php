<?php
//insert.php;
include('db.php');
if(isset($_POST["item_cod"]))
{
  

 
     
          $statement = $connection->query("SELECT (max(id_prestamo)+1)idprestamo from prestamo");
           $idprestamo = $statement->fetchColumn(); 
           
         $statement = $connection->prepare
            
            ("
        
      INSERT INTO prestamo
        (id_prestamo,id_lector,Fecha_Prestamo,Fecha_Entrega)
        VALUES (:idprestamo,:lector,:from_date,:to_date)
    ");     
 $statement->execute(
      array(
          ':idprestamo'               =>  $idprestamo,
          ':lector' => $_POST["lector"],
          ':from_date' => $_POST["from_date"],
         ':to_date' => $_POST["to_date"],
         
      )
    );
 for($count = 0; $count < count($_POST["item_cod"]); $count++)
 {  
     
  $query = "INSERT INTO prestamo_detalle 
  (id_prestamo,id_libro,Cantidad_Libro,Precio_Prestamo) 
  VALUES (:idprestamo,:item_cod,:order_item_price,:order_item_quantity)
  ";
  $statement = $connection->prepare($query);
  $statement->execute(
   array(
   ':idprestamo'              =>  $idprestamo, 
   ':item_cod'                =>  trim($_POST["item_cod"][$count]),
    ':order_item_price'       =>  trim($_POST["order_item_price"][$count]),
    ':order_item_quantity'    =>  trim($_POST["order_item_quantity"][$count]),
   )
  );
  
 }
 
 
 $result = $statement->fetchAll();
 
  if(isset($result))
 {
  echo 'Los datos se han insertado con exito';
 }
// else{
//echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
//}
 
}

?>
