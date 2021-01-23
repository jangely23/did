<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include 'conexion.php';

$id_did=$_POST['id_did'];
$id_cliente=$_POST['id_cliente'];
$maxcall=$_POST['maxcall'];

$buscarsql="select cliente.nombre, no_did.numero, did_cliente.maxcall from cliente as cliente, no_did as no_did, did_cliente as did_cliente where did_cliente.id_did='$id_did'";
$buscar=$mysqli->query($buscarsql);
$fila=$buscar->num_rows;

if($fila == 0){
    $insertsql="insert into did_cliente (id_cliente, id_did, maxcall) values ($id_cliente, $id_did, $maxcall)";
    $insert=$mysqli->query($insertsql);

    $updatesql="update no_did set estado='activo' where id_did=$id_did";
    $update=$mysqli->query($updatesql);

    if(!$insert){
        echo "<script type='text/javascript'>alert('no es posible crear venta error en consulta');window.location.href='../form/did_cliente_form.php';</script>";
    }elseif (!$update) {
        echo "<script type='text/javascript'>alert('no se actualiza DID error en consulta'); window.location.href='../form/did_cliente_form.php';</script>";
    }

    echo "<script type='text/javascript'>alert('¡Venta registrada con exito!'); window.location.href='../vistas/index.php';</script>";

}else{
    while ($row = $buscar->fetch_assoc()) {
        $cliente = $row['nombre'];
        $numero = $row['numero'];
        $maxcall = $row['maxcall'];

        echo "<script type='text/javascript'>alert('Número $numero ya esta asignado a el cliente $cliente');window.location.href='../vistas/index.php';</script>";
    }
}
$mysqli->close();
?>