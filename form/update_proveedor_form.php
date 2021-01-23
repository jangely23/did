<?php
include ("../acciones/conexion.php");

$id_proveedor=$_GET['id_proveedor'];

$consultaProveedor="select * from proveedor where id_proveedor=$id_proveedor";
$proveedor= $mysqli->query($consultaProveedor);

while($row = $proveedor->fetch_assoc()){
    $id_proveedor=$row['id_proveedor'];
    $nombre=$row['nombre'];
    $canales=$row['canales'];
    $ubicacion=$row['ubicacion'];
    $configuracion=$row['datos_configuracion'];
    $estado=$row['estado'];
    $fechaCreacion=$row['fecha_creacion'];
    $fechaModificacion=$row['fecha_modificacion'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include ("../vistas/head.php");
    ?>
</head>
<body>
    <?php
    include ("../vistas/menu.php");
    ?>
<main>
    <section class="general">
        <form method="POST" action="update_proveedor.php" enctype="application/x-www-form-urlencoded" name="proveedores">
            <h1>Registro proveedores</h1>

            <div>
                <input name="id_proveedor" type="hidden" value="<?php echo $id_proveedor;?>"/>
            </div>

            <div>
                <label for="nombre">Proveedor<span>*</span>:</label>
                <input name="nombre" type="text" id="nombre" maxlength="100" required="true" value="<?php echo $nombre;?>"/>
            </div>

            <div>
                <label for="canales">Número de simultaneas<span>*</span>:</label>
                <input name="canales" type="number" min="0" max="50" id="canales" required="true" value="<?php echo $canales;?>"/>
            </div>

            <div>
                <label for="ubicacion">Lugar de configuración<span>*</span>:</label>
                <input name="ubicacion" type="text" id="ubicacion" maxlength="80" title="domino o ip donde esta conectada la troncal sip" required="true" value="<?php echo $ubicacion;?>"/>
            </div>

            <div>
                <label for="datos_configuracion">Datos de registro<span>*</span>:</label>
                <textarea id="datos_configuracion" required="true" name="datos_configuracion" ><?php echo $configuracion;?></textarea>
            </div>

            <div>
                <label for="estado">Estado proveedor:</label>
                    <select name="estado" id="estado">
                        <?php
                        if($estado == "activo"){
                            echo "<option selected> activo</option >";
                            echo "<option> inactivo</option >";
                        }else {
                            echo "<option> activo</option >";
                            echo "<option selected> inactivo</option >";
                        }
                        ?>
                    </select>
            </div>

            <div>
                <button class='button_guardar' id="guardar" type="submit">Guardar</button>
                <input class='button_regresar' type="button" onclick="history.back()" name="volver atrás" value="Regresar">
            </div>

        </form>
    </section>
</main>
    <?php
    include ("../vistas/footer.php");
    ?>
</body>

