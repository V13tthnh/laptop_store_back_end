<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{

    const STATUS_PENDING = 1;
    const STATUS_CONFIRMED = 2;
    const STATUS_SHIPPING = 3;
    const STATUS_CANCELLED = 4;
    const STATUS_COMPLETED = 5;

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

    public function getStatusTextAttribute()
    {
        $statuses = [
            self::STATUS_PENDING => 'Chờ xử lý',
            self::STATUS_CONFIRMED => 'Đã xác nhận',
            self::STATUS_SHIPPING => 'Đang giao hàng',
            self::STATUS_CANCELLED => 'Đã hủy',
            self::STATUS_COMPLETED => 'Thành công',
        ];

        return $statuses[$this->status] ?? 'Không xác định';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['quantity', 'price'])->withTimestamps();
    }

    public function orderProduct()
    {
        return $this->hasMany(OrderProduct::class);
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
        return number_format($number, 0, ',', '.') . ' ₫';
    }
}
