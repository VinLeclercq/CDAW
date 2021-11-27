<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\Person;
use App\Models\User;

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
        return $this->belongsToMany(Person::class, 'composed', 'ID_media', 'ID_person');
    }

    public function users_watched()
    {
        return $this->belongsToMany(User::class, 'watched', 'ID_media', 'ID_user');
    }

    public function users_liked()
    {
        return $this->belongsToMany(User::class, 'liked', 'ID_media', 'ID_user');
    }
}
