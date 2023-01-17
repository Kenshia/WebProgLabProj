<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

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

    public function product()
    {
        return $this->BelongsTo(Product::class);
    }
}
