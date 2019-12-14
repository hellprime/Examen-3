<?php

require 'Models/productos.php';
switch ($action) {

    case 'listado':
        $productos = new productos();
        $elements = $productos->select();
        require 'Views/productosList.php';
        break;

    case 'agregar':
        if ($_POST['nombre'] && $_POST['detalle'] && $_POST['precio']) {
            $productos = new productos($_POST['nombre'], $_POST['detalle'], $_POST['precio']);
            if ($productos->insert($productos)) {
                $msg = "Exito al guardar el producto";
                $elements = $productos->select();
                require 'Views/productosList.php';
            } else {
                $msg = "Error al guardar el producto";
                require 'Views/productosForm.php';
            }
        } else {
            require 'Views/productosForm.php';
        }
        break;

    case 'editar':
        if ($_POST['nombre'] && $_POST['detalle'] && $_POST['precio'] && $_POST['id']) {
            $productos = new productos($_POST['nombre'], $_POST['detalle'], $_POST['precio'], $_POST['id']);
            if ($productos->update($productos)) {
                $msg = "Exito al actualizar el elemento:" . $_POST['nombre'];
                $elements = $productos->select();
                require 'Views/productosList.php';
            } else {
                $msg = "Error al guardar el valor";
            }
        } else {
            $productos = new productos();
            $element = $productos->select($_GET['id'])[0];
            require 'Views/productosForm.php';
        }
        break;

    case 'ver':
        $productos = new productos();
        if ($_GET['id']) {
            $element = $productos->select($_GET['id'])[0];
            require 'Views/productosShow.php';
        } else {
            $msg = "Error al obtener el elemento";
            $elements = $productos->select();
            require 'Views/productosList.php';
        }
        break;

    case 'borrar':
        $productos = new productos();
        if ($_GET['id']) {
            if ($productos->delete($_GET['id'])) {
                $msg = "Elemento borrado";
            } else {
                $msg = "Error al Borrar el elemento";
            }
        }
        $elements = $productos->select();
        require 'Views/productosList.php';
        break;

    default:
        $productos = new productos();
        $elements = $productos->select();
        require 'Views/productosList.php';
        break;
}
