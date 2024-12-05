<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    protected $fillable = ['amount', 'user_id', 'order_token'];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($order) {
            $order->order_token = Str::random(4);
        });
    }
    function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItems::class);
    }
    
}
