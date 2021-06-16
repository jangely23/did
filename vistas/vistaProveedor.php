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
        <section class="general">
            <?php
            include ("./../acciones/consultaProveedor.php");
            ?>
        </section>
    </main>

    <?php
    include("footer.php");
    ?>

</body>
</html>