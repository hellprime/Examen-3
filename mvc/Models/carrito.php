<?php
// Incluir la clase que maneja la base de datos
//require 'connection.php';
class carrito
{
    // Atributos
    public $id_producto;
    public $nombre;
    public $precio;
    public $cantidad;
    public $id_usuario;

    public function __construct($pid_producto = '', $pcantidad = '', $pid_usuario = '', $pnombre = '', $pprecio = '')
    {
        $this->id_producto = $pid_producto;
        $this->nombre = $pnombre;
        $this->precio = $pprecio;
        $this->cantidad = $pcantidad;
        $this->id_usuario = $pid_usuario;
    }

    /**
     * Inserta un elemento en la base datos usando la tabla carrito
     * @param carrito $carrito Objeto de tipo carrito
     * @return boolean si fue exitoso el insert
     */
    public function insertupdate(carrito $carrito)
    {
        try {
            // Abro la base de datos
            $conect = new Connection();
            $pdo = $conect->openConnection();
            // EJECUTAR SENTENCIA
            $query = "REPLACE INTO carrito (id_producto, cantidad, id_usuario) VALUES ('" . $carrito->id_producto . "','" . $carrito->cantidad . "','1') ";
            if ($pdo->query($query)) {
                return true;
            }
        } catch (Exception $exc) {
            error_log("Error en la " . __FUNCTION__ . ":" . $exc->getTraceAsString());
        }
        return false;
    }

    public function select($id = 0)
    {
        try {
            $conect = new Connection();
            $pdo = $conect->openConnection();
            $query = "select p.nombre, p.precio, c.cantidad, c.id_producto from carrito as c INNER JOIN productos p on c.id_producto = p.id where c.id_usuario = 1";
            $result = $pdo->query($query);
            $rows = [];
            while ($row = $result->fetch()) {
                $rows[] = new carrito($row['nombre'], $row['precio'], $row['cantidad'], $row['id_producto']);
            }
            return $rows;
        } catch (Exception $ex) {
            // Captura de error
            print_r($ex->getTraceAsString());
            error_log("Error en la " . __FUNCTION__ . ":" . $ex->getTraceAsString());
        }
        return false;
    }

    public function selectProductos($id = 0)
    {
        try {
            $conect = new Connection();
            $pdo = $conect->openConnection();
            $query = "SELECT id, nombre, detalle, precio FROM productos";
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
     * Selecciona uno o todos los elementos dentro de la tabla carrito
     * @param int $id Optional nos indica sobre cual elemento iterar
     * @return boolean
     */
    public function contar($id = 0)
    {
        try {
            $conect = new Connection();
            $pdo = $conect->openConnection();
            $query = "SELECT count(id_producto) FROM carrito WHERE id_usuario='1'";
            $result = $pdo->query($query);
            $rows = [];
            $row = $result->fetch();
            $contador = $row[0];
            return $contador;

        } catch (Exception $ex) {
            // Captura de error
            print_r($ex->getTraceAsString());
            error_log("Error en la " . __FUNCTION__ . ":" . $ex->getTraceAsString());
        }
        return false;
    }

    /**
     * Elimina un elemento de la tabla carrito
     * @param type $id
     * @return boolean
     */
    public function delete($id_producto)
    {
        try {
            $conect = new Connection();
            $pdo = $conect->openConnection();
            $query = "DELETE FROM carrito WHERE id_producto=$id_producto";
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
     * Obtener cualquier parametro por id_producto sin importar privacidad
     * @param string $name id_producto del parametro
     * @return valor del parametro
     */
    public function get_element($name)
    {
        return $this->$name;
    }

    /**
     * Actualiza un elemento en la base datos usando la tabla carrito
     * @param carrito $carrito Objeto de tipo carrito
     * @return boolean si fue exitoso el insert
     */
}
