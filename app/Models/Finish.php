<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Finish extends Model
{
    use HasFactory;

    protected $table = 'finishes';

    protected $fillable = [
        'name',
        'img',
        'quantity',
        'sub_price',
        'waktu',
        'user_id',
    ];

    public function getCreatedAtAttribute() {
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('l, d F Y');
    }

    public function getWaktuAttribute() {
        return Carbon::parse($this->attributes['waktu'])
            ->translatedFormat('H:i:s');
    }
}
