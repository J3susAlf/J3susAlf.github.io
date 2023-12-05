<?php
include_once 'Controllers/user.php';
include_once 'Controllers/session.php';

//GENERAR UN OBJETO Y USUARIO
$userSession = new Session();
$user = new User();

if (isset($_SESSION['user'])) {

    //Cuando cerramos las ventanas y se queda la sesion activada 
    $user->setUser($userSession->getCurrentUser());
    include_once 'View/Home.php';
    
    //VALIDA LOS DATOS DEL FROM 
} else if (isset($_POST['username']) && isset($_POST['password'])) {

    //MAPEO DE LOS DATOS DEL FORM
    $userForn = $_POST['username'];
    $passForm = $_POST['password'];


    if ($user->userExists($userForn, $passForm)) {

        //GUARDA LOS DATOS DEL USUARIO Y SESION
        $userSession->setCurrentUser($userForn);
        $user->setUser($userForn);
        include_once 'View/Home.php';

    } else {

        $errorLogin = "Usuario y Contraseña Incorrecto";
        include_once 'View/Login.php';
    }
} else {
    include_once 'View/Login.php';
}
