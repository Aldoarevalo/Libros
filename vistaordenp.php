<!DOCTYPE html>
<html>
<head>

<title>
Vista Previa de Prestamo
</title>
 <link href="css/bootstrap.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="adsbygoogle.js"></script>
    <script src="jquery.dataTables.min.js"></script>
    <script src="dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="dataTables.bootstrap.min.css">
<!--       <script src="buscador/datos/jquery-1.6.4.min.js"></script>
<script src="buscador/datos/jquery-1.6.4.min.js"></script>-->
<!--  <link rel="stylesheet"href="bootstrap.min.css">-->
   <link rel="stylesheet" href="buscador/dist/css/bootstrap-select.css">
<!--  <script src="buscador/datos/jquery.min.js"></script>-->
<!--  <script src="buscador/datos/bootstrap.min.js"></script>-->
  <script src="buscador/dist/js/bootstrap-select.js"></script>
    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
    
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="estilo.css">
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=1800, height=1800, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 800px; font-size: 13px; font-family: arial;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<style type="text/css">
			
			* {
				margin:0px;
				padding:0px;
			}
			
			#header {
				margin:auto;
				width:800px;
				font-family:Arial, Helvetica, sans-serif;
			}
			
			ul, ol {
				list-style:none;
			}
			
			.nav {
				width:1000px; /*Le establecemos un ancho*/
				margin:0 auto; /*Centramos automaticamente*/
			}

			.nav > li {
				float:left;
			}
			
			.nav li a {
				background-color:aquamarine;
				color: #080808;
/*                                font-weight:  bold;*/
				text-decoration:none;
                                text-decoration-color: black;
				padding:10px 26px;
				display:block;                            
                                font-size:16px;
                            
			}
			
			.nav li a:hover {
				background-color:aquamarine;
                                text-decoration: none;
                                  background: dodgerblue;
			}
			
			.nav li ul {
				display:none;
				position:absolute;
				min-width:140px;
			}
			
			.nav li:hover > ul {
				display:block;
			}
			
			.nav li ul li {
				position:relative;
			}
			
			.nav li ul li ul {
				right:-140px;
				top:0px;
			}
			
		</style>



<body id="hhmenu">
      
        
        
   
        
   
         
	
	
		
	
	

      <h3  ><a style="color: black;" href="Inicio.php">Volver al Inicio</a></h3>  
      <li>		<a  href="javascript:Clickheretoprint()" style="font-size:20px;"><button  class="btn btn-success btn-large"><i class="icon-print"></i> Imprimir</button></a></li>
<div class="content" id="content">
<?php
					$ordenp=$_GET['ordenp'];
include('db.php');
$statement = $connection->prepare("
          SELECT * FROM vistaprestamos
            WHERE id_prestamo = :ordenp
            LIMIT 1
        ");
        $statement->execute(
          array(
            ':ordenp'       =>  $_GET["ordenp"]
            )
          );
        $result = $statement->fetchAll();
        foreach($result as $row){
				?>
				<tr class="record">
                                <div class="row" style="margin-left: 500px;">
                    <div class="col-md-8">
                      <br /> <b>Numero de Prestamo :</b>
                        <b>  </b><b><?php echo $row['id_prestamo']; ?></b><br />
                       
                    </div>
                                    
                    <div class="col-md-8">
                     <br /> <b>Lector :</b>
                        <b>  </b><b><?php echo $row['Nombre']; ?></b><br />
                      
                      
                    </div>
                                    <div class="col-md-8">
                      <br /> <b>Numero de Documento :</b>
                        <b>  </b><b><?php echo $row['Cedula']; ?></b><br />
                      
                    </div>
                                        <div class="col-md-8">
                      <br /> <b>Fecha de Prestamo:</b>
                        <b>  </b><b><?php echo $row['Fecha_Prestamo']; ?></b><br />
                      
                    </div>
                                     <div class="col-md-8">
                      <br /> <b>Fecha de Entrega:</b>
                        <b>  </b><b><?php echo $row['Fecha_Entrega']; ?></b><br />
                      
                    </div>
                                     
                                                            <div  class="col-md-8">
                      <br /> <b>Estado :</b>
                        <b>  </b><b><?php echo $row['estado']; ?></b><br />
                      
                    </div>
                  
                                    
                                                            
                               </div>    
				
				
				
				<?php
					}
				?>
                               
<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
           
        </div><!--/span-->
		
	<div class="span10">
	


<div style="margin: 0 auto; padding: 20px; width: 900px; font-weight: normal;">
	<div style="width: 100%; height: 190px;" >
	<div style="width: 900px; float: left;">
	
	
	</div>
	<div style="width: 136px; float: left; height: 70px;">
            
	<table cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 12px;text-align:left;width : 100%;">

		<tr>
			<b>Items</b>
<!--			<b><?php echo $ordenp ?></b>-->
		</tr>
		
	</table>
	
	</div>
	<div class="clearfix"></div>
	</div>
	<div style="width: 120%; margin-top:-120px;">
	<table border="2" cellpadding="1" rules="all" style="font-family: arial; font-size: 13px;	text-align:left;" width="100%">
		<thead >
			<tr >
				<th  >Nro°</th>
				<th >Codigo</th>
				<th width="20%">Libro</th>
				<th>Precio de Prestamo</th>
                                <th>Cantidad Prestada</th>
                                <th>Total</th>
                                <th>Totales</th>
			</tr>
		</thead>
		<tbody rules="all"  cellspacing="1" border="2">
			
				<?php
					$ordenp=$_GET['ordenp'];
include('db.php');
$statement = $connection->prepare("
          SELECT * FROM vistaprestamos
            WHERE id_prestamo = :ordenp
         
        ");
        $statement->execute(
          array(
            ':ordenp'       =>  $_GET["ordenp"]
            )
          );
        $item_result = $statement->fetchAll();
                    $m = 0;
                    foreach($item_result as $sub_row){
                         $m = $m + 1;
				?>
				<tr style="font-family:arial; font-size:15px;"  >
                         
                      <td ><span id="sr_no"><?php echo $m; ?></span></td>
                      
                       <td><?php echo $sub_row["id_libro"]; ?></td>
                      <td width="40%" ><?php echo $sub_row["Libro"]; ?></td>
                      <td><?php echo $sub_row["Precio_Prestamo"]; ?></td>
                       <td><?php echo $sub_row["Cantidad_Libro"]; ?></td>
                     <td><?php echo $sub_row["total"];?></td>
                     <td><?php  echo $sub_row["totalp"]; ?></td>
                       
                    
                    </tr>
				
			
				
					
					<?php
					}
				?>
	                       <tr>
                                        <td  colspan="6" style=" text-align:right;"><strong    style="font-size: 12px;">Total: &nbsp;</strong></td>
					<td colspan="2"><strong style="font-size: 12px;"><?php   echo $sub_row["totalp"]; ?>
					</strong></td>
                                        </tr>
				
				
			
		</tbody>
	</table>
             
	
           
	</div>
    
	</div>
            
	</div>
	</div>

</div>

</div>



    
    
    