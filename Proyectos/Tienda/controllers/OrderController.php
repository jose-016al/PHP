<?php
require_once './models/order.php';

class orderController {

  public function index() {
    Utils::isAdmin();
    $showAllOrders  = true;
    $order = new Order();
    $orders = $order->findAll();
    require_once './views/order/index.php';
  }

  public function my_orders() {
    $user_id = isset($_SESSION['user']) ? $_SESSION['user']->id : header("Location:".base_url);

    $order = new Order();
    $order->setUserId($user_id);
    $orders = $order->findAllByUser();

    require_once './views/order/index.php';
  }

  public function process() {
    require_once './views/order/process.php';
  }
  
  public function add() {
    $user_id = isset($_SESSION['user']) ? $_SESSION['user']->id : header("Location:".base_url);
    if (isset($_POST)) {
      $province = isset($_POST['province']) ? $_POST['province'] : false;
      $city = isset($_POST['city']) ? $_POST['city'] : false;
      $address = isset($_POST['address']) ? $_POST['address'] : false;
      $cost = Utils::statsCart()['total'];

      if ($province && $city && $address) {
        $order = new Order();
        $order->setUserId($user_id);
        $order->setProvince($province);
        $order->setCity($city);
        $order->setAddress($address);
        $order->setCost($cost);
        $save = $order->save();
        $saveLines = $order->saveLines();
        if ($save && $saveLines) {
          $_SESSION['order'] = 'complete';
        } else {
          $_SESSION['order'] = 'failed';
        }
      } else {
        $_SESSION['order'] = 'failed';
      }
    } else {
      $_SESSION['order'] = 'failed';
    }
    header("Location:".base_url."order/confirm");
  }

  public function confirm() {
    $user_id = isset($_SESSION['user']) ? $_SESSION['user']->id : header("Location:".base_url);
    
    $order = new Order();
    $order->setUserId($user_id);
    $ord = $order->findByUser();

    $productsOrder = new Order();
    $products = $productsOrder->findProductsByOrder($ord->id);
    
    require_once './views/order/confirm.php';
  }

  public function show() {
    Utils::isLogin();
    $id = isset($_GET['id']) ? $_GET['id'] : header("Location:".base_url."order/my_orders");
    
    $order = new Order();
    $order->setId($id);
    $ord = $order->findById();

    $productsOrder = new Order();
    $products = $productsOrder->findProductsByOrder($ord->id);
    
    require_once './views/order/show.php';
  }

  public function status() {
    Utils::isAdmin();
    
    $id = isset($_POST['order_id']) ? $_POST['order_id'] : false;
    $status = isset($_POST['status']) ? $_POST['status'] : false;

    if ($id && $status) {
      $order = new Order();
      $order->setId($id);
      $order->setStatus($status);
      $status = $order->update();
      header("Location:".base_url."order/show&id=".$id);
    } else {
      header("Location:".base_url."order/my_orders");
    }
  }
}