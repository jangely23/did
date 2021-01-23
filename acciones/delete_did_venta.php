<?php
include('conexion.php');

$id_did_cliente= $_GET['id_did_cliente'];

$buscarVenta=("select * from did_cliente where id_did_cliente=$id_did_cliente");
$buscar=$mysqli->query($buscarVenta);

while($row = $buscar ->fetch_assoc() ) {
    $id_did = $row['id_did'];
    $id_cliente = $row['id_cliente'];

    $deleteVenta=("delete from did_cliente where id_did_cliente=$id_did_cliente");
    $deleteV=$mysqli->query($deleteVenta);

    if (!$deleteV) {
        echo "<script type='text/javascript'>alert('no es posible eliminar el DID error en consulta'); window.location.href='../vistas/index.php';</script>";
    } else {
        $liberaDid = ("update no_did set estado='libre' where id_did=$id_did");
        $liberaD = $mysqli->query($liberaDid);

        if (!$liberaD){
            echo "<script type='text/javascript'>alert('No se pudo liberar el DID.');</script>";
        } else {

            $buscaCliente = ("select id_did from did_cliente where id_cliente=$id_cliente and id_did!=$id_did");
            $buscaC = $mysqli->query($buscaCliente);
            $filaC = $buscaC->num_rows;

            if ($filaC == 0) {
                $inactivarCliente = ("update cliente set estado='inactivo' where id_cliente=$id_cliente");
                $inactivarC = $mysqli->query($inactivarCliente);

                if (!$inactivarC) {
                    echo "<script type='text/javascript'>alert('No se pudo inactivar cliente.');window.location.href='../vistas/index.php';</script>";
                } else {
                    echo "<script type='text/javascript'>alert('se elimina de forma exitosa la venta y se inactiva el cliente.'); window.location.href='../vistas/index.php';</script>";
                }

            } else {
                echo "<script type='text/javascript'>alert('se elimina de forma exitosa la venta.'); window.location.href='../vistas/index.php';</script>";
            }

        }
    }
}
$mysqli->close();
?>