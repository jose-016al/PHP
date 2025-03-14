<?php
require_once './models/product.php';

class productController {

  public function featured() {
    $product = new Product();
    $products = $product->findRandom(6);
    require_once './views/product/featured.php';
  }

  public function show() {
    $id = isset($_GET['id']) ? $_GET['id'] : false;

    if ($id) {
      $product = new Product();
      $product->setId($id);
      $pro = $product->findById();
      require_once './views/product/show.php';
    }
  }

  public function index() {
    Utils::isAdmin();
    $product = new Product();
    $products = $product->findAll();
    require_once './views/product/index.php';
  }

  public function add() {
    Utils::isAdmin();
    require_once './views/product/save.php';
  }

  public function save() {
    Utils::isAdmin();
    if (isset($_POST)) {
      $name = isset($_POST['name']) ? $_POST['name'] : false;
      $description = isset($_POST['description']) ? $_POST['description'] : false;
      $price = isset($_POST['price']) ? $_POST['price'] : false;
      $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
      $category = isset($_POST['category']) ? $_POST['category'] : false;
      $id = isset($_GET['id']) ? $_GET['id'] : false;

      if ($name && $description && $price && $stock && $category) {
        $product = new Product();
        $product->setName($name);
        $product->setDescription($description);
        $product->setPrice($price);
        $product->setStock($stock);
        $product->setCategoryId($category);
        
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
          $save = $product->update();
        } else {
          $save = $product->save();
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

    $id = isset($_GET['id']) ? $_GET['id'] : false;

    if ($id) {
      $edit = true;
      $product = new Product();
      $product->setId($id);
      $pro = $product->findById();
      require_once './views/product/save.php';
    } else {
      header("Location:".base_url.'product/index');
    }
  }

  public function delete() {
    Utils::isAdmin();

    $id = isset($_GET['id']) ? $_GET['id'] : false;

    if ($id) {
      $product = new Product();
      $product->setId($id);
      $delete = $product->delete();
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