<?php  
  include('db.php');

  $statement = $connection->prepare("
   SELECT * FROM vistaprestamos WHERE estado='EN PRESTAMO' ORDER BY id_prestamo DESC
  ");
$statement->execute();

  $all_result = $statement->fetchAll();

  $total_rows = $statement->rowCount();
 
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Registrar Devolucion</title>
     <script src="jquery.min.js"></script>
  <link rel="stylesheet" href="bootstrap.min.css" />
  <script src="jquery.dataTables.min.js"></script>
  <script src="dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="dataTables.bootstrap.min.css" />
  <script src="bootstrap.min.js"></script>
  <script src="jquery-ui.js"></script>
   <link rel="stylesheet" href="jquery-ui.css">
<link rel="stylesheet" href="bootstrap-select.css">
  <link rel="stylesheet" href="estilo.css">
  <script src="bootstrap-select.js"></script>
 

      <?php
      if(isset($_GET["add"]))
      {
      ?>
          
              
              
            
  <?php
      }
      elseif(isset($_GET["ingreso"]) && isset($_GET["idorden"]))
      {
        $statement = $connection->prepare("
          SELECT * FROM vistaprestamos
            WHERE id_prestamo = :idorden
            LIMIT 1
        ");
        $statement->execute(
          array(
            ':idorden'       =>  $_GET["idorden"]
            )
          );
        $result = $statement->fetchAll();
        foreach($result as $row)
        {
        ?>
 
        
   
   
        
   
        
              <h3 align="center" style="font-size: 24px;">
               <a href="Inicio.php">Volver al Inicio</a>
             
           </h3>   
      <a href="RegistrarDevolucion.php">Consultar e Imprimir Prestamos</a>
               <li><a href="Consultadevoluciones.php">Consultar e Imprimir Devoluciones</a></li>
                
         <form method="post"action="insertoproduccion.php" id="getactionordencompra">
   
   
    
   
             <input type="text" name="DEVUELTO" value="DEVUELTO" style="position:relative;top:70px;" />
       
      
         
       
         <div class="row" style="margin-bottom:30px;" >
      
     <div class="input-daterange">
      <div class="col-md-4">
            <br /> <b>Numero de Prestamo:</b>
       <input  type="text" name="Numero" id="Numero" class="form-control " readonly="false"value="<?php echo $row['id_prestamo']; ?>"  />
      </div>
      <div class="col-md-4">
            <br /> <b>Lector:</b>
       <input type="text" name="Lector" id="Lector" class="form-control" readonly="false" value="<?php echo $row['Nombre']; ?>"  />
      </div>  
         
         <div class="col-md-4">
            <br /> <b>Numero de Documento:</b>
       <input type="text" name="Cedula" id="Cedula" class="form-control" readonly="false" value="<?php echo $row['Cedula']; ?>"  />
      </div> 
          <div class="col-md-4">
            <br /> <b>Fecha de Prestamo:</b>
       <input type="text" name="fecha_inicio" id="fecha_inicio" class="form-control" readonly="false" value="<?php echo $row['Fecha_Prestamo']; ?>"  />
      </div> 
          <div class="col-md-4">
            <br /> <b>Fecha de Entrega:</b>
       <input type="text" name="Fecha_Entrega" id="Fecha_Entrega" class="form-control" readonly="false" value="<?php echo $row['Fecha_Entrega']; ?>"  />
      </div> 
         <div class="col-md-4">
            <br /> <b>Fecha de Devolucion:</b>
       <input type="text" name="fecha_fin" id="fecha_fin" class="form-control" readonly="false" placeholder="Ingrese la fecha de devolucion"  />
      </div> 
     </div>
     
      
    </div>  
   
    
  
       <div class="table-repsonsive">
         <h3 align="center">Detalle</h3>
     <span id="error"></span>
                    
               <div class="row">
                 <table class="table table-bordered" id="item_table">
                   <tr>     
                      <th width="1%">Nro°.</th>
                        <th width="7%">codigo.</th>
                      <th width="20%">Libro.</th>
                      <th width="5%">Cantidad Prestada.</th>
          
                        <th width="5%">Precio de Prestamo.</th>
                        <th width="5%">Cantidad A Ingresar.</th>
                        <th width="5%">Total.</th>
                         <th width="5%">Totales.</th>

                      <th width="1%" rowspan="2"></th>
                    </tr>
                    <tr>
                   
                       
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                       <th></th>
                    
                    </tr>
                    <?php
                     
                    $statement = $connection->prepare("
                      SELECT * FROM vistaprestamos 
                      WHERE id_prestamo = :idorden
                    ");
                    $statement->execute(
                      array(
                        ':idorden'       =>  $_GET["idorden"]
                      )
                    );
                    $item_result = $statement->fetchAll();
                    $m = 0;
                    foreach($item_result as $sub_row)
                    {
                      $m = $m + 1;
                    ?>
                    <tr>
                       <td><span id="sr_no"><?php echo $m; ?></span></td>
                       <td><input type="text" name="item_cod[]" id="item_name<?php echo $m; ?>" class="form-control input-sm" value="<?php echo $sub_row["id_libro"]; ?>"readonly="false" /></td>
                      <td><input type="text" name="item_name[]" id="item_name<?php echo $m; ?>" class="form-control input-sm" value="<?php echo $sub_row["Libro"]; ?>" readonly="false"/></td>

                     
                      <td><input type="text" name="order_item_can[]" id="order_item_can<?php echo $m; ?>" data-srno="<?php echo $m; ?>" class="form-control input-sm number_only order_item_can" value="<?php echo $sub_row["Cantidad_Libro"]; ?>" readonly="false" /></td>
                        <td><input type="text" name="order_item_price[]" id="order_item_price<?php echo $m; ?>" data-srno="<?php echo $m; ?>" class="form-control input-sm order_item_price" value = "<?php echo $sub_row["Precio_Prestamo"]; ?>" readonly="false"/></td>
                           <td><input type="text" name="order_item_quantity[]" id="order_item_quantity<?php echo $m; ?>" data-srno="<?php echo $m; ?>" class="form-control input-sm number_only order_item_quantity" value="<?php echo $sub_row["Cantidad_Libro"]; ?>" readonly="false"/></td>
                          <td><input type="text" name="order_item_actual_amount[]" id="order_item_actual_amount<?php echo $m; ?>" data-srno="<?php echo $m; ?>" class="form-control input-sm order_item_actual_amount" value="<?php echo $sub_row["total"];?>" readonly /></td>
                                                <td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount<?php echo $m; ?>" data-srno="<?php echo $m; ?>" readonly class="form-control input-sm order_item_final_amount" value="<?php echo $sub_row["total"]; ?>" /></td>
                          

                      
                     
                    </tr>
                    <?php
                    }
                    ?>
       </table>
                   
              
            
 
         <td align="right"><b>Totales</td>
                 <td align="right"><b><span id="final_total_amt"><?php echo $sub_row["totalp"]; ?></span></b></td>
              </tr>
               <th>
              <tr>
                <td colspan="2">    <div style="margin-left:455px;">

                     
                  </div>
                         
        </td>
              </tr>
              
              <tr>
                <td colspan="2" align="center">
                    
                  <input type="hidden" name="total_item" id="total_item" value="<?php echo $m; ?>" />
                  <input type="hidden" name="idPedidoCompra" id="idPedidoCompra <?php echo $m; ?>" value="<?php echo $row["idPedidoCompra"]; ?>" />
                  <input type="submit" name="crear_ing" id="crear_ing" class="btn btn-info" value="Registrar Devolucion" style="margin-left: 120px;" />
                </td>
                
              </tr>
              
          </table>
          
       </div>
      </form>
       <script>
           
     $(document).ready(function(){
         
      $('#getactionordencompra').on('submit', function(event){
  event.preventDefault();
  var error = '';
  $('.item_cod').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Ingrese el Producto "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.order_item_quantity').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Ingrese la Cantidad"+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.fecha_fin').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Ingrese Una Fecha"+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
 $('.order_item_price').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Ingrese un Precio"+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
 var form_data = $(this).serialize();
  if(error == '')
  {
  if(confirm("Confirma que Desea Grabar el Registro?"))
   $.ajax({
    url:"InsertDevolucion.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
            alert(data);
     if(data == 'ok')
     {
//      $('#item_table').find("tr:gt(0)").remove();
//      $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
     }
     $('#item_table').find("tr:gt(0)").remove();
      $('#error').html('<div class="alert alert-success">Los Items Se Han Guardado</div>');
      
    }
    
   });
   
  }
  else
  {
   $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }
 
 });
 
});
      </script>
      
        <?php 
        }
      }
      else
      {
      ?>
       
            <h3 align="center" style="font-size: 24px;">
               <a href="Inicio.php">Volver al Inicio</a>
             
           </h3>
      <br />
      <div align="right">
         <div class="row">
      
     <div class="input-daterange">
      <div class="col-md-4">
       <input type="text" onkeyup="doSearch()"  name="Nombre" id="Nombre" class="form-control "placeholder="Ingrese el Nombre del Lector"  />
      </div>
      <div class="col-md-4">
       <input type="text" onkeyup="doSearch1()" name="Cedula" id="Cedula" class="form-control"placeholder="Ingrese el Numero de Documento"  />
      </div> 
          <div class="col-md-4">
         <input   class="form-control"id="searchTerm" type="text" onkeyup="doSearch2()"class="form-control"placeholder="Ingrese los datos a buscar"  />
     </div>
     
      
    </div>   

      </div> 
       <h3 align="center" style="font-size: 24px;">
             Consulta de Prestamos Pendientes de Devolucion
             
           </h3>
      <br />
  <div id="order_table">  
                     <table class="table table-bordered"id="order-table">  
                          <tr>  
                               <th width="5%">Numero</th>  
                               <th width="30%">Lector</th>  
                               <th width="43%">Nº de Documento</th>  
                               <th width="10%">Fecha de Prestamo</th>  
                               <th width="12%">Fecha de Entrega</th>
                               <th width="12%">Fecha de Devolucion</th>
                               <th width="12%">Estado</th>
                               <th width="12%">Cantidad de Libro</th>
                               <th width="12%">Libro</th>
                              <th width="12%">Precio de Prestamo</th>
                              <th width="12%">Total</th>
                              <th width="12%">Totales</th>
                               <th width="12%">Vizualizar e Imprimir</th>
                              <th width="12%">Registrar Devolucion</th>  
                          </tr>  
                      <?php
        if($total_rows > 0)
        {
          foreach($all_result as $row)
          {
            echo '
              <tr>
                <td>'.$row["id_prestamo"].'</td>
                <td>'.$row["Nombre"].'</td>
                <td>'.$row["Cedula"].'</td>
                <td>'.$row["Fecha_Prestamo"].'</td>
                <td>'.$row["Fecha_Entrega"].'</td>
                <td>'.$row["Fecha_Devolucion"].'</td>
                <td>'.$row["estado"].'</td>
                <td>'.$row["Cantidad_Libro"].'</td>
                <td>'.$row["Libro"].'</td>
                 <td>'.$row["Precio_Prestamo"].'</td>
                <td>'.$row["total"].'</td>
                <td>'.$row["totalp"].'</td>
              
                <td><a href="vistaordenp.php?ordenp='.$row["id_prestamo"].'"><span class="btn btn-warning btn-xs update">Vizualizar e Imprimir</span></a></td>
                <td><a href="RegistrarDevolucion.php?ingreso=1&idorden='.$row["id_prestamo"].'"><span class="glyphicon glyphicon-edit">Registrar Devolucion</span></a></td>
             
              </tr>
            ';
          }
        }
        ?>
                     </table>  
                </div>  
           </div>  
      <?php
      }
      ?>
    </div>
    <br>
    <footer class="container-fluid text-center">
      <p>Footer Text</p>
       </footer>
 
  </body>
</html>
  <script>  
       
   $(function() {
		$( "#fecha_fin" ).datepicker({
			defaultDate: "+1w",
                        dateFormat: 'yy-mm-dd',  
			changeMonth: true,
			numberOfMonths: 1,
                        showOn: "button",
			buttonImage: "calendar.gif",
			buttonImageOnly: true,
			onClose: function( selectedDate ) {
                            
				$( "#fecha_fin" ).datepicker( "option", selectedDate );
			}
		});
	
	});
    
 </script>
  <script>
	
        function doSearch()
		{
			var tableReg = document.getElementById('order-table');
			var searchText = document.getElementById('Nombre').value.toLowerCase();
			var cellsOfRow="";
			var found=false;
			var compareWith="";
 
			// Recorremos todas las filas con contenido de la tabla
			for (var i = 1; i < tableReg.rows.length; i++)
			{
				cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
				found = false;
				// Recorremos todas las celdas
				for (var j = 0; j < cellsOfRow.length && !found; j++)
				{
					compareWith = cellsOfRow[j].innerHTML.toLowerCase();
					// Buscamos el texto en el contenido de la celda
					if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1))
					{
						found = true;
					}
				}
				if(found)
				{
					tableReg.rows[i].style.display = '';
				} else {
					// si no ha encontrado ninguna coincidencia, esconde la
					// fila de la tabla
					tableReg.rows[i].style.display = 'none';
				}
			}
		}
	</script>
       <script>
	
        function doSearch1()
		{
			var tableReg = document.getElementById('order-table');
			var searchText = document.getElementById('Cedula').value.toLowerCase();
			var cellsOfRow="";
			var found=false;
			var compareWith="";
 
			// Recorremos todas las filas con contenido de la tabla
			for (var i = 1; i < tableReg.rows.length; i++)
			{
				cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
				found = false;
				// Recorremos todas las celdas
				for (var j = 0; j < cellsOfRow.length && !found; j++)
				{
					compareWith = cellsOfRow[j].innerHTML.toLowerCase();
					// Buscamos el texto en el contenido de la celda
					if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1))
					{
						found = true;
					}
				}
				if(found)
				{
					tableReg.rows[i].style.display = '';
				} else {
					// si no ha encontrado ninguna coincidencia, esconde la
					// fila de la tabla
					tableReg.rows[i].style.display = 'none';
				}
			}
		}
	</script>
       <script>
	
        function doSearch2()
		{
			var tableReg = document.getElementById('order-table');
			var searchText = document.getElementById('searchTerm').value.toLowerCase();
			var cellsOfRow="";
			var found=false;
			var compareWith="";
 
			// Recorremos todas las filas con contenido de la tabla
			for (var i = 1; i < tableReg.rows.length; i++)
			{
				cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
				found = false;
				// Recorremos todas las celdas
				for (var j = 0; j < cellsOfRow.length && !found; j++)
				{
					compareWith = cellsOfRow[j].innerHTML.toLowerCase();
					// Buscamos el texto en el contenido de la celda
					if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1))
					{
						found = true;
					}
				}
				if(found)
				{
					tableReg.rows[i].style.display = '';
				} else {
					// si no ha encontrado ninguna coincidencia, esconde la
					// fila de la tabla
					tableReg.rows[i].style.display = 'none';
				}
			}
		}
	</script>
       