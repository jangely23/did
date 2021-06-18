<?php
include("../acciones/conexion.php");

$id_did= $_GET['id_did'];

$consultaDid="select no_did.*, proveedor.nombre from no_did as no_did, proveedor as proveedor where no_did.id_proveedor=proveedor.id_proveedor and no_did.id_did=$id_did";
$did=$mysqli->query($consultaDid);

while($row = $did->fetch_assoc()) {
    $id_did = $row['id_did'];
    $numero = $row['numero'];
    $estado = $row['estado'];
    $id_proveedor = $row['id_proveedor'];
    $fechaCreacion = $row['fecha_creacion'];
    $fechaModificacion = $row['fecha_modificacion'];
    $proveedor = $row['nombre'];
}
?>

<!DOCTYPE html>
<html>
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
        <form class="form" method="POST" action="update_did.php" enctype="application/x-www-form-urlencoded" name="did" id="formulario-did">
            <h1>Modificar numeros DID</h1>

            <div>
                <input name="id_did" type="hidden" value="<?php echo $id_did;?>"/>
            </div>


            <div>
                <label for="numero">Número DID<span>*</span>:</label>
                <input name="numero" type="text" minlength="7" maxlength="14" required id="nombre" value="<?php echo $numero;?>"/>
            </div>

            <div>
                <label for="estado">Estado<span>*</span>:</label>
                    <select name="estado" id="estado-did" required>
                        <?php
                        if($estado == 'libre'){
                            echo "<option selected>libre</option>";
                            echo "<option>activo</option>";
                            echo "<option>suspendido</option>";
                        }elseif ($estado == 'activo'){
                            echo "<option>libre</option>";
                            echo "<option selected>activo</option>";
                            echo "<option>suspendido</option>";
                        }else{
                            echo "<option>libre</option>";
                            echo "<option>activo</option>";
                            echo "<option selected>suspendido</option>";
                        }
                        ?>
                    </select>
            </div>

            <div>
                <label for="id_proveedor">Proveedor DID<span>*</span>:</label>
                    <select name="id_proveedor" id="id_proveedor" required>
                        <?php
                        include_once "./conexion.php";
                        $consultaProveedor = "select id_proveedor, nombre from proveedor where estado='activo'";
                        $result=$mysqli->query($consultaProveedor);
                        echo "<option></option>";
                        while($row = $result->fetch_assoc()){
                            $id_proveedorSelect=$row['id_proveedor'];
                            $nombre=$row['nombre'];

                            if($id_proveedorSelect == $id_proveedor){
                            echo "<option value='$id_proveedorSelect' selected>$nombre</option>";
                            }else{
                                echo "<option value='$id_proveedorSelect'>$nombre</option>";
                            }
                        }
                        $mysqli->close();
                        ?>
                    </select>
            </div>

            <div>
                <button class='button_guardar' id="guardar" type="submit">Guardar</button>
                <input class='button_regresar' type="button" onclick="history.back()" name="volver atrás" value="Regresar" >
            </div>

        </form>
    </section>
</main>

   <?php
    include ("../vistas/footer.php");
    ?>
</body>
