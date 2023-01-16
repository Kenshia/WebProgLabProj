<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function randomCategory()
    {
        return ProductCategory::all()->random();
    }

    public static function randomCategoryId()
    {
        return ProductCategory::randomCategory()['id'];
    }
}
