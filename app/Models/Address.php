<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'full_name',
        'phone',
        'district',
        'ward',
        'provinces',
        'address_detail',
        'user_id',
        'is_default'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function user(){
        $this->belongsTo(User::class);
    }
}
