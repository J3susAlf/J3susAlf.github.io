<?php

include_once 'Model/Conexion.php';
class User extends DB
{
    private $nombre;
    private $username;

    public function userExists($user, $pass)
    {
        
        $query = $this->connect()->prepare('SELECT * FROM maestro WHERE username = :user AND password = :pass');
        $query->execute(['user' => $user, 'pass' => $pass]);
        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }
    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM maestro WHERE username = :user ');
        $query->execute(['user' => $user]);
        foreach($query as $currentUser){
            $this->nombre = $currentUser['nombre'];
            $this->username = $currentUser['username'];
        }
    }
    public function getNombre(){
        return $this->nombre;
    }
}
