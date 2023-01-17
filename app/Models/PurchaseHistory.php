<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseHistory extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(Transaction::class);
    }

    public function getTotalQty()
    {
        $sum = 0;
        foreach ($this->items as $item) {
            $sum += $item->qty;
        }
        return $sum;
    }

    public function getTotalPrice()
    {
        $sum = 0;
        foreach ($this->items as $item) {
            $sum += $item->qty * $item->product->price;
        }
        return $sum;
    }
}
