<?php
namespace App\Actions\Order;
use App\Models\Orderbook;
use App\Actions\Order\GetOrderByIdAction;

class GetOrderDeatilsAction
{
    public static function execute($orderid)
    {
        $order=GetOrderByIdAction::execute($orderid);

        if($order)
        {
            $books=Orderbook::join('books','books.id','=','orderbooks.bookid')->
        select('orderbooks.bookid','books.title','books.price')->
        where('orderbooks.orderid',$orderid)->get();
        return $books;

        }


    }
}
