<?php

namespace App\Actions\Book;

use App\Models\Book;
use App\Actions\Helper\Fail;

class GetBookByIdAction
{
    public static function execute($id)
    {
        $book=BooK::findOrFail($id);
            return $book;


    }
}
