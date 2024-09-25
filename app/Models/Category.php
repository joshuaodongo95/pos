<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table ="categories";

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'status'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function relatedProducts()
    {
        return $this->hasMany(Product::class)->latest();
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'brand_category');
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
