<?php  
  include('db.php');

  $statement = $connection->prepare("
  SELECT * FROM vistaprestamos WHERE estado ='DEVUELTO' ORDER BY id_prestamo DESC
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
             Consulta de Devoluciones
             
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
               
             
              </tr>
            ';
          }
        }
        ?>
                     </table>  
                </div>  
           </div>  
   
     
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
       
