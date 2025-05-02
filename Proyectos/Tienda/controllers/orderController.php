<?php
require_once './models/order.php';
require_once './repositories/orderRepository.php';
require_once './repositories/orderLinesRepository.php';
require_once './repositories/cartItemRepository.php';
require_once './repositories/productRepository.php';

class orderController {

  private $orderRepository;
  private $orderLinesRepository;
  private $cartItemRepository;
  private $porductRepository;

  public function __construct() {
    $this->orderRepository = new OrderRepository(); 
    $this->orderLinesRepository = new OrderLinesRepository();
    $this->cartItemRepository = new CartItemRepository();
    $this->porductRepository = new ProductRepository();
  }

  public function index() {
    Utils::isAdmin();
    $showAllOrders  = true;
    $orders = $this->orderRepository->findAll();
    require_once './views/order/index.php';
  }

  public function my_orders() {
    $userId = Utils::isLogin()->id;
    $orders = $this->orderRepository->findAllByUser($userId);
    require_once './views/order/index.php';
  }

  public function process() {
    require_once './views/order/process.php';
  }
  
  public function add() {
    $userId = Utils::isLogin()->id;
    $cart = Utils::getCart();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $province = isset($_POST['province']) ? $_POST['province'] : false;
      $city = isset($_POST['city']) ? $_POST['city'] : false;
      $address = isset($_POST['address']) ? $_POST['address'] : false;
      $cost = $cart['total'];

      if ($province && $city && $address) {
        $orderId = $this->orderRepository->save($userId, $province, $city, $address, $cost);
        if ($orderId) {
          foreach ($cart['products'] as $product) {
            $productId = $product['product']['id'];
            $units = $product['units'];
            $save = $this->orderLinesRepository->save($orderId, $productId, $units);
            $stock = $product['product']['stock'] - $units;
            $this->porductRepository->stock($stock, $productId);
          }
          if ($save) {
            $this->cartItemRepository->deleteAll($cart['cartId']);
            $_SESSION['order'] = 'complete'; 
          }
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
    $userId = Utils::isLogin()->id;
    $order = $this->orderRepository->findByUser($userId);
    $products = $this->orderRepository->findProductsByOrder($order->id);
    require_once './views/order/confirm.php';
  }

  public function show() {
    Utils::isLogin();
    $id = isset($_GET['id']) ? $_GET['id'] : header("Location:".base_url."order/my_orders");
    
    $order = $this->orderRepository->findById($id);
    $producst = $this->orderRepository->findProductsByOrder($order->id);
    
    require_once './views/order/show.php';
  }

  public function status() {
    Utils::isAdmin();
    
    $id = isset($_POST['order_id']) ? $_POST['order_id'] : false;
    $status = isset($_POST['status']) ? $_POST['status'] : false;

    if ($id && $status) {
      $this->orderRepository->update($status, $id);
      header("Location:".base_url."order/show&id=".$id);
    } else {
      header("Location:".base_url."order/my_orders");
    }
  }
}