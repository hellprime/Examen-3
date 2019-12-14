<?php $msg = '';
echo ($msg) ? '<div class="alert alert-success" role="alert">' . $msg . '</div>' : '';?>

<div class="col-md-12 col-sm-12 col-xs-12" id="administrarProductos">

    <h2 id=administrarProductos>
        Administrar productos
    </h2>

    <a href="productos.php?c=agregar" class="btn btn-primary">Agregar nuevo</a>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Detalle</th>
                <th scope="col">Precio</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
if (count($elements)) {
    foreach ($elements as $element) {
        echo '<tr>
                  <td>' . $element->get_element("nombre") . '</td>
                  <td>' . $element->get_element("detalle") . '</td>
                  <td>' . $element->get_element("precio") . '</td>
                  <td><a href=productos.php?c=editar&id=' . $element->get_element("id") . '>Editar </a>'
        . '<a href=productos.php?c=ver&id=' . $element->get_element("id") . '>Ver </a>'
        . '<a href=productos.php?c=borrar&id=' . $element->get_element("id") . '>Eliminar</a></td>
                </tr>';
    }
} else {
    echo '<h2>No hay productos disponibles</h2>';
}
?>
        </tbody>
    </table>
</div>