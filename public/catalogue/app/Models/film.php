<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;

class film extends Model
{
    use HasFactory;

    protected $table = 'film';

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id", "id");
        //belongsToMany -> plusieurs catégories associées
    }
}
