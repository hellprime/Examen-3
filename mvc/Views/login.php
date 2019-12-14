<!DOCTYPE html>
<html lang="en" class=" -webkit-">

<head>
    <meta charset="UTF-8">
    <title>CodePen - #Maincode Hackdays</title>
    <?php include 'Views/head.php';?>
</head>

<body>
    <?php require_once "Views/header.php";?>
    <?php if (isset($_SESSION['user'])) {?>
    <?php require_once "Views/panel.php";?>
    <?php } else {?>
    <form action="" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre usuario:</label>
            <input class="form-control" type="text" name="nombre" placeholder="Nombre de usuario" required="true">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" placeholder="Password">
        </div>
        <input class="btn btn-primary" type="submit" value="enviar">
    </form>
    <?php }?>
    <?php require_once "Views/footer.php";?>
</body>

</html>