<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    protected $guarded= ['id'];

    public function employee ()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
