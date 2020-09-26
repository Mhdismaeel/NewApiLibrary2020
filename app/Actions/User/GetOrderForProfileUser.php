<?php
namespace App\Actions\User;
use App\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class GetOrderForProfileUser
{
    public static function execute()
    {
        $userid=Auth::id();

        $orderuser=Order::where('userid',$userid)->get();

        return $orderuser;


    }

}
