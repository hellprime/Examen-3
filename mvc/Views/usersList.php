<?php $msg = ''; echo ($msg)?  '<div class="alert alert-success" role="alert">'.$msg.'</div>' : ''; ?>
<a href="users.php?c=agregar" class="btn btn-primary">Agregar nuevo</a>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">User Name</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
      if(count($elements)){
        foreach($elements as $element){
          echo '<tr>
                  <td>'.$element->get_element("username").'</td>
                  <td>'.$element->get_element("name").'</td>
                  <td>'.$element->get_element("email").'</td>
                  <td>'.$element->get_element("phone").'</td>
                  <td><a href=users.php?c=editar&id='.$element->get_element("id").'>Edit</a>'
              . '<a href=users.php?c=ver&id='.$element->get_element("id").'>Ver</a>'
              . '<a href=users.php?c=borrar&id='.$element->get_element("id").'>Eliminar</a></td>
                </tr>';
        }
      }else{
        echo '<h2>No hay elementos disponibles</h2>';
      }
    ?>
  </tbody>
</table>