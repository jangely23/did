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
    <form method="POST" action="../acciones/insert_did.php" enctype="application/x-www-form-urlencoded" name="did" id="formulario-did">
        <h1>Registro numeros DID</h1>

        <div>
            <label for="numero">Número DID<span>*</span>:</label>
            <input name="numero" type="text" minlength="7" maxlength="14" required id="nombre"/>
        </div>

        <div>
            <label for="estado">Estado<span>*</span>:</label>
               <select name="estado" id="estado-did" required>
                    <option selected>libre</option>
                    <option>activo</option>
                    <option>suspendido</option>
                </select>
        </div>

        <div>
            <label for="id_proveedor">Proveedor DID<span>*</span>:</label>
                 <select name="id_proveedor" id="id_proveedor" required>
                    <?php
                    include_once "../acciones/conexion.php";
                    $consultaProveedor = "select id_proveedor, nombre from proveedor where estado='activo'";
                    $result=$mysqli->query($consultaProveedor);
                    echo "<option></option>";
                    while($row = $result->fetch_assoc()){
                        $id_proveedor=$row['id_proveedor'];
                        $nombre=$row['nombre'];
                        echo "<option value='$id_proveedor'>$nombre</option>";
                    }
                    $mysqli->close();
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
        include("../vistas/footer.php");
    ?>
</body>
</html>