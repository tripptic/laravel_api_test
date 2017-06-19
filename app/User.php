<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'goods_id'];
    protected $casts = [
        'goods_id' => 'array'
    ];

}
