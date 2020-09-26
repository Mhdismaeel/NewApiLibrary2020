<?php
namespace App\Actions\Order;
use App\Models\Book;

class BookOrderAction
{
    public static function execute($id)
    {
        $orderbook=Book::findOrFail($id)->orders()->orderBy('updated_at')->get();

        return $orderbook;

    }

}
