<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include 'conexion.php';

$numero=$_POST['numero'];
$estado=$_POST['estado'];
$id_proveedor=$_POST['id_proveedor'];

$estado=$mysqli->real_escape_string($estado);

$buscarsql="select numero from no_did where numero='$numero'";
$buscar=$mysqli->query($buscarsql);
$fila=$buscar->num_rows;

if($fila == 0){
    $insertsql="insert into no_did (numero, estado, id_proveedor) value ($numero, '$estado', $id_proveedor)";
    $insert=$mysqli->query($insertsql);
    if(!$insert){
        echo "<script type='text/javascript'>alert('no es posible crear DID error en consulta'); window.location.href='../vistas/vistaDid.php';</script>";
    }else{
        echo "<script type='text/javascript'>alert('Se ha creado con exito el DID: $numero'); window.location.href='../vistas/vistaDid.php';</script>";
    }
}else{
    echo "<script type='text/javascript'>alert('El DID $numero ya se encuentra creado'); window.location.href='../vistas/vistaDid.php';</script>";
}
$mysqli->close();
?>


