<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Menu;
use App\Models\OrderItem;

class HomeController extends Controller
{
    public function index()
    {
        $menu = (new Menu())->getMenus();

        $this->view('index', ['menu' => $menu]);
    }

    public function kitchen() {
        $orderItem = (new OrderItem())->getOrderItems();
        $orders = [];
    
        foreach ($orderItem as $item) {
            $orders[$item->order_id][] = $item;
        }

        // var_dump($orders);
    
        $this->view('kitchen', ['orders' => $orders]);
    }
    
}
