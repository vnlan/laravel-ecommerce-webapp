<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable= ['name', 'avatar_path','description'];

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_category','category_id','product_id');
    }
}
