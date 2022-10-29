<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = ['id'];
    public function images()
    {
       return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category', 'product_id', 'category_id');
    }
    public function companies()
    {
        return $this->belongsTo(ProductCompany::class, 'product_company_id');
    }

}
