<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "orders";
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'phone',
        'address_id',
        'discount',
        'total',
        'subtotal',
        'format',
        'status',
        'created_at'
    ];

    protected $hidden = [
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }

    public function getTotalAttribute($value)
    {
        return $this->formatCurrencyVND($value);
    }

    function formatCurrencyVND($number)
    {
        return number_format($number, 0, ',', '.') . ' vnđ';
    }
}
