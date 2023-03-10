<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'product_category_id',
        'detail',
        'price',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
