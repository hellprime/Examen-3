<a href="productosList.php?" class="btn">Volver</a> <a class="btn"
    href="productos.php?c=editar&id=<?php echo $element->get_element("id"); ?>">Editar</a>

<div><?php echo $element->get_element("nombre"); ?></div>
<div><?php echo $element->get_element("detalle"); ?></div>
<div><?php echo $element->get_element("precio"); ?></div>