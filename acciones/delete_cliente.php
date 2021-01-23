<?php
include('conexion.php');

$id_cliente= $_GET['id_cliente'];

$buscarCliente=("select * from did_cliente where id_cliente=$id_cliente");
$buscar=$mysqli->query($buscarCliente);
$filaC=$buscar->num_rows;

if($filaC==0){
    $deleteCliente=("delete from cliente where id_cliente=$id_cliente");
    $deleteC=$mysqli->query($deleteCliente);

    if (!$deleteC) {
        echo "<script type='text/javascript'>alert('no es posible eliminar el Cliente error en consulta'); window.location.href='../vistas/vistaCliente.php';</script>";
    } else {
        echo "<script type='text/javascript'>alert('se elimina de forma exitosa el Cliente'); window.location.href='../vistas/vistaCliente.php';</script>";
    }
}else{
    echo "<script type='text/javascript'>alert('No se puede eliminar, El cliente tiene DID en uso'); window.location.href='../vistas/vistaCliente.php';</script>";
}

$mysqli->close();
?>