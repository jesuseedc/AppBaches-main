<?php
include_once 'include/user.php';
include_once 'include/user_session.php';

$userSession = new UserSession();
$user = new User();
$u_type = new UserType();

if(isset($_SESSION['user'])){
  $user->setUser($userSession->getCurrentUser());
  include_once 'views/panel.php';
}else if(isset($_POST['username']) && isset($_POST['password'])){
  $userForm = $_POST['username'];
  $passForm = $_POST['password'];

  $user = new User();

  $u_type->setType($userForm);
  if($user->userExist($userForm, $passForm) and $u_type->getUserType() == 'adm'){
    $user->setUser($userForm);
    $userSession->setCurrentUser($userForm);
    include_once 'views/panel.php';
  }else if($user->userExist($userForm, $passForm) and $u_type->getUserType() != 'adm'){
    $errorLogin = "Usted no es administrador.";
    include_once 'views/login.php';
  }else{
    $errorLogin = "Usuario y/o contraseña incorrectos.";
    include_once 'views/login.php';
  }
}else{
    include_once 'views/login.php';
}
?>
