<?php

namespace App\Actions\Book;
use App\Models\Book;

class StoreNewBookAction
{
    public static function execute($inputs)
    {
        $book = Book::create([
            'title' => $inputs['title'],
            'brief' => $inputs['brief'],
            'cover_photo' => $inputs['cover_photo'],
            'price' => $inputs['price']
        ]);

        return $book;

    }

}
