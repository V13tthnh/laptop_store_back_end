<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $hidden = ['created_at', 'updated_at'];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
