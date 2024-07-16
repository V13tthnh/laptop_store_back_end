<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCouponUsage extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'user_coupon_usage';
    protected $fillable = [
        'user_id',
        'coupon_id',
        'used_count',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
}
