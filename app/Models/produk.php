<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $table = "produk";
    protected $primaryKey = 'id';

    public function category()
    {
        return $this->belongsTo(category::class);
    }
}