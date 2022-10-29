<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCompany extends Model
{
    protected $table = 'product_company';
    protected $fillable= ['company_name','company_short_name', 'avatar_path','description'];
}
