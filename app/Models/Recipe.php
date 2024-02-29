<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class)
            ->withPivot('quantity', 'unit_id')
            ->using(RecipeIngredient::class);
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['tag'] ?? false) {
            $query->whereHas('tags', function ($subQuery) use ($filters) {
                $subQuery->where('tags.id', request('tag'));
            });
        }

        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere($this->tags()->getPivotColumns('name'), 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
        }
    }
}
