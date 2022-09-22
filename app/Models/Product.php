<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductVariant;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

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

    public function getCategories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->
            belongsToMany(Category::class)
            ->withTimestamps();
    }

    public function getProductVariant() {
        return $this->hasMany(ProductVariant::class, 'product_id');
    }
}
