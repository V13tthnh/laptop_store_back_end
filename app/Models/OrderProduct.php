<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    use HasFactory;

    protected $table = "order_product";

    protected $fillable = [
        'id',
        'product_id',
        'order_id',
        'quantity',
        'price'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function order(){
        $this->belongsTo(Order::class);
    }

    public function product(){
        $this->belongsTo(Product::class);
    }


    public function getPriceAttribute($value)
    {
        return $this->formatCurrencyVND($value);
    }
}
