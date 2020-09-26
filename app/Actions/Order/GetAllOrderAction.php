<?php
namespace App\Actions\Order;
use App\Models\Order;
use App\User;


class GetAllOrderAction{

    public static function execute()
    {
        $order=Order::all();
        return $order;

    }
}
