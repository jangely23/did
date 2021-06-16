<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require 'conexion.php';

$id_did=$_POST['id_did'];
$numero=$_POST['numero'];
$estado=$_POST['estado'];
$id_proveedor=$_POST['id_proveedor'];

$estado=$mysqli->real_escape_string($estado);

switch ($estado){

    case 'libre':
        $buscarsql="select nombre from cliente where id_cliente in (select id_cliente from did_cliente where id_did=$id_did)";
        $buscar=$mysqli->query($buscarsql);
        $fila=$buscar->num_rows;
        if($fila == 0){
            actualizarDid($mysqli, $numero, $estado, $id_proveedor, $id_did);
        }else{
            while($row = $buscar->fetch_assoc()){
                $nombre=$row['nombre'];
                echo "<script type='text/javascript'>alert('DID Activo en uso cliente $nombre'); window.location.href='../vistas/vistaDid.php';</script>";
            }
        }
        break;

    case 'suspendido':
        $buscarsql="select id_cliente from cliente where id_cliente in (select id_cliente from did_cliente where id_did=$id_did)";
        $buscar=$mysqli->query($buscarsql);
        $fila=$buscar->num_rows;
        if($fila == 0){
            actualizarDid($mysqli, $numero, $estado, $id_proveedor, $id_did);
        }else{
            while($row = $buscar->fetch_assoc()){
                $id_cliente=$row['id_cliente'];
                $updateCliente="update cliente set estado='$estado' where id_cliente=$id_cliente";
                $updateC=$mysqli->query($updateCliente);
                if (!$updateC){
                    echo "<script type='text/javascript'>alert('No se pudo actualizar el cliente'); window.location.href='../vistas/vistaDid.php';</script>";
                }else{
                    actualizarDid($mysqli,$numero, $estado, $id_proveedor, $id_did);
                }
            }
        }
        break;

    case 'activo':
        $buscarsql="select id_cliente from cliente where id_cliente in (select id_cliente from did_cliente where id_did=$id_did)";
        $buscar=$mysqli->query($buscarsql);
        $fila=$buscar->num_rows;
        if($fila == 0){
            echo "<script type='text/javascript'>alert('No tiene asociado un cliente por favor realizar venta'); window.location.href='./did_cliente_form.php';</script>";
        }else{
            while($row = $buscar->fetch_assoc()){
                $id_cliente=$row['id_cliente'];
                $updateCliente="update cliente set estado='$estado' where id_cliente=$id_cliente";
                $updateC=$mysqli->query($updateCliente);
                if (!$updateC){
                    echo "<script type='text/javascript'>alert('No se pudo actualizar el cliente'); window.location.href='../vistas/vistaDid.php';</script>";
                }else{
                    actualizarDid($mysqli,$numero, $estado, $id_proveedor, $id_did);
                }
            }
        }
        break;
}

function actualizarDid($mysqli, $numero, $estado, $id_proveedor, $id_did){

    $buscarProveedorsql="select nombre from proveedor where id_proveedor=$id_proveedor and estado='inactivo'";
    $buscarP=$mysqli->query($buscarProveedorsql);
    $filaP=$buscarP->num_rows;

    if($filaP == 0){
    $updatesql="update no_did set numero='$numero', estado='$estado', id_proveedor=$id_proveedor where id_did=$id_did";
    $update=$mysqli->query($updatesql);
     if(!$update){
         var_dump($update);
              // echo "<script type='text/javascript'>alert('no es posible acutalizar DID error en consulta'); window.location.href='../vistas/vistaDid.php';</script>";
        }else{
            echo "<script type='text/javascript'>alert('Se ha editado con exito el DID: $numero'); window.location.href='../vistas/vistaDid.php';</script>";
        }
}else{
    echo "<script type='text/javascript'>alert('Proveedor se encuentra inactivo'); window.location.href='../vistas/vistaDid.php';</script>";
}
    $mysqli->close();
}

?>


