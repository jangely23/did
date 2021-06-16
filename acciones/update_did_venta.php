<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include 'conexion.php';

$id_did_cliente=$_POST['id_did_cliente'];
$id_did=$_POST['id_did'];
$id_cliente=$_POST['id_cliente'];
$maxcall=$_POST['maxcall'];

$buscarsql="select maxcall from did_cliente where id_did_cliente=$id_did_cliente";
$buscar=$mysqli->query($buscarsql);
$fila=$buscar->num_rows;

    if($fila == 0){
            echo "<script type='text/javascript'>alert('No tiene asociado un cliente por favor realizar venta'); window.location.href='../vistas/index.php';</script>";
    }else {
        $updateDidCliente = "update did_cliente set maxcall=$maxcall where id_did_cliente=$id_did_cliente";
        $updateDidC = $mysqli->query($updateDidCliente);
        if (!$updateDidC) {
            echo "<script type='text/javascript'>alert('No se pudo modificar canales vendidos al cliente'); window.location.href='../vistas/index.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('Se modifico el DID a $maxcall canales.'); window.location.href='../vistas/index.php';</script>";
        }
    }
$mysqli->close();
?>