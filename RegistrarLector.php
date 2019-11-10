<html>
 <head>
  <title>Registro de Lector</title>
  <script src="jquery.min.js"></script>
  <link rel="stylesheet" href="bootstrap.min.css" />
  <script src="jquery.dataTables.min.js"></script>
  <script src="dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="dataTables.bootstrap.min.css" />
  <script src="bootstrap.min.js"></script>
     <script src="jquery-ui.js"></script>  
           <link rel="stylesheet" href="jquery-ui.css">
             <script src="assets/jquery.validate.min.js"></script>
          <script src="assets/validadorlector.js"></script>      
            <h3 align="center">
               <a href="Inicio.php">Volver al Inicio</a>
             </h3> 
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
  <div class="container box">
   <h1 align="center">Registro de Lector</h1>
   
   <br />
   <div class="table-responsive">
   
    <br />
    <div align="right">
     <button type="button" id="add_button" data-toggle="modal" data-target="#lectorModal" class="btn btn-info btn-lg">Registrar Lector</button>
    </div>
    <br /><br />
    <table id="lector_data" class="table table-bordered table-striped">
     <thead>
      <tr>
        <th width="10%">Id</th>
       <th width="10%">Nombre</th>
       <th width="35%">Edad</th>
       <th width="35%">Ci</th>
        <th width="35%">Telefono</th>
         <th width="35%">Email</th>
          <th width="35%">Direccion</th>
       <th width="10%">Editar</th>
       <th width="10%">Eliminar</th>
      
      </tr>
     </thead>
    </table>
    
   </div>
  </div>
 </body>
</html>

<div id="lectorModal" class="modal fade">
 <div class="modal-dialog">
  <form method="post" id="lector_form" enctype="multipart/form-data">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Registrar Lector</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
     <label>Ingrese el Nombre del Lector</label>
     <span class="help-block" id="error"></span>
     <input type="text" name="Nombre" id="Nombre" class="form-control" />
      </div>
      <div class="form-group">
     <label>Ingrese la Edad del Lector</label>
     <span class="help-block" id="error"></span>
     <input type="text" name="Edad" id="Edad" class="form-control" />
     </div>
      <div class="form-group">
        <span class="help-block" id="error"></span>
    <label>Ingrese el Numero de documento del Lector</label>
     <input type="text" name="Cedula" id="Cedula" class="form-control"  />
            </div>
     <div class="form-group">
    <label>Ingrese el Telefono del Lector</label>
    <span class="help-block" id="error"></span>
     <input type="text" name="Tel" id="Tel" class="form-control"  />
       </div>
      <div class="form-group">
     <label>Ingrese el Email del Lector</label>
     <span class="help-block" id="error"></span>
     <input type="text" name="Email" id="Email" class="form-control" />
     </div>
      <div class="form-group">
     <label>Ingrese la Direccion del Lector</label>
       <span class="help-block" id="error"></span>
     <input type="text" name="Dir" id="Dir" class="form-control" />
      
    </div>
    <div class="modal-footer">
     <input type="hidden" name="lector_id" id="lector_id" />
     <input type="hidden" name="operation" id="operation" />
     <input type="submit" name="action" id="action" class="btn btn-success" value="Registrar" />
     <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>
   </div>
  </form>
 </div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 $('#add_button').click(function(){
  $('#lector_form')[0].reset();
  $('.modal-title').text("Registrar Lector");
  $('#action').val("Registrar");
  $('#operation').val("Registrar");
//  $('#user_uploaded_image').html('');
 });
 
 var dataTable = $('#lector_data').DataTable({
  "processing":true,
  "serverSide":true,
  "order":[],
  "ajax":{
   url:"fetchlector.php",
   type:"POST"
  },
  "columnDefs":[
   {
    "targets":[0, 3, 4],
    "orderable":false
   },
  ]

 });

 $(document).on('submit', '#lector_form', function(event){
  event.preventDefault();
  var Nombre = $('#Nombre').val();
  var Edad = $('#Edad').val();
  var Cedula = $('#Cedula').val();
  var Tel = $('#Tel').val();
  var Email = $('#Email').val(); 
  var Dir = $('#Dir').val();
  if(Nombre != '' && Edad != ''&& Cedula != ''&& Tel != ''&&  Email != ''&& Dir != '')
  {
// if(confirm("Confirma que Desea Grabar el Registro?"))
   $.ajax({
    url:"insertlector.php",
    method:'POST',
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    
    {
       alert(data);
     $('#lector_form')[0].reset();
     $('#lectorModal').modal('hide');
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
  var lector_id = $(this).attr("id");
  
  $.ajax({
   url:"fetch_singlelector.php",
   method:"POST",
   data:{lector_id:lector_id},
   dataType:"json",
   success:function(data)
   {
    $('#lectorModal').modal('show');
    $('#Nombre').val(data.Nombre);
    $('#Edad').val(data.Edad);
    $('#Cedula').val(data.Cedula);
    $('#Tel').val(data.Tel);
    $('#Email').val(data.Email);
    $('#Dir').val(data.Dir);
    $('.modal-title').text("Editar Lector");
    $('#lector_id').val(lector_id);
    $('#action').val("Editar");
    $('#operation').val("Editar");
   }
  })
 });
 
 $(document).on('click', '.delete', function(){
  var lector_id = $(this).attr("id");
  if(confirm("Confirma que Desea Eliminar el Registro?"))
  {
   $.ajax({
    url:"deletelector.php",
    method:"POST",
    data:{lector_id:lector_id},
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
 
