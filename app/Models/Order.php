<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $fillable = ['userid','sub_total','total','discount','status'];

    public function books()
    {
        return $this->belongsToMany('App\Models\Book')->using('App\Models\orderbooks');
        }

        public function users()
        {
            return $this->belongsTo('App\User');
        }

}
