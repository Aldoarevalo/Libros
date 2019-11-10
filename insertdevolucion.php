<?php
//insert.php;
include('db.php');
if(isset($_POST["item_cod"]))
{
  

 
     
          $statement = $connection->query("SELECT (max(id_devolucion)+1)iddevolucion from devolucion");
           $iddevolucion = $statement->fetchColumn(); 
           
         $statement = $connection->prepare
            
            ("
        
      INSERT INTO devolucion
        (id_devolucion,id_prestamo,Fecha_Devuelto)
        VALUES (:iddevolucion,:Numero,:fecha_fin)
    ");     
 $statement->execute(
      array(
          ':iddevolucion'               =>  $iddevolucion,
          ':Numero' => $_POST["Numero"],
          ':fecha_fin' => $_POST["fecha_fin"],
       
         
      )
    );
  $Numero = $_POST["Numero"];
 $statement = $connection->prepare("   
  UPDATE prestamo 
        SET Fecha_Devolucion =:fecha_fin,estado =:DEVUELTO
      
       
        WHERE id_prestamo = :Numero
      ");
      
      $statement->execute(
        array(
          ':fecha_fin'               =>  trim($_POST["fecha_fin"]),
          ':DEVUELTO'               =>  trim($_POST["DEVUELTO"]),
             ':Numero'               =>  $Numero
          )
      );
 
 for($count = 0; $count < count($_POST["item_cod"]); $count++)
 {  
     
  $query = "INSERT INTO detalle_devolucion 
  (id_devolucion,id_libro,Cantidad_Devuelto,Precio_Devuelto) 
  VALUES (:iddevolucion,:item_cod,:order_item_quantity,:order_item_price)
  ";
  $statement = $connection->prepare($query);
  $statement->execute(
   array(
   ':iddevolucion'              =>  $iddevolucion, 
   ':item_cod'                =>  trim($_POST["item_cod"][$count]),
    ':order_item_quantity'    =>  trim($_POST["order_item_quantity"][$count]),
    ':order_item_price'       =>  trim($_POST["order_item_price"][$count]),
   
   )
  );
  
 }
 
 
 $result = $statement->fetchAll();
 
  if(isset($result))
 {
  echo 'Los datos se han insertado con exito';
 }
 

}


?>
