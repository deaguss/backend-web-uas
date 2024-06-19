<?php

namespace App\Models;

use App\Models\Model;

class Order extends Model
{
    public $table = 'orders';

    public function __construct()
    {
        parent::__construct($this->table);
    }

    public function create($data)
    {
        return $this->post($data);
    }

    public function markAsReady($order_id)
    {
        $data = ['status' => 'ready'];
        return $this->put($order_id, $data);
    }
}
