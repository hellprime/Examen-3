<?php

if ($_POST) {
    require "Models/user.php";
    $user = new User();
    if (!empty($_POST['nombre']) && !empty($_POST['password'])) {
        $user->login($_POST['nombre'], $_POST['password']);
    }
}
require "Views/login.php";
