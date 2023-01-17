<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_history_id',
        'product_id',
        'qty'
    ];

    public function header()
    {
        return $this->belongsTo(PurchaseHistory::class);
    }
}
