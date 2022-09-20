<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'price',
        'category_id',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }

    public function categories() {
        return $this->
            belongsToMany(
                Category::class,
                'category_product',
                'category_id',
                'product_id')
            ->withTimestamps()
            ->as('products_in_categories');

    }
}
