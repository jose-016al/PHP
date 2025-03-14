<?php
require_once './models/user.php';

class userController {

  public function index() {
    echo "Controller User, Action index";
  }

  public function register() {
    require_once 'views/user/register.php';
  }

  public function save() {
    if (isset($_POST)) {
      $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : false;
      $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : false;
      $email = isset($_POST['email']) ? $_POST['email'] : false;
      $password = isset($_POST['password']) ? $_POST['password'] : false;

      if ($firstName && $lastName && $email && $password) {
        $user = new User();
        $user->setFirstName($firstName);
        $user->setLastName($lastName);
        $user->setEmail($email);
        $user->setPassword($password);
  
        $save = $user->save();
        if ($save) {
          $_SESSION['register'] = 'complete';
        } else {
          $_SESSION['register'] = 'failed';
        }
      } else {
        $_SESSION['register'] = 'failed';
      }
    } else {
      $_SESSION['register'] = 'failed';
    }
    header("Location:".base_url.'user/register');
  }

  public function login() {
    if (isset($_POST)) {
      $user = new User();
      $user->setEmail($_POST['email']);
      $user->setPassword($_POST['password']);
      $login = $user->login();
      if ($login && is_object($login)) {
        $_SESSION['user'] = $login;
        if ($login->role == "admin") {
          $_SESSION['admin'] = true;
        }
      } else {
        $_SESSION['error_login'] = "Identificación fallida";
      }
    }
    header("Location:".base_url);
  }

  public function logout() {
    if (isset($_SESSION['user'])) {
      unset($_SESSION['user']);
    }
    if (isset($_SESSION['admin'])) {
      unset($_SESSION['admin']);
    }
    header("Location:".base_url);
  }
}