<?php
include('db.php');
include('function.php');
$query = '';
$output = array();
$columns = array('id_libro', 'Nombre', 'Autor', 'Anio', 'Tipo','Cantidad_Total','Cantidad_Disponible');

$query .= "SELECT * FROM libro ";


if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE Nombre LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR Autor LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR Anio LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR Tipo LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR Precio LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id_libro DESC ';
}
if($_POST["length"] != -1)
{
 $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{

 $sub_array = array();
  $sub_array[] = $row["id_libro"];
$sub_array[] = $row["Nombre"];
 $sub_array[] = $row["Autor"];
 $sub_array[] = $row["Anio"];
 $sub_array[] = $row["Tipo"];
  $sub_array[] = $row["Cantidad_Total"];
   $sub_array[] = $row["Cantidad_Disponible"];
 $sub_array[] = '<button type="button" name="update" id="'.$row["id_libro"].'" class="btn btn-warning btn-xs update">Editar</button>';
 $sub_array[] = '<button type="button" name="delete" id="'.$row["id_libro"].'" class="btn btn-danger btn-xs delete">Eliminar</button>';
 $data[] = $sub_array;
}
$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  $filtered_rows,
 "recordsFiltered" => get_total_all_records(),
 "data"    => $data
);
echo json_encode($output);
?>