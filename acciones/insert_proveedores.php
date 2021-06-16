<?php  

error_reporting(E_ALL);
ini_set('display_errors', '1');

include 'conexion.php';


$nombre=$_POST['nombre'];
$canales=$_POST['canales'];
$ubicacion=$_POST['ubicacion'];
$datos_configuracion=$_POST['datos_configuracion'];
$estado=$_POST['estado'];

$nombre=$mysqli->real_escape_string($nombre);
$ubicacion=$mysqli->real_escape_string($ubicacion);
$datos_configuracion=$mysqli->real_escape_string($datos_configuracion);
$estado=$mysqli->real_escape_string($estado);

$buscarsql="select nombre from proveedor where nombre='$nombre'";
$buscar=$mysqli->query($buscarsql);
$fila=$buscar->num_rows;

if($fila == 0){
    $insertsql="insert into proveedor (nombre, canales, ubicacion, datos_configuracion, estado) values ('$nombre',$canales,'$ubicacion','$datos_configuracion','$estado')";
    $insert=$mysqli->query($insertsql);
    if(!$insert){
	    echo "<script type='text/javascript'>alert('no es posible crear proveedor error en consulta'); window.location.href='../form/proveedor_form.php';</script>";
	}else {
        echo "<script type='text/javascript'>alert('Se ha creado con exito el proveedor: $nombre');window.location.href='../form/proveedor_form.php';</script>";
    }
}else {
	echo "<script type='text/javascript'>alert('El proveedor $nombre ya se encuentra creado'); window.location.href='../form/proveedor_form.php';</script>";
}
$mysqli->close();
?>
