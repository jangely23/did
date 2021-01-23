<?php
include('conexion.php');

$id_proveedor= $_GET['id_proveedor'];

$buscarProveedor=("select * from did_cliente where id_did in (select id_did from no_did where id_proveedor=$id_proveedor)");
$buscar=$mysqli->query($buscarProveedor);
$filaP=$buscar->num_rows;

if($filaP==0){
    $deleteDid=("delete from no_did where id_proveedor=$id_proveedor");
    $deleteD=$mysqli->query($deleteDid);

    if (!$deleteD) {
        echo "<script type='text/javascript'>alert('no es posible eliminar el Proveedor error en consulta'); window.location.href='../vistas/vistaProveedor.php';</script>";
    } else {
        echo "<script type='text/javascript'>alert('se elimina de forma exitosa el Proveedor'); window.location.href='../vistas/vistaProveedor.php';</script>";
    }
}else{
    echo "<script type='text/javascript'>alert('No se puede eliminar, El proveedor tiene DID en uso'); window.location.href='../vistas/vistaProveedor.php';</script>";
}

$mysqli->close();
?>