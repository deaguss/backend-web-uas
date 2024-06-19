<?php

namespace App\Models;

use App\Models\Model;

class OrderItem extends Model
{
    public $table = 'order_items';

    public function __construct()
    {
        parent::__construct($this->table);
    }

    public function getOrderItems()
    {

        $customQuery = "
        SELECT order_items.id as order_item_id, order_items.order_id, order_items.menu_id, order_items.quantity, order_items.price,
               orders.created_at as order_date,
               orders.status as order_status,
               menus.name as menu_name
        FROM order_items
        JOIN orders ON order_items.order_id = orders.id
        JOIN menus ON order_items.menu_id = menus.id
        ";

        return $this->get($customQuery);
    }

    public function create($data)
    {
        return $this->post($data);
    }
}
