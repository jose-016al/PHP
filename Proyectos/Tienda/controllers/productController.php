<?php
require_once './models/product.php';
require_once './repositories/productRepository.php';

class productController {

  private $productRepository;

  public function __construct() {
    $this->productRepository = new ProductRepository(); 
  }

  public function featured() {
    $products = $this->productRepository->findRandom(6);
    require_once './views/product/featured.php';
  }

  public function show() {
    $id = isset($_GET['id']) ? $_GET['id'] : header("Locaiton:".base_url);

    $product = $this->productRepository->findById($id);
    require_once './views/product/show.php';
  }

  public function index() {
    Utils::isAdmin();
    $products = $this->productRepository->findAll();
    require_once './views/product/index.php';
  }

  public function add() {
    Utils::isAdmin();
    require_once './views/product/save.php';
  }

  public function save() {
    Utils::isAdmin();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $name = isset($_POST['name']) ? $_POST['name'] : false;
      $description = isset($_POST['description']) ? $_POST['description'] : false;
      $price = isset($_POST['price']) ? $_POST['price'] : false;
      $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
      $category = isset($_POST['category']) ? $_POST['category'] : false;
      $id = isset($_GET['id']) ? $_GET['id'] : false;

      if ($name && $description && $price && is_numeric($stock) && $category) {
        $product = new Product(null, $category, $name, $description, $price, $stock);
        
        // Guardar imagen
        if (isset($_FILES['image'])) {
          $file = $_FILES['image'];
          $filename = $file['name'];
          $mimetype = $file['type'];
          
          if ($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif") {
            if (!is_dir('uploads/images')) {
              mkdir('uploads/images', 0777, true);
            }
            $product->setImage($filename);
            move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
          } 
        }
  
        if ($id) {
          $product->setId($id);
          $save = $this->productRepository->update($product);
        } else {
          $save = $this->productRepository->save($product);
        }
        if ($save) {
          $_SESSION['product'] = 'complete';
        } else {
          $_SESSION['product'] = 'failed';
        }
      } else {
        $_SESSION['product'] = 'failed';
      }
    } else {
      $_SESSION['product'] = 'failed';
    }
    header("Location:".base_url.'product/index');
  }

  public function update() {
    Utils::isAdmin();

    $id = isset($_GET['id']) ? $_GET['id'] : header("Location:".base_url.'product/index');

    $edit = true;
    $product = $this->productRepository->findById($id);
    require_once './views/product/save.php';
  }

  public function delete() {
    Utils::isAdmin();

    $id = isset($_GET['id']) ? $_GET['id'] : false;

    if ($id) {
      $delete = $this->productRepository->delete($id);
      if ($delete) {
        $_SESSION['delete'] = 'complete';
      } else {
        $_SESSION['delete'] = 'failed';  
      }      
    } else {
      $_SESSION['delete'] = 'failed';
    }
    header("Location:".base_url.'product/index');
  }
}