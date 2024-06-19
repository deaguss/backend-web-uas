<?php

namespace App\Models;

use App\Models\Model;
use App\Utils\UploadImg;

class Menu extends Model
{
    public $table = 'menus';

    public function __construct()
    {
        parent::__construct($this->table);
    }

    public function getMenus()
    {
        return $this->get();
    }

    public function addMenu($data)
    {
        $name = $data['name'];
        $price = $data['price'];
        $category = $data['category'];
        $description = $data['description'];
        $currentTime = date('Y-m-d H:i:s');

        $imageFileName = UploadImg::data($data['image']);

        $menuData = [
            'name' => $name,
            'price' => $price,
            'category' => $category,
            'description' => $description,
            'image' => $imageFileName,
            'created_at' => $currentTime,
            'updated_at' => $currentTime
        ];

        return $this->post($menuData);
    }
}
