<?php

require "connection.php";

class User
{
    private $id;
    public $user;
    public $pass;
    public function login($user, $pass)
    {
        $connection = new Connection();
        $db = $connection->openConnection();
        $stmt = $db->query("SELECT * FROM user where user='$user' and password='$pass'");
        while ($record = $stmt->fetch()) {
            $_SESSION['user'] = $record;
            echo "entro";
            return true;
        }
        return false;
    }

}
