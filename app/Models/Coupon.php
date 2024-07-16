<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'start_date',
        'end_date',
        'usage_limit'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected function startDate(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Carbon::parse($value)->format('d/m/Y'),
            set: fn(string $value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }

    protected function endDate(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => Carbon::parse($value)->format('d/m/Y'),
            set: fn(string $value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }
}
