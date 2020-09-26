<?php
namespace App\Actions\Book;
use App\Models\Book;
use App\Actions\Book\GetBookByIdAction;
use App\Actions\Helper\Fail;

class UpdateBookAction{

public static function execute($id,$inputs)
{
    $book=GetBookByIdAction::execute($id);
    if ($book!=null)
    {
    $book->update([
        'title' => $inputs['title'],
        'brief' => $inputs['brief'],
        'cover_photo' => $inputs['cover_photo'],
        'price' => $inputs['price']
    ]);

    return $book;
    }
}
}
