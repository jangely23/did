<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require 'conexion.php';

$id_cliente=$_POST['id_cliente'];
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

switch ($estado){

    case 'inactivo':
        $buscarsql="select numero from no_did where id_did in (select id_did from did_cliente where id_cliente=$id_cliente)";
        $buscar=$mysqli->query($buscarsql);
        $fila=$buscar->num_rows;
        if($fila == 0){
            actualizarCliente($mysqli, $nombre, $estado, $telefono, $distribuidor, $email, $id_cliente);
        }else{
            echo "<script type='text/javascript'>alert('Por favor eliminar ventas de este Cliente'); window.location.href='../vistas/vistaCliente.php';</script>";
        }
        break;

    case 'suspendido':
        $buscarsql="select id_did from no_did where id_did in (select id_did from did_cliente where id_cliente=$id_cliente)";
        $buscar=$mysqli->query($buscarsql);
        $fila=$buscar->num_rows;
        if($fila == 0){
            echo "<script type='text/javascript'>alert('Cliente no se puede suspender, no tiene did activos.'); window.location.href='../vistas/vistaCliente.php';</script>";
        }else{
            while($row = $buscar->fetch_assoc()){
                $id_did=$row['id_did'];
                $updateDid="update no_did set estado='suspendido' where id_did=$id_did";
                $updateD=$mysqli->query($updateDid);
                if (!$updateD){
                    echo "<script type='text/javascript'>alert('No se pudo actualizar los DID del cliente'); window.location.href='../vistas/vistaCliente.php';</script>";
                }
            }
            actualizarCliente($mysqli, $nombre, $estado, $telefono, $distribuidor, $email, $id_cliente);
        }
        break;

    case 'activo':
        $buscarsql="select id_did from no_did where id_did in (select id_did from did_cliente where id_cliente=$id_cliente)";
        $buscar=$mysqli->query($buscarsql);
        $fila=$buscar->num_rows;
        if($fila == 0){
            actualizarCliente($mysqli, $nombre, $estado, $telefono, $distribuidor, $email, $id_cliente);
        }else{
            while($row = $buscar->fetch_assoc()){
                $id_did=$row['id_did'];
                $updateDid="update no_did set estado='activo' where id_did=$id_did";
                $updateD=$mysqli->query($updateDid);
                if (!$updateD){
                    echo "<script type='text/javascript'>alert('No se pudo actualizar el DID'); window.location.href='../vistas/vistaCliente.php';</script>";
                }
            }
            actualizarCliente($mysqli, $nombre, $estado, $telefono, $distribuidor, $email, $id_cliente);
        }
        break;
}

function actualizarCliente($mysqli, $nombre, $estado, $telefono, $distribuidor, $email, $id_cliente){

        $updatesql="update cliente set nombre='$nombre', estado='$estado', telefono='$telefono', distribuidor='$distribuidor', email='$email' where id_cliente=$id_cliente";
        $update=$mysqli->query($updatesql);

        if(!$update){
            var_dump($update);
            // echo "<script type='text/javascript'>alert('no es posible acutalizar DID error en consulta'); window.location.href='../vistas/vistaCliente.php';</script>";
        }else{
            echo "<script type='text/javascript'>alert('Se ha actualizado correctamente el cliente: $nombre'); window.location.href='../vistas/vistaCliente.php';</script>";
        }

    $mysqli->close();
}

?>
