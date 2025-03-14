<?php
require_once './models/category.php';
require_once './models/product.php';

class categoryController {
  
  public function index() {
    Utils::isAdmin();
    $category = new Category();
    $categories = $category->findAll();

    require_once './views/category/index.php';
  }

  public function show() {
    $id = isset($_GET['id']) ? $_GET['id'] : false;

    if ($id) {
      $category = new Category();
      $category->setId($id);
      $cat = $category->findById();

      $product = new Product();
      $product->setCategoryId($id);
      $products = $product->findAllCategory();
      require_once './views/category/show.php';
    } 
  }

  public function add() {
    Utils::isAdmin();
    require_once './views/category/save.php';
  }

  public function save() {
    Utils::isAdmin();
    if (isset($_POST)) {
      $name = isset($_POST['name']) ? $_POST['name'] : false;

      if ($name) {
        $category = new Category();
        $category->setName($name);
  
        $save = $category->save();
        if ($save) {
          $_SESSION['category'] = 'complete';
        } else {
          $_SESSION['category'] = 'failed';
        }
      } else {
        $_SESSION['category'] = 'failed';
      }
    } else {
      $_SESSION['category'] = 'failed';
    }
    header("Location:".base_url.'category/index');
  }
}