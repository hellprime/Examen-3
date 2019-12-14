<?php $msg = '';
echo ($msg) ? '<div class="alert alert-success" role="alert">' . $msg . '</div>' : '';?>

<div class="col-md-12 col-sm-12 col-xs-12" id="productosEnElCarrito">

    <h2 id=productosEnElCarrito>
        Productos en el carrito
    </h2>

    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
if (count($elements)) {
    foreach ($elements as $element) {
        echo '<tr>
                  <td>' . $element->get_element("nombre") . '</td>
                  <td>' . $element->get_element("precio") . '</td>
                  <td>' . $element->get_element("cantidad") . '</td>
                  <td><a href=tienda.php?c=borrar&id=' . $element->get_element("id_producto") . '>Eliminar</a></td>
                </tr>';
    }
} else {
    echo '<h3>No hay productos en el carrito</h3>';
}
?>
        </tbody>
    </table>
</div>