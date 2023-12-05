<?php 

class Productos extends DB{

    function obtenerProductos(){
        $query = $this->connect()->query('SELECT * FROM productos');
        return $query;
    }

    function agregarProducto($datos){
        $query = $this->connect()->prepare('INSERT INTO productos(Precio, Nombre, Cantidad, Marca) VALUES (?, ?, ?, ?)');

        
        $query->bindValue(1, $datos['Precio']);
        $query->bindValue(2, $datos['Nombre']);
        $query->bindValue(3, $datos['Cantidad']);
        $query->bindValue(4, $datos['Marca']);
    
        $query->execute();
    }
    public function existeProducto($nombre) {
        
        $query = $this->connect()->prepare('SELECT COUNT(*) as count FROM productos WHERE Nombre = :nombre');
        $query->bindParam(':nombre', $nombre);
        $query->execute();
        
        $resultado = $query->fetch(PDO::FETCH_ASSOC);
        $count = $resultado['count'];

        return $count > 0;
    }

}
?>