<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $fillable = ['name', 'slug', 'status', 'created_by'];
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    function product(){
        return $this->hasMany(Products::class);
    }
}
