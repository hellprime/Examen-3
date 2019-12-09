<?php
// Incluir la clase que maneja la base de datos
require 'connection.php';
class users{
  // Atributos
  private $id;
  public $username;
  public $name;
  public $email;
  public $phone;
  
  public function __construct($pusername = '', $pname = '', $pemail = '', $pphone = '', $pid = 0 ) {
    $this->id = $pid;
    $this->username = $pusername;
    $this->name = $pname;
    $this->email = $pemail;
    $this->phone = $pphone;
  }
  
  /**
   * Inserta un elemento en la base datos usando la tala users
   * @param users $users Objeto de tipo users
   * @return boolean si fue exitoso el insert
   */
  public function insert(users $users){
    try {
      // Abro la base de datos
      $conect = new Connection();
      $pdo = $conect->openConnection();
      // EJECUTAR SENTENCIA 
      $query = "INSERT INTO users (username, name, email, phone) VALUES ('".$users->username."','".$users->name."','".$users->email."','".$users->phone."') ";
      if($pdo->query($query)){
        return TRUE;
      }
    } catch (Exception $exc) {
      error_log("Error en la ".__FUNCTION__.":". $exc->getTraceAsString());
    }
    return FALSE;
  }
  
  /**
   * Selecciona uno o todos los elementos dentro de la tabla users
   * @param int $id Optional nos indica sobre cual elemento iterar 
   * @return boolean 
   */
  public function select($id = 0){
    try{
      $conect =  new Connection();
      $pdo = $conect->openConnection();
      $query = "SELECT username, name, email, phone FROM users";
      if($id){
        $query .= " WHERE id='$id'";
      }
      $result = $pdo->query($query);
      $rows = [];
      while($row = $result->fetch()){
        $rows[] = new users($row['username'], $row['name'], $row['email'], $row['phone'], $row['id']);
      }
      return $rows;
    } catch (Exception $ex) {
      // Captura de error
      print_r($ex->getTraceAsString());
      error_log("Error en la ".__FUNCTION__.":". $ex->getTraceAsString());
    }
    return FALSE;
  }
  
  /**
   * Elimina un elemento de la tabla users
   * @param type $id
   * @return boolean
   */
  public function delete($id){
    try{
      $conect =  new Connection();
      $pdo = $conect->openConnection();
      $query = "DELETE FROM users WHERE id=$id";
      //Preparar el query a ejecutar
      $result = $pdo->prepare($query);
      // Si se logro ejutar con exito
      if($result->execute()){
        return TRUE;
      }
    } catch (Exception $ex) {
      // Captura de error
      error_log("Error en la ".__FUNCTION__.":". $ex->getTraceAsString());
    }
    // En caso de llegar a esta linea significa que existio algun error
    return FALSE;
  }

  /**
   * Obtener cualquier parametro por nombre sin importar privacidad
   * @param string $name nombre del parametro
   * @return valor del parametro
   */
  public function get_element($name){
    return $this->$name;
  }
  
  /**
   * Actualiza un elemento en la base datos usando la tala users
   * @param users $users Objeto de tipo users
   * @return boolean si fue exitoso el insert
   */
  public function update(users $users){
    try {
      // Abro la base de datos
      $conect = new Connection();
      $pdo = $conect->openConnection();
      // EJECUTAR SENTENCIA 
      $query = "UPDATE users SET username = '".$users->username."', name ='".$users->name."', email = '".$users->email."', phone = '".$users->phone."' WHERE id=$users->id";
      if($pdo->query($query)){
        return TRUE;
      }
    } catch (Exception $exc) {
      error_log("Error en la ".__FUNCTION__.":". $exc->getTraceAsString());
    }
    return FALSE;
  }
}