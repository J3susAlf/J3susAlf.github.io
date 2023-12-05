<?php

include_once 'Model/Conexion.php';
class User extends DB
{
    
    private $nombre;
    private $username;

    //VALIDA SI EXISTE EL USUARIO
    public function userExists($user, $pass)
    {
                                //VALIDA LOS DATOS
        $query = $this->connect()->prepare('SELECT * FROM maestro WHERE username = :user AND password = :pass');
        $query->execute(['user' => $user, 'pass' => $pass]);

        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }
    //UTILIZA LAS VARIABLES PRIVADAS
    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM maestro WHERE username = :user ');
        $query->execute(['user' => $user]);
        //ASIGNACIÓN A LAS VARIABLES 
        foreach($query as $currentUser){
            $this->nombre = $currentUser['nombre'];
            $this->username = $currentUser['username'];
        }
    }
    //MOSTRAR EL NOMBRE DE LA VARIABLE 
    public function getNombre(){
        return $this->nombre;

    }
}
