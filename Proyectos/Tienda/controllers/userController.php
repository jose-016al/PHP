<?php
require_once './models/user.php';
require_once './repositories/userRepository.php';
require_once './repositories/cartRepository.php';

class userController {

  private $userRepository;
  private $cartRepository;

  public function __construct() {
    $this->userRepository = new UserRepository(); 
    $this->cartRepository = new CartRepository();
  }

  public function index() {
    Utils::isAdmin();
    $users = $this->userRepository->findAll();
    require_once './views/user/index.php';
  }

  public function profile() {
    $id = isset($_GET['id']) ? $_GET['id'] : header("Locaiton:".base_url);

    $user = $this->userRepository->findById($id);
    require_once './views/user/profile.php';
  }

  public function register() {
    require_once 'views/user/register.php';
  }

  public function save() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : false;
      $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : false;
      $email = isset($_POST['email']) ? $_POST['email'] : false;
      $password = isset($_POST['password']) ? $_POST['password'] : false;

      if ($firstName && $lastName && $email && $password) {
        $userId = $this->userRepository->save($firstName, $lastName, $email, $password);
  
        if ($userId) {
          $this->cartRepository->save($userId);
          $_SESSION['register'] = 'complete';
        } else {
          $_SESSION['register'] = 'failed';
        }
      } else {
        $_SESSION['register'] = 'failed';
      }
    } 
    header("Location:".base_url.'user/register');
  }

  public function login() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $email = isset($_POST['email']) ? $_POST['email'] : false;
      $password = isset($_POST['password']) ? $_POST['password'] : false;
      if ($email && $password) {
        $user = $this->userRepository->login($email, $password);
        if ($user && is_object($user)) {
          $_SESSION['user'] = $user;
          if ($user->role == "admin") {
            $_SESSION['admin'] = true;
          }
        } else {
          $_SESSION['error_login'] = "failed";  
        }
      } else {
        $_SESSION['error_login'] = "failed";
      }
    }
    header("Location:".base_url);
  }

  public function logout() {
    session_destroy();
    header("Location:".base_url);
  }

  public function delete() {
    Utils::isAdmin();

    $id = isset($_GET['id']) ? $_GET['id'] : false;

    if ($id) {
      $delete = $this->userRepository->delete($id);
      if ($delete) {
        $_SESSION['delete'] = 'complete';
      } else {
        $_SESSION['delete'] = 'failed';  
      }      
    } else {
      $_SESSION['delete'] = 'failed';
    }
    header("Location:".base_url.'user/index');
  }
}