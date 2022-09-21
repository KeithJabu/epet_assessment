<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sap_product_code',
        'web_product_code',
        'user_id',
        'product_id'
    ];

    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class, "product_id");
    }
}
