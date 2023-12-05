<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Guardar'])) {
    
    $precio = $_POST['Precio'];
    $nombre = $_POST['Nombre'];
    $cantidad = $_POST['Cantidad'];
    $marca = $_POST['Marca'];

    $productos = new Productos();

   
    if (!$productos->existeProducto($nombre)) {
        $datos = array(
            'Precio' => $precio,
            'Nombre' => $nombre,
            'Cantidad' => $cantidad,
            'Marca' => $marca,

        );
        $productos->agregarProducto($datos);
    } else {
        //echo "El producto ya existe.";
    }
}
