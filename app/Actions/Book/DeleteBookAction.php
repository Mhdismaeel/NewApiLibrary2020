<?php

namespace App\Actions\Book;

use App\Models\Book;

class DeleteBookAction
{
    public static function execute($id)
    {
        $book=Book::find($id);

        if($book !=null)
        {

            return $book->delete();
        }
    }

}
