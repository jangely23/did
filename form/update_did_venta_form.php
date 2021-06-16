<?php
include ("../acciones/conexion.php");

$id_did_cliente= $_GET['id_did_cliente'];

$consultaDidCliente="select maxcall,id_cliente, id_did from did_cliente where id_did_cliente=$id_did_cliente";
$didCliente=$mysqli->query($consultaDidCliente);

while($row = $didCliente->fetch_assoc()) {
    $maxcall = $row['maxcall'];
    $id_clienteDid = $row['id_cliente'];
    $id_didDid = $row['id_did'];
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
        <form method="post" action="../acciones/update_did_venta.php" enctype="application/x-www-form-urlencoded" name="did-cliente" id="formulario-did-cliente">
            <h1>Modificar venta</h1>

            <div>
                <input name="id_did_cliente" type="hidden" value="<?php echo $id_did_cliente;?>"/>
            </div>

            <div>
                <label for="id_cliente">Cliente<span>*</span>:</label>
                    <select name="id_cliente" id="id_cliente" required>
                        <option></option>
                        <?php
                        $consultaCliente = "select id_cliente, nombre from cliente where id_cliente=$id_clienteDid";
                        $result=$mysqli->query($consultaCliente);

                        while($row = $result->fetch_assoc()){
                            $id_cliente=$row['id_cliente'];
                            $nombre=$row['nombre'];

                                echo "<option value='$id_cliente' selected>$nombre</option>";
                         }
                        ?>
                    </select>
            </div>

            <div>
                <label for="id_did">Número DID<span>*</span>:</label>
                    <select name="id_did" id="id_did" required>
                        <option></option>
                        <?php
                        $consultaDid = "select id_did, numero from no_did where id_did='$id_didDid'";
                        $result=$mysqli->query($consultaDid);

                        while($row = $result->fetch_assoc()){
                            $id_did=$row['id_did'];
                            $numero=$row['numero'];

                                echo "<option value='$id_did' selected>$numero</option>";
                        }
                        ?>
                    </select>
            </div>

            <div>
                <label for="maxcall">Nnumero de canales<span>*</span>:</label>
                <input name="maxcall" type="number" min="0" max="30" required="true" id="maxcall" value="<?php echo $maxcall;?>"/>
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
s</body>
</html>
