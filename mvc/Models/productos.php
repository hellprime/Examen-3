<?php
// Incluir la clase que maneja la base de datos
require 'connection.php';
class productos
{
    // Atributos
    private $id;
    public $nombre;
    public $detalle;
    public $precio;

    public function __construct($pnombre = '', $pdetalle = '', $pprecio = '', $pid = 0)
    {
        $this->id = $pid;
        $this->nombre = $pnombre;
        $this->detalle = $pdetalle;
        $this->precio = $pprecio;
    }

    /**
     * Inserta un elemento en la base datos usando la tabla productos
     * @param productos $productos Objeto de tipo productos
     * @return boolean si fue exitoso el insert
     */
    public function insert(productos $productos)
    {
        try {
            // Abro la base de datos
            $conect = new Connection();
            $pdo = $conect->openConnection();
            // EJECUTAR SENTENCIA
            $query = "INSERT INTO productos (nombre, detalle, precio) VALUES ('" . $productos->nombre . "','" . $productos->detalle . "','" . $productos->precio . "') ";
            if ($pdo->query($query)) {
                return true;
            }
        } catch (Exception $exc) {
            error_log("Error en la " . __FUNCTION__ . ":" . $exc->getTraceAsString());
        }
        return false;
    }

    /**
     * Selecciona uno o todos los elementos dentro de la tabla productos
     * @param int $id Optional nos indica sobre cual elemento iterar
     * @return boolean
     */
    public function select($id = 0)
    {
        try {
            $conect = new Connection();
            $pdo = $conect->openConnection();
            $query = "SELECT id, nombre, detalle, precio FROM productos";
            if ($id) {
                $query .= " WHERE id='$id'";
            }
            $result = $pdo->query($query);
            $rows = [];
            while ($row = $result->fetch()) {
                $rows[] = new productos($row['nombre'], $row['detalle'], $row['precio'], $row['id']);
            }
            return $rows;
        } catch (Exception $ex) {
            // Captura de error
            print_r($ex->getTraceAsString());
            error_log("Error en la " . __FUNCTION__ . ":" . $ex->getTraceAsString());
        }
        return false;
    }

    /**
     * Elimina un elemento de la tabla productos
     * @param type $id
     * @return boolean
     */
    public function delete($id)
    {
        try {
            $conect = new Connection();
            $pdo = $conect->openConnection();
            $query = "DELETE FROM productos WHERE id=$id";
            //Preparar el query a ejecutar
            $result = $pdo->prepare($query);
            // Si se logro ejecutar con exito
            if ($result->execute()) {
                return true;
            }
        } catch (Exception $ex) {
            // Captura de error
            error_log("Error en la " . __FUNCTION__ . ":" . $ex->getTraceAsString());
        }
        // En caso de llegar a esta linea significa que existio algun error
        return false;
    }

    /**
     * Obtener cualquier parametro por nombre sin importar privacidad
     * @param string $name nombre del parametro
     * @return valor del parametro
     */
    public function get_element($name)
    {
        return $this->$name;
    }

    /**
     * Actualiza un elemento en la base datos usando la tabla productos
     * @param productos $productos Objeto de tipo productos
     * @return boolean si fue exitoso el insert
     */
    public function update(productos $productos)
    {
        try {
            // Abro la base de datos
            $conect = new Connection();
            $pdo = $conect->openConnection();
            // EJECUTAR SENTENCIA
            $query = "UPDATE productos SET nombre = '" . $productos->nombre . "', detalle ='" . $productos->detalle . "', precio = '" . $productos->precio . "' WHERE id=$productos->id";
            if ($pdo->query($query)) {
                return true;
            }
        } catch (Exception $exc) {
            error_log("Error en la " . __FUNCTION__ . ":" . $exc->getTraceAsString());
        }
        return false;
    }
}
