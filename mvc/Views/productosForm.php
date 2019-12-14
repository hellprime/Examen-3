<?php $msg = '';
echo ($msg) ? '<div class="alert alert-danger" role="alert">' . $msg . '</div>' : '';?>
<form method="POST">

    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input class="form-control" type="text" name="nombre"
            <?php echo (isset($element)) ? 'value="' . $element->get_element('nombre') . '"' : '' ?>>
    </div>

    <div class="form-group">
        <label for="detalle">Detalle:</label>
        <textarea class="form-control"
            name="detalle"><?php echo (isset($element)) ? $element->get_element('detalle') : '' ?></textarea>
    </div>

    <div class="form-group">
        <label for="precio">Precio:</label>
        <textarea class="form-control"
            name="precio"><?php echo (isset($element)) ? $element->get_element('precio') : '' ?></textarea>
    </div>

    <input type="hidden" name="id" <?php echo (isset($element)) ? 'value="' . $element->get_element('id') . '"' : '' ?>>

    <input class="btn btn-primary" type="submit" value="enviar">
    <a href="productos.php" class="btn btn-primary">Volver</a>

</form>