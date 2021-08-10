<?php
include('db.php');
include('functionlector.php');
$query = '';
$output = array();
$columns = array('id_lector', 'Nombre', 'Edad', 'Ci', 'Telefono','Email','Direccion');

$query .= "SELECT * FROM lector ";


if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE Nombre LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR Edad LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR Telefono LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR Ci LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR Email LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR Direccion LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id_lector DESC ';
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
  $sub_array[] = $row["id_lector"];
$sub_array[] = $row["Nombre"];
 $sub_array[] = $row["Edad"];
 $sub_array[] = $row["Ci"];
 $sub_array[] = $row["Telefono"];
  $sub_array[] = $row["Email"];
   $sub_array[] = $row["Direccion"];
 $sub_array[] = '<button type="button" name="update" id="'.$row["id_lector"].'" class="btn btn-warning btn-xs update">Editar</button>';
 $sub_array[] = '<button type="button" name="delete" id="'.$row["id_lector"].'" class="btn btn-danger btn-xs delete">Eliminar</button>';
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