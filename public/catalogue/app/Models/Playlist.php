<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Media;

class Playlist extends Model
{
    use HasFactory;
    protected $casts = ['is_public' => 'boolean'];
    protected $table = 'playlist';
    protected $guarded = ['id'];

    public function users_owning()
    {
        return $this->belongsToMany(User::class, 'own', 'ID_playlist', 'ID_user');
    }

    public function users_subscribed()
    {
        return $this->belongsToMany(User::class, 'subscribe', 'ID_playlist', 'ID_user');
    }

    public function medias_in_playlist()
    {
        return $this->belongsToMany(Media::class, 'belongs_to', 'ID_playlist', 'ID_media');
    }
}
