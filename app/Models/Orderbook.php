<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderbook extends Model
{
    protected $fillable = ['bookid','orderid'];

    public function books()
    {
        return $this->belongsTo('App\Models\Book');
    }


}
