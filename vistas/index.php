<!DOCTYPE html>
<html>
<head>
    <?php
    include ("head.php");
    ?>
</head>
<body>
    <?php
    include ("menu.php");
    ?>
   
    <main>
        <section  class="resumen">
            <?php
            include ("./../acciones/consultaResumen.php");
            ?>
        </section>

        <section class="general">
            <?php
            include ("./../acciones/consultaGeneral.php");
            ?>
        </section>
    </main>

    <?php
    include ("footer.php");
    ?>
    
</body>
</html>