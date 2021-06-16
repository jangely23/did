<?php
include "conexion.php";
echo '<div><table>';
echo '<caption>Clientes</caption><tr><th>Nombre</th><th>Distribuidor</th><th>Telefono</th><th>Email</th><th>Estado</th><th>Acciones</th></tr>';
$nombre="";

if(empty($nombre)){
     $consultaClientes = "select * from cliente order by estado asc";
}else{
    $consultaClientes = "select * from cliente where nombre like '%$nombre%' order by estado asc;";
}
$result=$mysqli->query($consultaClientes);

while($row = $result->fetch_assoc()){
    $idCliente=$row['id_cliente'];
    $nombre=$row['nombre'];
    $telefono=$row['telefono'];
    $distribuidor=$row['distribuidor'];
    $email=$row['email'];
    $estado=$row['estado'];
    $fechaCreacion=$row['fecha_creacion'];
    $fechaModificacion=$row['fecha_modificacion'];

    echo "<tr><td>$nombre</td><td>$distribuidor</td><td>$telefono</td><td>$email</td><td>$estado</td>";
    echo "<td><a href='../form/update_cliente_form.php?id_cliente=$idCliente'><button class='button_editar' type='button'>Editar</button></a>";
    echo "<a  href='../acciones/delete_cliente.php?id_cliente=$idCliente'><button class='button_eliminar' type='button'>Eliminar</button></a></td></tr>";
}


echo "</table></br>";
echo <<<EOT
    <form name="crear-nuevo" action="../form/cliente_form.php">
            <button class='button_crear' id="crear-nuevo" type="submit">Crear Nuevo</button>
            <input class='button_regresar' type="button" onclick="history.back()" name="volver atrás" value="Regresar">
    </form>
    </br>
EOT;


$mysqli->close();
?>






