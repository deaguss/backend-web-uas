<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Middleware\Middleware;
use App\Models\Menu;
use App\Utils\Redirect;
use App\Models\Order;
use App\Models\OrderItem;


class MenuController extends Controller
{
    public function store()
    {
        Middleware::forAuth();

        $menuData = [
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'category' => $_POST['category'],
            'description' => $_POST['description'],
            'image' => $_FILES['image']
        ];

        if ((new Menu())->addMenu($menuData)) {
            $_SESSION['success'] = [
                'title' => "Menu added successfully.",
                'message' => "The menu has been added successfully."
            ];

            return Redirect::to('/');
        } else {
            $_SESSION['error'] = [
                'title' => "Failed to add menu.",
                'message' => "An error occurred while adding the menu."
            ];

            return Redirect::to('/');
        }  
    }

    public function isReady()
    {
        Middleware::forAuth();
    
        if (!isset($_POST['order_id']) || empty($_POST['order_id'])) {
            $_SESSION['error'] = [
                'title' => "Invalid Order ID",
                'message' => "Order ID is missing or invalid."
            ];
           return Redirect::to('/kitchen');
        }
    
        $order_id = $_POST['order_id'];


        if ((new Order())->markAsReady($order_id)) {
            $_SESSION['success'] = [
                'title' => "Order updated successfully.",
                'message' => "The order has been updated successfully."
            ];

            return Redirect::to('/kitchen');
        } else {
            $_SESSION['error'] = [
                'title' => "Failed to update order.",
                'message' => "An error occurred while updating the order."
            ];
           return Redirect::to('/kitchen');
        }
    }
    

    public function addOrder()
    {
        Middleware::forAuth();

        $data = $_POST;

        $cart = json_decode($data['cart'], true);

        // die(json_encode($cart, JSON_PRETTY_PRINT));

        $orderData = [
            'status' => 'process',
            'total_amount' => $this->calculateTotalAmount($cart), 
        ];

        $orderId = (new Order())->create($orderData);

        if ($orderId) {
            $this->insertOrderItems($orderId, $cart); 

            echo '<script>window.localStorage.removeItem("cart");</script>';

            $_SESSION['success'] = [
                'title' => "Order added successfully.",
                'message' => "The order has been added successfully."
            ];

            return Redirect::to('/');
        } else {
            $_SESSION['error'] = [
                'title' => "Failed to add order.",
                'message' => "An error occurred while adding the order."
            ];

            return Redirect::to('/');
        }
        
    }
    
    private function calculateTotalAmount($cart)
    {
        $totalAmount = 0;
        foreach ($cart as $item) {
            $totalAmount += $item['productPrice'] * $item['quantity'];
        }
        return $totalAmount;
    }
    
    private function insertOrderItems($orderId, $cart)
    {
        foreach ($cart as $item) {
            $orderItemData = [
                'order_id' => $orderId,
                'menu_id' => $item['productId'],
                'quantity' => $item['quantity'],
                'price' => $item['productPrice'],
            ];
    
            (new OrderItem())->create($orderItemData);
        }
    }
    
}
