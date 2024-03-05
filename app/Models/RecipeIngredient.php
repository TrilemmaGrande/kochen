<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecipeIngredient extends Pivot
{
    public $incrementing = true;
    public $timestamps = true;

    use HasFactory;

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

}
