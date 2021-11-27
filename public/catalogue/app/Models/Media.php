<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\Person;

class Media extends Model
{
    use HasFactory;

    protected $table = 'media';

    protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'defined', 'ID_media', 'ID_category');
    }

    public function persons()
    {
        return $this->belongsToMany(Person::class, 'defined', 'ID_media', 'ID_person');
    }
}
