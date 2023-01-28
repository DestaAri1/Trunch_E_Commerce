<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliver extends Model
{
    use HasFactory;

    protected $table = 'delivers';

    protected $fillable = [
        'name',
        'img',
        'quantity',
        'price',
        'sub_price',
        'status',
        'user_id',
    ];
}
