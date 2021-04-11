<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'address', 'size', 'toppings', 'instructions', 'status_id'];

    public function customer()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function status()
    {
        return $this->belongsTo('App\status');
    }
}
