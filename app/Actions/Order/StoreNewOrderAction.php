<?php
namespace App\Actions\Order;

use App\Models\Order;
use App\Models\Book;

use App\Models\Orderbook;
use App\Actions\Book\GetBookByIdAction;
use Illuminate\Support\Facades\Auth;

class StoreNewOrderAction
{
    public static function execute($inputs)
    {
        $bookid=[];
        foreach($inputs['Book'] as $book)
        {
            $bookid[]=GetBookByIdAction::execute($book);
        }

        if($bookid)
        {    
      $userid=Auth::id();
        $order =  Order::create([
            'userid' => $userid,
            'total' => $inputs['total'],
            'discount' => $inputs['discount'],
            'sub_total' => $inputs['total']-($inputs['total']*$inputs['discount']/100),
            'status' => $inputs['status']
        ]);

        $dataSet = [];

foreach ($inputs['Book'] as $book)
 {

    $dataSet[] = [
        'bookid'  => $book,
        'orderid'    => $order->id,
    ];

    }
    Orderbook::insert($dataSet);

        }

        return $order;


}
}
