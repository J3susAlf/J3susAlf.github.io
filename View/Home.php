<?php
include_once 'Model/Conexion.php';
include_once 'Model/productos.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b1b47db464.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar  bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">KASAVA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                   
                </ul>
                <div class="d-flex">
                    <a class="btn btn-outline-danger" href="Controllers/Logout.php">Cerrar Sesion</a>
                </div>
            </div>
        </div>
    </nav>
    <main class="container mt-3">
        <section>
            <h1>Bienvenido <?php echo $user->getNombre(); ?></h1>
                


            <?php
            require_once 'ModalAgregar.php';
            
            $productos = new Productos();
            $resultados  = $productos->obtenerProductos();

            if ($resultados->rowCount() > 0) {
                echo '<table class="table table-striped table-hover">';
                echo '  <thead>
                            <tr>
                            <th>Precio</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Marca</th>
                            </tr>
                        </thead>';
                echo '<tbody class=table-group-divider>';

                foreach ($resultados as $resultado) {
                    echo '<tr>';
                    echo '<td>' . $resultado['Precio'] . '</td>';
                    echo '<td>' . $resultado['Nombre'] . '</td>';
                    echo '<td>' . $resultado['Cantidad'] . '</td>';
                    echo '<td>' . $resultado['Marca'] . '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                echo 'No hay productos disponibles.';
            }
            ?>
        </section>
    </main>

    <footer class="bg-dark text-light text-center p-3">
        ©<?php echo date("Y"); ?>
    </footer>
    <?php

   

    $db = new DB();
    $db->connect();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>