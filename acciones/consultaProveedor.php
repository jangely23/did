<?php
include "conexion.php";

echo '<div><table>';
echo '<caption>Proveedores</caption><tr><th>Nombre</th><th>Maxcall</th><th>Ubicación</th><th>Estado</th><th>Acciones</th></tr>';
$proveedor="";

if(empty($proveedor)){
    $consultaProveedor= "select * from proveedor order by estado asc";
}else{
    $consultaProveedor= "select * from proveedor where nombre like '%$proveedor%' order by estado asc;";
}
$result=$mysqli->query($consultaProveedor);

while($row = $result->fetch_assoc()){
    $idProveedor=$row['id_proveedor'];
    $nombre=$row['nombre'];
    $canales=$row['canales'];
    $ubicacion=$row['ubicacion'];
    $configuracion=$row['datos_configuracion'];
    $estado=$row['estado'];
    $fechaCreacion=$row['fecha_creacion'];
    $fechaModificacion=$row['fecha_modificacion'];

    echo "<tr><td>$nombre</td><td>$canales</td><td>$ubicacion</td><td>$estado</td>";
    echo "<td><a href='../form/update_proveedor_form.php?id_proveedor=$idProveedor'><button class='button_editar' type='button' >Editar</button></a>";
    echo "<a href='../acciones/delete_proveedor.php?id_proveedor=$idProveedor'><button class='button_eliminar' type='button' >Eliminar</button></a></td></tr>";
}


echo "</table></br>";
echo <<<EOT
    <form name="crear-nuevo" action="../form/proveedor_form.php" >
            <button class='button_crear' id="crear-nuevo" type="submit" >Crear Nuevo</button>
            <input class='button_regresar' type="button" onclick="history.back()" name="volver atrás" value="Regresar" >
    </form>
    </br>
EOT;


$mysqli->close();
?>

