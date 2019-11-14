<?php

include 'db.php';

class UserType extends DB {
  private $u_type;

  public function setType($user){
    $query = $this->connect()->prepare('SELECT * FROM user WHERE Correo = :user');
    $query->execute(['user' => $user]);

    foreach ($query as $currentUser){
      $this->u_type = $currentUser['user_type'];
    }
  }

  public function getUserType(){
      return $this->u_type;
  }
}

class User extends DB{
  private $nombre;
  private $username;
  private $u_type;

  public function userExist($user, $pass){
    $query = $this->connect()->prepare('SELECT * FROM user WHERE Correo = :user AND Password = :pass');
    $query->execute(['user' => $user, 'pass' => $pass]);

    if($query->rowCount()){
      return true;
    }else{
      return false;
    }
  }

  public function setUser($user){
    $query = $this->connect()->prepare('SELECT * FROM user WHERE Correo = :user');
    $query->execute(['user' => $user]);

    foreach ($query as $currentUser){
      $this->nombre = $currentUser['Nombre'];
      $this->username = $currentUser['Correo'];
    }
  }

  public function getNombre(){
    return $this->nombre;
  }

}

?>
