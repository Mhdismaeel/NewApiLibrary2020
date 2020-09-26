<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable = ['title','brief','cover_photo','price'];

    public function orders()
    {
    return $this->belongsToMany('App\Models\Order', 'orderbooks', 'bookid', 'orderid');

    }



}
