<html>
 <head>
  <title>Registro de Libros</title>
  <script src="jquery.min.js"></script>
  <link rel="stylesheet" href="bootstrap.min.css" />
  <script src="jquery.dataTables.min.js"></script>
  <script src="dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="dataTables.bootstrap.min.css" />
  <script src="bootstrap.min.js"></script>
     <script src="jquery-ui.js"></script>  
           <link rel="stylesheet" href="jquery-ui.css"> 
          <script src="assets/jquery.validate.min.js"></script>
          <script src="assets/validadorlibro.js"></script>      
           
        
        
       
</head>
<body>


  <style>
   body
   {
    margin:0;
    padding:0;
    background-color:#f1f1f1;
   }
   .box
   {
    width:1270px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:25px;
   }
  </style>
 </head>
 <body>
          
         <h3 align="center">
               <a href="Inicio.php">Volver al Inicio</a>
             
           </h3>
  <div class="container box">
      
   <h1 align="center">Registro de Libros</h1>
   
   <br />
   <div class="table-responsive">
   
    <br />
    <div align="right">
     <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Registrar Libro</button>
    </div>
    <br /><br />
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
        <th width="10%">Numero</th>
       <th width="10%">Nombre</th>
       <th width="35%">Autor</th>
       <th width="35%">Año</th>
        <th width="35%">Tipo</th>
         <th width="35%">Existencia Maxima</th>
          <th width="35%">Disponibilidad</th>
       <th width="10%">Edit</th>
       <th width="10%">Delete</th>
      
      </tr>
     </thead>
    </table>
    
   </div>
  </div>
 </body>
</html>

<div id="userModal" class="modal fade">
 <div class="modal-dialog">
  <form method="post" id="user_form" name="user_form" enctype="multipart/form-data">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Registrar Libro</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">  
     <label>Ingrese el Nombre del Libro</label>
      <span class="help-block" id="error"></span>
     <input type="text" name="Nombre" id="Nombre" class="form-control" />
       </div>
        <div class="form-group">  
     <label>Ingrese el Nombre del Autor</label>
     <span class="help-block" id="error"></span>
     <input type="text" name="Autor" id="Autor" class="form-control" />
     </div>
        <div class="form-group">
             <span class="help-block" id="error"></span>
    <label>Ingrese el Año del Libro</label>
     <input type="text" name="Anio" id="Anio" class="form-control"  />
         </div>
      <div class="form-group">
    <label>Ingrese el Tipo de Libro</label>
    <span class="help-block" id="error"></span>
     <input type="text" name="Tipo" id="Tipo" class="form-control"  />
     </div>
          <div class="form-group">
     <label>Ingrese Un Precio Para el Libro</label>
     <span class="help-block" id="error"></span>
     <input type="text" name="precio" id="precio" class="form-control" />
   </div>
        
      <div class="form-group">
     <label>Ingrese la Cantidad Maxima de existencia</label>
     <span class="help-block" id="error"></span>
     <input type="text" name="cantotal" id="cantotal" class="form-control" />
      </div>
        <div class="form-group">
     <label>Ingrese la cantidad de libro a ingresar a stock</label>
     <span class="help-block" id="error"></span>
     <input type="text" name="cantdisponible" id="cantdisponible" class="form-control" />
   </div>
    <div class="modal-footer">
     <input type="hidden" name="user_id" id="user_id" />
     <input type="hidden" name="operation" id="operation" />
     <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
     <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>
   </div>
  </form>
 </div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 $('#add_button').click(function(){
  $('#user_form')[0].reset();
  $('.modal-title').text("Registrar Libro");
  $('#action').val("Registrar");
  $('#operation').val("Registrar");
//  $('#user_uploaded_image').html('');
 });
 
 var dataTable = $('#user_data').DataTable({
  "processing":true,
  "serverSide":true,
  "order":[],
  "ajax":{
   url:"fetch.php",
   type:"POST"
  },
  "columnDefs":[
   {
    "targets":[0, 3, 4],
    "orderable":false
   },
  ]

 });

 $(document).on('submit', '#user_form', function(event){
  event.preventDefault();
  var Nombre = $('#Nombre').val();
  var Autor = $('#Autor').val();
  var Anio = $('#Anio').val();
  var Tipo = $('#Tipo').val();
  var precio = $('#precio').val(); 
  var cantotal = $('#cantotal').val(); 
  var cantdisponible = $('#cantdisponible').val();
  if(Nombre != 'A-A-A-A' && Autor != ''&& Anio != ''&& Tipo != ''&& precio != ''&& cantotal != ''&& cantdisponible != '')
  {
//  if(confirm("Confirma Que Desea Grabar los Datos?"))    
   $.ajax({
    url:"insert.php",
    method:'POST',
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
     alert(data);
     $('#user_form')[0].reset();
     $('#userModal').modal('hide');
     dataTable.ajax.reload();
    }
   });
  }
//  else
//  {
//   alert("Se Requieren Todos los datos");
//  }
 });
 
 $(document).on('click', '.update', function(){
  var user_id = $(this).attr("id");
  $.ajax({
   url:"fetch_single.php",
   method:"POST",
   data:{user_id:user_id},
   dataType:"json",
   success:function(data)
   {
    $('#userModal').modal('show');
    $('#Nombre').val(data.Nombre);
    $('#Autor').val(data.Autor);
    $('#Anio').val(data.Anio);
    $('#Tipo').val(data.Tipo);
    $('#precio').val(data.precio);
    $('#cantotal').val(data.cantotal);
    $('#cantdisponible').val(data.cantdisponible);
    $('.modal-title').text("Editar Libro");
    $('#user_id').val(user_id);
    $('#action').val("Editar");
    $('#operation').val("Edit");
   }
  })
 });
 
 $(document).on('click', '.delete', function(){
  var user_id = $(this).attr("id");
  if(confirm("Confirma Que Desea Eliminar los Datos?"))
  {
   $.ajax({
    url:"delete.php",
    method:"POST",
    data:{user_id:user_id},
    success:function(data)
    {
     alert(data);
     dataTable.ajax.reload();
    }
   });
  }
  else
  {
   return false; 
  }
 });
 
 
});
</script>
 
