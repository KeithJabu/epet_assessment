<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'user_id',
    ];

    /*public function image() {
        return $this->hasOne(Image::class);
    } */

    public function getProducts() {
        return $this->belongsToMany(Product::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
