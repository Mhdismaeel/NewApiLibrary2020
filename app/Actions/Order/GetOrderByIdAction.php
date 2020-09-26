<?php
namespace App\Actions\Order;

use App\Models\Order;

  class GetOrderByIdAction
{
    public static function execute($id)
    {
        $order=Order::findOrFail($id);

        return $order;

    }

}
