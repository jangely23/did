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
        <form method="post" action="../acciones/insert_did_cliente.php" enctype="application/x-www-form-urlencoded" name="did-cliente" id="formulario-did-cliente">
        <h1>Nueva venta</h1>

        <div>
            <label for="id_cliente">Cliente<span>*</span>:</label>
            <select name="id_cliente" id="id_cliente" required>
                    <option></option>
                    <?php
                    include "../acciones/conexion.php";
                    $consultaCliente = "select id_cliente, nombre from cliente where estado='activo'";
                    $result=$mysqli->query($consultaCliente);

                    while($row = $result->fetch_assoc()){
                        $id_cliente=$row['id_cliente'];
                        $nombre=$row['nombre'];
                        echo "<option value='$id_cliente'>$nombre</option>";
                    }
                    $mysqli->close();
                    ?>
            </select>
        </div>

        <div>
            <label for="id_did">Número DID<span>*</span>:</label>
                <select name="id_did" id="id_did" required>
                    <option></option>
                    <?php
                    include "../acciones/conexion.php";
                    $consultaDid = "select id_did, numero from no_did where estado='libre'";
                    $result=$mysqli->query($consultaDid);

                    while($row = $result->fetch_assoc()){
                        $id_did=$row['id_did'];
                        $numero=$row['numero'];
                        echo "<option value='$id_did'>$numero</option>";
                    }
                    $mysqli->close();
                    ?>
                </select>
        </div>

        <div>
            <label for="maxcall">Nnumero de canales<span>*</span>:</label>
            <input name="maxcall" type="number" min="0" max="30" required="true" id="maxcall"/>
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
