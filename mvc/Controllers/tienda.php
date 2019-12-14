<?php

require 'Models/productos.php';
require 'Models/carrito.php';

switch ($action) {

    case 'listado':
        $productos = new productos();
        $elements = $productos->select();
        require 'Views/lista.php';
        break;

    case 'agregar':
        if ($_POST['id_producto'] && $_POST['cantidad']) {
            $carrito = new carrito($_POST['id_producto'], $_POST['cantidad']);
            if ($carrito->insertupdate($carrito)) {
                $msg = "Exito al agregar el producto";
                $elements = $carrito->select();
                require 'Views/lista.php';
            } else {
                $msg = "Error al guardar el producto";
                //require 'Views/lista.php';
            }
        } else {
            //require 'Views/lista.php';
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

    default:
        $carrito = new carrito();
        $elements = $carrito->select();
        require 'Views/carritoList.php';
        break;
}

//require 'Views/lista.php';
