<?php

  require 'Models/users.php';
  switch($action){
    case 'listado':
      $users = new users();
      $elements = $users->select();
      require 'Views/usersList.php';
    break;

    case 'agregar':
      if($_POST['username'] && $_POST['name'] && $_POST['email'] && $_POST['phone']){
        $users = new users($_POST['username'], $_POST['name'], $_POST['email'], $_POST['phone']);
        if($users->insert($users)){
          $msg = "Exito al guardar el elemento";
          $elements = $users->select();
          require 'Views/usersList.php';
        }else{
          $msg = "Error al guardar el valor";
          require 'Views/usersForm.php';
        }
      }else{
        require 'Views/usersForm.php';
      }
    break;

    case 'editar':
      if($_POST['username'] && $_POST['name'] && $_POST['email'] && $_POST['phone'] && $_POST['id']){
        $users = new users($_POST['username'], $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['id']);
        if($users->update($users)){
          $msg = "Exito al actualizar el elemento:".$_POST['username'];
          $elements = $users->select();
          require 'Views/usersList.php';
        }else{
          $msg = "Error al guardar el valor";
        }
      }else{
        $users = new users();
        $element = $users->select($_GET['id'])[0];
        require 'Views/usersForm.php'; 
      }
    break;

    case 'ver':
      $users = new users();
      if($_GET['id']){
        $element = $users->select($_GET['id'])[0];
        require 'Views/usersShow.php';
      }else{
        $msg = "Error al obtener el elemento";
        $elements = $users->select();
        require 'Views/usersList.php';
      }
    break;

    case 'borrar':
      $users = new users();
      if($_GET['id']){
        if($users->delete($_GET['id'])){
          $msg = "Elemento borrado";
        }else{
          $msg = "Error al Borrar el elemento";
        }
      }
      $elements = $users->select();
      require 'Views/usersList.php';
    break;

    default :
      $users = new users();
      $elements = $users->select();
      require 'Views/usersList.php';
    break;
  }
  