<?php

namespace App\Actions\Book;

use App\Models\Book;


Class GetAllBookAction
{

    public static function execute()
    {
        $book=Book::all();
        return $book;
    }


}
