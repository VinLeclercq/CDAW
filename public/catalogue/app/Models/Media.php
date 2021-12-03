<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Laravel\Scout\Searchable;

use App\Models\Category;
use App\Models\Person;
use App\Models\User;
use App\Models\Playlist;
use App\Models\Comment;

class Media extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = 'media';

    protected $guarded = ['id'];

    public function toSearchableArray()
    {
        $array = $this->only('name');
        return $array;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'defined', 'ID_media', 'ID_category');
    }

    public function users_watched()
    {
        return $this->belongsToMany(User::class, 'watched', 'ID_media', 'ID_user');
    }

    public function users_liked()
    {
        return $this->belongsToMany(User::class, 'liked', 'ID_media', 'ID_user');
    }

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class, 'belongs_to', 'ID_media', 'ID_playlist');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'ID_Media');
    }

    public function actors()
    {
        return $this->belongsToMany(Person::class, 'act', 'ID_media', 'ID_person');
    }

    public function directors()
    {
        return $this->belongsToMany(Person::class, 'direct', 'ID_media', 'ID_person');
    }
}
