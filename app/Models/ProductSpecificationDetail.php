<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecificationDetail extends Model
{
    use HasFactory;
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['product_id', 'product_specification_id', 'value'];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function productSpecification(){
        return $this->belongsTo(ProductSpecification::class);
    }
}
