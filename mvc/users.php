<!DOCTYPE html>
<html lang="en" class=" -webkit-">
    <head>
        <meta charset="UTF-8">
        <title>Admin Panel -- Contenido</title>
        <?php include 'Views/head.php'; ?>
    </head>
    <body>
      <?php require_once "Views/header.php"; ?>
      <div  class="container">
        <?php
          // la variable c enviada por parametro es la accion a ejecutar en caso de no llegar va a ser listado por defecto.
          $action = (isset($_GET['c'])) ? $_GET['c'] : 'listado';
          require_once 'Controllers/users.php';
        ?>
      </div>
        
      <?php require_once "Views/footer.php"; ?>
    </body>
</html>