<?php $msg = '';
echo ($msg) ? '<div class="alert alert-success" role="alert">' . $msg . '</div>' : '';

$cantidad = isset($_GET['cantidad']) ? $_GET['cantidad'] : null;

if ($action == 'added') {
    echo "<div class='alert alert-info'>";
    echo "<strong>{$name}</strong> ¡Agregado al carrito!";
    echo "</div>";
} else if ($action == 'failed') {
    echo "<div class='alert alert-info'>";
    echo "<strong>{$name}</strong> No se pudo agregar al carrito.";
    echo "</div>";
}

?>

<div class="col-md-12 col-sm-12 col-xs-12" id="listaDeProductos">

    <h2 id=listaDeProductos>
        Lista de productos
    </h2>

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
        echo '<tr>';
        echo '<td>' . $element->get_element("nombre") . '</td>';
        echo '<td>' . $element->get_element("detalle") . '</td>';
        echo '<td>' . $element->get_element("precio") . '</td>';

        if (isset($cantidad)) {
            echo '<td>
                    <input type="text" name="cantidad" value=' . $cantidad . ' disabled class="form-control" />
                    </td>
                    <td>
                    <button class="btn btn-success" disabled>Agregado!</button>
                    </td>';
        } else {
            echo '<td>
                    <input type="number" name="cantidad" value="1" class="form-control" />
                    </td>
                    <td>
                    <a href="tienda.php?c=agregar&id_producto=' . $element->get_element("id") . '&cantidad=1" class="btn btn-primary add-to-cart">Añadir al carrito</a>
                    </td>';
        }
        echo '</tr>';
    }
} else {
    echo '<h2>No hay productos disponibles</h2>';
}
?>
        </tbody>
    </table>
</div>