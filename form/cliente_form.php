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
        <form method="POST" action="../acciones/insert_cliente.php" enctype="application/x-www-form-urlencoded" name="clientes">
            <h1>Registro clientes</h1>

            <div>
                <label for="nombre">Cliente<span>*</span>:</label>
                <input name="nombre" type="text" id="nombre" maxlength="100" required="true"/>
            </div>

            <div>
                <label for="telefono">Telefono de contacto<span>*</span>:</label>
                <input name="telefono" type="text" minlength="7" maxlength="14" id="telefono" required="true"/>
            </div>

            <div>
                <label for="email">Email de contacto<span>*</span>:</label>
                <input name="email" type="email" id="email" required="true"/>
            </div>

            <div>
                <label for="distribuidor">Distribuidor que realizo venta<span>*</span>:</label>
                <select name="distribuidor" id="distribuidor">
                    <option selected>fcomunicaciones</option>
                    <option>comuniquemonos</option>
                    <option>otro</option>
                </select>
            </div>

            <div>
                <label for="estado">Estado cliente:</label>
                    <select name="estado" id="estado">
                        <option selected>activo</option>
                        <option>suspendido</option>
                        <option>inactivo</option>
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