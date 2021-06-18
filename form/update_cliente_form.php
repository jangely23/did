<?php
include('../acciones/conexion.php');

$id_cliente=$_GET['id_cliente'];

$consultaCliente="select * from cliente where id_cliente=$id_cliente";
$cliente=$mysqli->query($consultaCliente);

while($row = $cliente->fetch_assoc()){
    $nombre=$row['nombre'];
    $telefono=$row['telefono'];
    $distribuidor=$row['distribuidor'];
    $email=$row['email'];
    $estado=$row['estado'];
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
        include("../vistas/menu.php");
    ?>
<main>
    <section class="general">
    <form class="form" method="POST" action="../acciones/update_cliente.php" enctype="application/x-www-form-urlencoded" name="clientes">
        <h1>Registro clientes</h1>

        <div>
            <input name="id_cliente" type="hidden" value="<?php echo $id_cliente;?>"/>
        </div>

        <div>
            <label for="nombre">Cliente<span>*</span>:</label>
            <input name="nombre" type="text" id="nombre" maxlength="100" required="true" value="<?php echo $nombre;?>"/>
        </div>

        <div>
            <label for="telefono">Telefono de contacto<span>*</span>:</label>
            <input name="telefono" type="text" minlength="7" maxlength="14" id="telefono" required="true" value="<?php echo $telefono;?>"/>
        </div>

        <div>
            <label for="email">Email de contacto<span>*</span>:</label>
            <input name="email" type="email" id="email" required="true" value="<?php echo $email;?>"/>
        </div>

        <div>
            <label for="distribuidor">Distribuidor que realizo venta<span>*</span>:</label>
            <select name="distribuidor" id="distribuidor">
                <?php
                    if($distribuidor=='fcomunicaciones'){
                        echo "<option selected>fcomunicaciones</option>";
                        echo "<option>comuniquemonos</option>";
                        echo "<option>otro</option>";
                    }elseif($distribuidor=='comuniquemonos'){
                        echo "<option>fcomunicaciones</option>";
                        echo "<option selected>comuniquemonos</option>";
                        echo "<option>otro</option>";
                    }else{
                        echo "<option>fcomunicaciones</option>";
                        echo "<option>comuniquemonos</option>";
                        echo "<option selected>otro</option>";
                    }
                ?>
            </select>
        </div>

        <div>
            <label for="estado">Estado cliente:</label>
                <select name="estado" id="estado">
                    <?php
                    if($estado=='activo'){
                        echo "<option selected>activo</option>";
                        echo "<option>suspendido</option>";
                        echo "<option>inactivo</option>";
                    }elseif($estado=='suspendido'){
                        echo "<option>activo</option>";
                        echo "<option selected>suspendido</option>";
                        echo "<option>inactivo</option>";
                    }else{
                        echo "<option>activo</option>";
                        echo "<option>suspendido</option>";
                        echo "<option selected>inactivo</option>";
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
        include("../vistas/footer.php");
    ?>

</body>
</html>