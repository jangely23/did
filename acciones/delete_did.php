<?php
include('conexion.php');

$id_did= $_GET['id_did'];

$buscarDid=("select * from did_cliente where id_did=$id_did");
$buscar=$mysqli->query($buscarDid);
$filaD=$buscar->num_rows;

if($filaD==0){
            $deleteDid=("delete from no_did where id_did=$id_did");
            $deleteD=$mysqli->query($deleteDid);

            if (!$deleteD) {
                echo "<script type='text/javascript'>alert('no es posible eliminar el DID error en consulta'); window.location.href='../vistas/vistaDid.php';</script>";
            } else {
                echo "<script type='text/javascript'>alert('se elimina de forma exitosa el DID'); window.location.href='../vistas/vistaDid.php';</script>";
            }
}else{
    echo "<script type='text/javascript'>alert('No se puede eliminar, DID en uso por un cliente'); window.location.href='../vistas/vistaDid.php';</script>";
}

$mysqli->close();
?>