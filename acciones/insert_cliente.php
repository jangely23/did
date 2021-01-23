<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include 'conexion.php';

$nombre=$_POST['nombre'];
$telefono=$_POST['telefono'];
$distribuidor=$_POST['distribuidor'];
$email=$_POST['email'];
$estado=$_POST['estado'];

$nombre=$mysqli->real_escape_string($nombre);
$telefono=$mysqli->real_escape_string($telefono);
$distribuidor=$mysqli->real_escape_string($distribuidor);
$email=$mysqli->real_escape_string($email);
$estado=$mysqli->real_escape_string($estado);

$buscarsql="select nombre from cliente where nombre='$nombre'";
$buscar=$mysqli->query($buscarsql);
$fila=$buscar->num_rows;

if($fila == 0){
    $insertsql="insert into cliente (nombre, telefono,distribuidor,email,estado) values ('$nombre', '$telefono', '$distribuidor', '$email', '$estado')";
    $insert=$mysqli->query($insertsql);
    if(!$insert){
        echo "<script type='text/javascript'>alert('no es posible crear cliente error en consulta');window.location.href='../form/cliente_form.php';</script>";
    }else{
        echo "<script type='text/javascript'>alert('Se ha creado con exito el cliente: $nombre'); window.location.href='../vistas/vistaCliente.php';</script>";
    }
}else{
    echo "<script type='text/javascript'> alert('El cliente $nombre ya se encuentra creado');window.location.href='../vistas/vistaCliente.php';</script>";
}
$mysqli->close();
?>