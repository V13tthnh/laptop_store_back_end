<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'products';
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity')->withTimestamps();
    }

    public function productSpecificationDetails()
    {
        return $this->hasMany(ProductSpecificationDetail::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function firstImage()
    {
        return $this->hasOne(Image::class)->oldest();
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }

    public function getUnitPriceAttribute($value)
    {
        return $this->formatCurrencyVND($value);
    }

    function formatCurrencyVND($number) {
        return number_format($number, 0, ',', '.') . ' vnđ';
    }
}
