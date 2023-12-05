<?php 

include_once 'Model/Conexion.php';

class Productos extends DB{

    function obtenerProductos(){
        $query = $this->connect()->query('SELECT * FROM productos');
        return $query;
    }

}
?>