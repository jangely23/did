<?php
include "conexion.php";
echo '<div><table>';
echo '<caption>Numero DID</caption><tr><th>Did</th><th>Proveedor</th><th>Estado</th><th>Acciones</th></tr>';
$numero="";

if(empty($numero)){
    $consultaDid = "select no_did.*, proveedor.nombre from no_did as no_did, proveedor as proveedor where no_did.id_proveedor=proveedor.id_proveedor and proveedor.estado='activo' order by no_did.estado asc";
}else{
    $consultaDid = "select no_did.*, proveedor.nombre from no_did as no_did, proveedor as proveedor where no_did.id_proveedor=proveedor.id_proveedor and no_did.numero like '%$numero%'";
}
$result=$mysqli->query($consultaDid);

while($row = $result->fetch_assoc()){
    $id_did=$row['id_did'];
    $numero=$row['numero'];
    $estado=$row['estado'];
    $id_proveedor=$row['id_proveedor'];
    $fechaCreacion=$row['fecha_creacion'];
    $fechaModificacion=$row['fecha_modificacion'];
    $proveedor=$row['nombre'];

    echo "<tr><td>$numero</td><td>$proveedor</td><td>$estado</td>";
    echo "<td><a href='../form/update_did_form.php?id_did=$id_did'><button class='button_editar' type='button'>Editar</button></a>";
    echo "<a href='../acciones/delete_did.php?id_did=$id_did'><button class='button_eliminar' type='button'>Eliminar</button></a></td></tr>";
}


echo "</table></br>";

echo <<<EOT
    <form name="crear-nuevo" action="../form/did_form.php">
            <button class='button_crear' id="crear-nuevo" type="submit" >Crear Nuevo</button>
            <input class='button_regresar' type="button" onclick="history.back()" name="volver atrás" value="Regresar" >
    </form>
    </br>
EOT;

$mysqli->close();
?>
