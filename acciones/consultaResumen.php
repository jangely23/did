<?php

include "conexion.php";

//muestra el resumen de los proveedores
echo '<div><table><caption>Proveedores</caption>';
$estadoProveedor="select estado, count(*) estado from proveedor where estado='activo' union select estado, count(*) estado from proveedor where estado='inactivo'";
$proveedor=$mysqli->query($estadoProveedor);

while ($row = $proveedor->fetch_row()){
    $estado=$row['0'];
    $cantidad=$row['1'];

    if(empty($estado)){

    }else{
        echo "<tr><td>$estado</td><td>$cantidad</td></tr>";
    }
}
echo "</table></div>";

//muestra el resumen de los did
echo '<div><table><caption>DID</caption>';
$estadodid="select estado, count(*) estado from no_did where estado='libre' union  select estado, count(*) estado from no_did where estado='activo' union  select estado, count(*) estado from no_did where estado='suspendido'";
$did=$mysqli->query($estadodid);

while ($row = $did->fetch_row()){
    $estado=$row['0'];
    $cantidad=$row['1'];

    if(empty($estado)){

    }else{
        echo "<tr><td>$estado</td><td>$cantidad</td></tr>";
    }

}
echo "</table></div>";

//muestra el resumen de los clientes
echo '<div><table><caption>Clientes</caption>';
$estadoCliente="select estado, count(*) estado from cliente where estado='activo' union select estado, count(*) estado from cliente where estado='suspendido' union  select estado, count(*) estado from cliente where estado='inactivo'";
$cliente=$mysqli->query($estadoCliente);

while ($row = $cliente->fetch_row()){
    $estado=$row['0'];
    $cantidad=$row['1'];

    if(empty($estado)){

    }else{
        echo "<tr><td>$estado</td><td>$cantidad</td></tr>";
    }

}
echo "</table></div>";

//muestra el numero de did por proveedor
echo '<div><table><caption>DID X Proveedor</caption>';
$estadoDid="select proveedor.nombre, count(no_did.numero) from proveedor as proveedor, no_did as no_did where no_did.id_proveedor=proveedor.id_proveedor group by proveedor.nombre";
$did=$mysqli->query($estadoDid);

while ($row = $did->fetch_row()){
    $estado=$row['0'];
    $cantidad=$row['1'];

    if(empty($estado)){

    }else{
        echo "<tr><td>$estado</td><td>$cantidad</td></tr>";
    }

}
echo "</table></div>";


//muestra los did X usuario.
echo '<div><table><caption>DID X Cliente</caption>';
$estadoDidC="select cliente.nombre, count(did_cliente.id_cliente) from cliente as cliente, did_cliente as did_cliente where did_cliente.id_cliente=cliente.id_cliente group by cliente.nombre";
$didC=$mysqli->query($estadoDidC);

while ($row = $didC->fetch_row()){
    $estado=$row['0'];
    $cantidad=$row['1'];

    if(empty($estado)){

    }else{
        echo "<tr><td>$estado</td><td>$cantidad</td></tr>";
    }

}
echo "</table></div>";

$mysqli->close();
?>
