<?php
require_once './models/category.php';
require_once './repositories/categoryRepository.php';
require_once './repositories/productRepository.php';

class categoryController {

  private $categoryRepository;
  private $productRepository;

  public function __construct() {
    $this->categoryRepository = new CategoryRepository(); 
    $this->productRepository = new productRepository();
  }
  
  public function index() {
    Utils::isAdmin();
    $categories = $this->categoryRepository->findAll();
    require_once './views/category/index.php';
  }

  public function show() {
    $id = isset($_GET['id']) ? $_GET['id'] : header("Location:".base_url);

    $category = $this->categoryRepository->findById($id);
    $products = $this->productRepository->findAllCategory($category->id);

    require_once './views/category/show.php';
  }

  public function add() {
    Utils::isAdmin();
    require_once './views/category/save.php';
  }

  public function save() {
    Utils::isAdmin();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $name = isset($_POST['name']) ? $_POST['name'] : false;
      $id = isset($_GET['id']) ? $_GET['id'] : false;

      if ($name) {
        if ($id) {
          $save = $this->categoryRepository->update($name, $id);
        } else {
          $save = $this->categoryRepository->save($name);
        }
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

  public function update() {
    Utils::isAdmin();

    $id = isset($_GET['id']) ? $_GET['id'] : header("Location:".base_url.'category/index');

    $edit = true;
    $category = $this->categoryRepository->findById($id);
    require_once './views/category/save.php';
  }

  public function delete() {
    Utils::isAdmin();

    $id = isset($_GET['id']) ? $_GET['id'] : false;

    if ($id) {
      $delete = $this->categoryRepository->delete($id);
      if ($delete) {
        $_SESSION['delete'] = 'complete';
      } else {
        $_SESSION['delete'] = 'failed';  
      }      
    } else {
      $_SESSION['delete'] = 'failed';
    }
    header("Location:".base_url.'category/index');
  }
}