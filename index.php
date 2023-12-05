<?php
include_once 'Controllers/user.php';
include_once 'Controllers/session.php';

$userSession = new Session();
$user = new User();

if (isset($_SESSION['user'])) {

    //Cuando cerramos las ventanas y se queda la sesion activada 
    $user->setUser($userSession->getCurrentUser());
    include_once 'View/Home.php';
    
} else if (isset($_POST['username']) && isset($_POST['password'])) {

    $userForn = $_POST['username'];
    $passForm = $_POST['password'];

    if ($user->userExists($userForn, $passForm)) {

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
