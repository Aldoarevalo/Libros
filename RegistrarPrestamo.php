<?php
//index.php

include('db.php');

$lector = '';

$query = "
 SELECT * FROM lector  ORDER BY id_lector ASC
";
$statement = $connection->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $lector .= '<option value="'.$row["id_lector"].'">'.$row["Nombre"].'_'.$row["Edad"].'_'.$row["Ci"].'_'.$row["Telefono"].'</option>'; 
 
}

?>

<?php
//index.php

include('db.php');

$libro = '';

$query = "
 SELECT * FROM libro  ORDER BY id_libro ASC
";
$statement = $connection->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
$libro .= '<option value="'.$row["Nombre"].'">'.$row["id_libro"].'..'.$row["Nombre"].'..'.$row["Autor"].'..'.$row["Tipo"].'..'.$row["Precio"].'</option>';
 
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Registro de Prestamos</title>
    <script src="jquery.min.js"></script>
  <link rel="stylesheet" href="bootstrap.min.css" />
  <script src="jquery.dataTables.min.js"></script>
  <script src="dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="dataTables.bootstrap.min.css" />
  <script src="bootstrap.min.js"></script>
  <script src="jquery-ui.js"></script>  
- <link rel="stylesheet" href="jquery-ui.css"> 
 <link rel="stylesheet" href="bootstrap-select.css">
  <script src="assets/jquery.validate.min.js"></script>
           <script src="bootstrap-select.js"></script>
	 
 </head>
 <body>
      <h3 align="center">
               <a href="Inicio.php">Volver al Inicio</a>
                          </h3> 
     
    
               <a href="RegistrarDevolucion.php">Consultar e Imprimir Prestamos</a>
               <li><a href="Consultadevoluciones.php">Consultar e Imprimir Devoluciones</a></li>
                
          
  <br />
  <div class="container box">
       <h3 align="center">Registro de Prestamos</h3>
     
             
  
    
   <br />
     
  
   
   <br />
   
   <form method="post" id="insert_form" name="insert_form" >
        <div  style="margin-top:  70px;position: relative;margin-bottom: 30px;" class="form-group">
     <label style="position: relative;top:4px;margin-left:0px;">buscar Lector:</label>
   
       
                <select   name="lector" id="lector" class="selectpicker" data-live-search="true" title="Buscar Lector ...">
        <?php echo $lector; ?>  
      </select>
       </div>
     <div class="row">
      
     <div class="input-daterange">
         
      <div class="col-md-4">
          
       <input type="text" name="from_date" id="from_date" class="form-control "placeholder="Ingrese la fecha del prestamo" readonly="false" />
     </div>
     
      <div class="col-md-4">
       <input type="text" name="to_date" id="to_date" class="form-control"placeholder="Ingrese la fecha de entrega del libro" readonly="false" />
      </div>      
     </div>
     
      
    </div>  
    
    <div class="table-repsonsive">
         <h3 align="center">Detalle</h3>
     <span id="error"></span>
     <table class="table table-bordered" id="item_table">
      <tr>
       <th>Item</th>
       <th>Codigo</th>
       <th>Libro</th>
       <th>Precio</th>
        <th>Disponibilidad</th>
       <th>Cantidad</th>
       <th>Total</th>
       <th>Totales</th>
       <th><button type="button" name="add_row" id="add_row" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
      </tr>
     </table>
     <div style="margin-left:30px">
                             
                             
  <select    name="libro" id="libro" class="form-control action  selectpicker "  data-live-search="true" title="Buscar Productos ...">
    
    <?php echo $libro; ?>
       
     
    </select>
                       <select  style="top:105px;position: relative;margin-left:90px;" name="codigo" id="codigo" >
     
    </select>
                    <select style="top:105px;position:relative;margin-left:90px;" name="precio" id="precio" >
    
   </select>
                                <select style="top:105px;position:relative;margin-left:90px;" name="disponibilidad" id="disponibilidad" >
    
   </select>
                                    </div>
    
    </div>
       
         <tr>
                  
                <td align="right"><b>Total</td>
                <td align="right"><b><span id="final_total_amt"></span></b></td>
              </tr>
              <tr>
                
                <td colspan="2"></td>
              </tr>
              <tr>
                <td colspan="2" align="center">
                  <input type="hidden" name="total_item" id="total_item" value="1" />
<!--                  <input type="submit" name="crear_presup" id="crear_prsup" class="btn btn-info" value="Create" />-->
                    <div align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Insert" />
     </div>
                </td>
              </tr>
   </form>
  </div>
 </body>
</html>

            <script>
     $(document).ready(function(){
         var final_total_amt = $('#final_total_amt').text();
        var count = 0;
         
        $(document).on('click', '#add_row', function(){
          count++;
        
          $('#total_item').val(count);
          var html_code = '';
          var libro = $("#libro").val();
          var codigo = $("#codigo").val();
          var precio = $("#precio").val();
          var disponibilidad = $("#disponibilidad").val();
          html_code += '<tr id="row_id_'+count+'">';
          html_code += '<td><span id="sr_no">'+count+'</span></td>';
          html_code += '<td ><input  type="text" value="'+codigo+'" name="item_cod[]"id="item_cod'+count+'" readonly="false" class="form-control readonly="false" input-sm1" /></td>';
          html_code += '<td ><input  type="required" value="'+libro+'" name="item_name[]"id="item_name'+count+'" readonly="false" class="form-control   input-sm" /></td>';
          html_code += '<td><input type="text"value="'+precio+'" name="order_item_quantity[]" id="order_item_quantity'+count+'" data-srno="'+count+'" readonly="false"  class="form-control input-sm number_only order_item_quantity" /></td>';
           html_code += '<td><input type="text"value="'+disponibilidad+'" name="order_item_um[]" id="order_item_um'+count+'" data-srno="'+count+'" readonly="false"  class="form-control input-sm number_only order_item_um" /></td>';
          html_code += '<td><input type="number" name="order_item_price[]" id="order_item_price'+count+'" data-srno="'+count+'" class="form-control input-sm number_only order_item_price" /></td>';
          html_code += '<td><input type="text" name="order_item_actual_amount[]" id="order_item_actual_amount'+count+'" data-srno="'+count+'" class="form-control input-sm order_item_actual_amount" readonly /></td>';
            
          html_code += '<td><input type="text" name="order_item_final_amount[]" id="order_item_final_amount'+count+'" data-srno="'+count+'" readonly class="form-control input-sm order_item_final_amount" /></td>';
          html_code += '<td><button type="button" name="remove_row" id="'+count+'" class="btn btn-danger btn-xs remove_row">X</button></td>';
          html_code += '</tr>';
          $('#item_table').append(html_code);
        });
        
        $(document).on('click', '.remove_row', function(){
          var row_id = $(this).attr("id");
          var total_item_amount = $('#order_item_final_amount'+row_id).val();
          var final_amount = $('#final_total_amt').text();
          var result_amount = parseFloat(final_amount) - parseFloat(total_item_amount);
          $('#final_total_amt').text(result_amount);
          $('#row_id_'+row_id).remove();
          count--;
          $('#total_item').val(count);
        });

        function cal_final_total(count)
        {
          var final_item_total = 0;
          for(j=1; j<=count; j++)
          {
            var quantity = 0;
            var price = 0;
            var actual_amount = 0;

            var tax1_amount = 0;

            var tax2_amount = 0;

            var tax3_amount = 0;
            var item_total = 0;
            quantity = $('#order_item_quantity'+j).val();
            if(quantity > 0)
            {
              price = $('#order_item_price'+j).val();
              if(price > 0)
              {
                actual_amount = parseFloat(quantity) * parseFloat(price);
                $('#order_item_actual_amount'+j).val(actual_amount);

                item_total = parseFloat(actual_amount) + parseFloat(tax1_amount) + parseFloat(tax2_amount) + parseFloat(tax3_amount);
                final_item_total = parseFloat(final_item_total) + parseFloat(item_total);
                $('#order_item_final_amount'+j).val(item_total);
              }
            }
          }
          $('#final_total_amt').text(final_item_total);
        }

        $(document).on('blur', '.order_item_price', function(){
          cal_final_total(count);
        });

        $(document).on('blur', '.order_item_tax1_rate', function(){
          cal_final_total(count);
        });

        $(document).on('blur', '.order_item_tax2_rate', function(){
          cal_final_total(count);
        });

        $(document).on('blur', '.order_item_tax3_rate', function(){
          cal_final_total(count);
        });

     $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';
  $('.item_cod').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Debe Ingresar Un Producto "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.order_item_quantity').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Debe Ingresar Un Precio "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.from_date').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Debe Ingresar la Fecha "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
 $('.order_item_price').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Debe Ingresar la Cantidad "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
   $('#lector').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Debe Ingresar el Lector "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  var form_data = $(this).serialize();
  if(error == '')
  {
  if(confirm("Confirma que Desea Grabar el Registro?"))
   $.ajax({
    url:"insertprestamo.php",
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
      $('#error').html('<div class="alert alert-success">Los Items Han Sido Guardados</div>');
      
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
      <script>  
       
   $(function() {
		$( "#from_date" ).datepicker({
			defaultDate: "+1w",
                        dateFormat: 'yy-mm-dd',  
			changeMonth: true,
			numberOfMonths: 1,
                        showOn: "button",
			buttonImage: "calendar.gif",
			buttonImageOnly: true,
			onClose: function( selectedDate ) {
                            
				$( "#to_date" ).datepicker( "option", "minDate", selectedDate );
			}
		});
		$( "#to_date" ).datepicker({
			defaultDate: "+1w",
                        dateFormat: 'yy-mm-dd',
			changeMonth: true,
			numberOfMonths: 1,
                         showOn: "button",
			buttonImage: "calendar.gif",
			buttonImageOnly: true,
			onClose: function( selectedDate ) {
				$( "#from_date" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
	});
    
 </script>

        <script>
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query = $(this).val();
   
   var result = '';
 
   if(action == "libro")
   {
    result = 'codigo';
    
   }
  
   $.ajax({
    url:"buscarlibro.php",
    method:"POST",
    data:{action:action, query:query},
    success:function(data){
     $('#'+result).html(data);
   
    }
   })
  }
 });
 
});
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query1 = $(this).val();
   
   var result1 = '';
 
   if(action == "libro")
   {
    result1 = 'precio';
    
   }
  
   $.ajax({
    url:"buscarlibro.php",
    method:"POST",
    data:{action:action, query1:query1},
    success:function(data){
     $('#'+result1).html(data);
   
    }
   })
  }
 });
 
});
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query2 = $(this).val();
   
   var result2 = '';
 
   if(action == "libro")
   {
    result2 = 'disponibilidad';
    
   }
  
   $.ajax({
    url:"buscarlibro.php",
    method:"POST",
    data:{action:action, query2:query2},
    success:function(data){
     $('#'+result2).html(data);
   
    }
   })
  }
 });
 
});
</script>