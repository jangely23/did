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
	<form method="POST" action="../acciones/insert_proveedores.php" enctype="application/x-www-form-urlencoded" name="proveedores">
		<h1>Registro proveedores</h1>

		<div>
		<label for="nombre">Proveedor<span>*</span>:</label>
			<input name="nombre" type="text" id="nombre" maxlength="100" required="true" />
		</div>

		<div>
		<label for="canales">Número de simultaneas<span>*</span>:</label>
			<input name="canales" type="number" min="0" max="50" id="canales" required="true" />
 		</div>

		<div>
		<label for="ubicacion">Lugar de configuración<span>*</span>:</label>
			<input name="ubicacion" type="text" id="ubicacion" maxlength="80" title="domino o ip donde esta conectada la troncal sip" required="true" />
		</div>

		<div>
		<label for="datos_configuracion">Datos de registro<span>*</span>:</label>
			<textarea id="datos_configuracion" required="true" name="datos_configuracion"></textarea> 		 
		</div>
		
		<div>
		<label for="estado">Estado proveedor:</label>
			<select name="estado" id="estado">
				<option selected>activo</option>
				<option>inactivo</option>
			</select>
		</div>

		<div>
			<button class='button_guardar' id="guardar" type="submit" >Guardar</button>
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