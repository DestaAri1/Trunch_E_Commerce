<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $fillable = [
        'name',
        'img',
        'price',
        'user_id',
    ];
}
