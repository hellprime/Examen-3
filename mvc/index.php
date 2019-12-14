<!DOCTYPE html>
<html lang="en" class=" -webkit-">

<head>
    <meta charset="UTF-8">
    <title>Enlatados Gertrudis</title>
    <?php include 'Views/head.php';?>
</head>

<body>
    <?php require_once "Views/header.php";?>
    <?php
if ($_GET) {
    require_once 'Controllers/' . $_GET['c'] . '.php';
} else {
    require_once "Views/home.php";
}
?>
    <?php require_once "Views/footer.php";?>
</body>

</html>