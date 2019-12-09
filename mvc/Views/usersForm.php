<?php $msg = ''; echo ($msg)?  '<div class="alert alert-danger" role="alert">'.$msg.'</div>' : ''; ?>
<form method="POST">

  <div class="form-group">
    <label for="titulo">User name:</label>
    <input class="form-control" type="text" name="username" <?php echo (isset($element))?  'value="'.$element->get_element('username').'"' : '' ?>>
  </div>

  <div class="form-group">
    <label for="contenido">Name:</label>
    <textarea class="form-control" name="name"><?php echo (isset($element))?  $element->get_element('name') : '' ?></textarea>
  </div>

  <div class="form-group">
    <label for="contenido">Email:</label>
    <textarea class="form-control" name="email"><?php echo (isset($element))?  $element->get_element('email') : '' ?></textarea>
  </div>

  <div class="form-group">
    <label for="contenido">Phone number:</label>
    <textarea class="form-control" name="phone"><?php echo (isset($element))?  $element->get_element('phone') : '' ?></textarea>
  </div>

  <input type="hidden" name="id" <?php echo (isset($element))?  'value="'.$element->get_element('id').'"' : '' ?>>

  <input class="btn btn-primary" type="submit" value="enviar">
  <a href="users.php" class="btn btn-primary">Volver</a>

</form>