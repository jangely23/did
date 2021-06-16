<?php
include "conexion.php";

//muestra detalle de venta.
echo '<div><table><caption>Ventas realizadas</caption><tr><th>Cliente</th><th>Numero</th><th>Canales</th><th>Distribuidor</th><th>Estado DID</th><th>Proveedor DID</th><th>Acciones</th></tr>';
$estadoVenta="select t1.id_did_cliente, t1.maxcall, t2.nombre, t2.distribuidor, t3.numero, t3.estado, t4.nombre from did_cliente as t1 inner join cliente as t2 on t1.id_cliente=t2.id_cliente inner join no_did as t3 on t1.id_did=t3.id_did inner join proveedor as t4 on t3.id_proveedor=t4.id_proveedor order by t2.nombre asc";
$venta=$mysqli->query($estadoVenta);

while ($row = $venta->fetch_row()){
    $id_did_cliente=$row[0];
    $maxcall=$row[1];
    $cliente=$row[2];
    $distribuidor=$row[3];
    $numero=$row[4];
    $estado=$row[5];
    $proveedor=$row[6];

    if(empty($id_did_cliente)){

    }else{
        echo "<tr><td>$cliente</td><td>$numero</td><td>$maxcall</td><td>$distribuidor</td><td>$estado</td><td>$proveedor</td>";
        echo "<td><a href='../form/update_did_venta_form.php?id_did_cliente=$id_did_cliente'><button class='button_editar' type='button' >Editar</button></a>";
        echo "<a href='../acciones/delete_did_venta.php?id_did_cliente=$id_did_cliente'><button class='button_eliminar' type='button' >Eliminar</button></a></td></tr>";
    }

}
echo "</table></br>";

//permite realizar una venta
echo <<<EOT
            <form name="nueva_venta" action="../form/did_cliente_form.php">
            <button class='button_crear' id="nueva_venta" type="submit" >Nueva venta</button>
            <input class='button_regresar' type="button" onclick="history.back()" name="volver atrás" value="Regresar" >
        </form>
        </br>
    </div>
EOT;


$mysqli->close();
?>


