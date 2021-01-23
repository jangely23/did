<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require 'conexion.php';

$id_proveedor=$_POST['id_proveedor'];
$nombre=$_POST['nombre'];
$canales=$_POST['canales'];
$ubicacion=$_POST['ubicacion'];
$datos_configuracion=$_POST['datos_configuracion'];
$estado=$_POST['estado'];

$estado=$mysqli->real_escape_string($estado);

switch ($estado){

    case 'inactivo':
        $buscarsql="select numero, estado from no_did where id_did in (select id_did from no_did where id_proveedor=$id_proveedor) and no_did.estado='activo' or no_did.estado='suspendido'";
        $buscar=$mysqli->query($buscarsql);
        $fila=$buscar->num_rows;
        if($fila == 0){
            actualizarProveedor($mysqli, $nombre, $canales, $ubicacion, $datos_configuracion, $estado, $id_proveedor);
        }else{
                echo "<script type='text/javascript'>alert('Proveedor Activo: $fila Did en uso, por favor liberarlos.'); window.location.href='../vistas/vistaProveedor.php';</script>";
        }
        break;

    case 'activo':
        $buscarsql="select id_did from no_did where id_did in (select id_did from no_did where id_proveedor=$id_proveedor)";
        $buscar=$mysqli->query($buscarsql);
        $fila=$buscar->num_rows;
        if($fila == 0){
            echo "<script type='text/javascript'>alert('No tiene asociado un numero DID por favor crearlos'); window.location.href='./did_form.php';</script>";
        }else{
            while($row = $buscar->fetch_assoc()){
                $id_did=$row['id_did'];
                $updateDid="update no_did set estado='libre' where id_proveedor=$id_proveedor";
                $updateD=$mysqli->query($updateDid);
                if (!$updateD){
                    echo "<script type='text/javascript'>alert('No se pudo actualizar el DID'); window.location.href='../vistas/vistaProveedor.php';</script>";
                }else{
                    actualizarProveedor($mysqli, $nombre, $canales, $ubicacion, $datos_configuracion, $estado, $id_proveedor);
                }
            }
        }
        break;
}

function actualizarProveedor($mysqli, $nombre, $canales, $ubicacion, $datos_configuracion, $estado, $id_proveedor){

        $updatesql="update proveedor set nombre='$nombre', canales=$canales, ubicacion='$ubicacion', datos_configuracion='$datos_configuracion', estado='$estado'  where id_proveedor=$id_proveedor";
        $update=$mysqli->query($updatesql);
        if(!$update){
            echo "<script type='text/javascript'>alert('no es posible acutalizar el proveedor'); window.location.href='../vistas/vistaProveedor.php';</script>";
        }else{
            echo "<script type='text/javascript'>alert('Se ha editado con exito el proveedor: $nombre'); window.location.href='../vistas/vistaProveedor.php';</script>";
        }
      $mysqli->close();
}

?>


