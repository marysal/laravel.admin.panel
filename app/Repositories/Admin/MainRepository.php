<?php

namespace App\Repositories\Admin;

use App\Repositories\CoreRepository;
use Illuminate\Database\Eloquent\Model;

class MainRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Get count all orders
     */
    public static function getCountOrders()
    {
        $count = \DB::table('orders')
            ->where('status', '0')
            ->get()
            ->count();
        return $count;
    }

    /**
     * Get count all users
     */
    public static function getCountUsers()
    {
        $users = \DB::table('users')
            ->get()
            ->count();
        return $users;
    }

    /**
     * Get count all products
     */
    public static function getCountProducts()
    {
        $prod = \DB::table('products')
            ->get()
            ->count();
        return $prod;
    }

    /**
     * Get count all categories
     */
    public static function getCountCategories()
    {
        $cat = \DB::table('categories')
            ->get()
            ->count();
        return $cat;
    }
}
