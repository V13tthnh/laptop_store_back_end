<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $hidden=['created_at', 'updated_at', 'description'];
    protected $dates = ['deleted_at', 'expires'];

    //Dữ liệu xóa mềm sẽ bị làm sạch sau 30 ngày
    public $expires = 1;
    public function parent(){
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function children(){
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function childrenRecursive(){
        return $this->children()->with('childrenRecursive');
    }

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }

    public static function recursive($categories, $parents = 0, $level = 1, &$listCategories){
        if(count($categories) > 0){
            foreach($categories as $key => $value){
                if($value->parent_id == $parents){
                    $value->level = $level;
                    $listCategories[] = $value;
                    unset($categories[$key]);

                    $parent = $value->id;
                    self::recursive($categories, $parent, $level + 1, $listCategories);
                }
            }
        }
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
