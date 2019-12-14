<!DOCTYPE html>
<html lang="en" class=" -webkit-">

<head>
    <meta charset="UTF-8">
    <title>Carrito de compras</title>
    <?php include __DIR__ . '/Views/head.php';?>
</head>

<body>
    <?php require_once __DIR__ . "/Views/header.php";?>
    <div class="container">
        <?php
// la variable c enviada por parametro es la accion a ejecutar en caso de no llegar va a ser listado por defecto.
$action = (isset($_GET['c'])) ? $_GET['c'] : 'listado';
require_once __DIR__ . '/Controllers/carrito.php';
?>
    </div>

    <?php require_once __DIR__ . "/Views/footer.php";?>
</body>

</html>