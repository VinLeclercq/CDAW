<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Media;
use App\Models\Playlist;
use App\Models\Comment;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'forename',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function media_watched()
    {
        return $this->belongsToMany(Media::class, 'watched', 'ID_user', 'ID_media');
    }

    public function media_liked()
    {
        return $this->belongsToMany(Media::class, 'liked', 'ID_user', 'ID_media');
    }

    public function playlist_owned()
    {
        return $this->belongsToMany(Playlist::class, 'own', 'ID_user', 'ID_playlist');
    }

    public function playlist_subscribed()
    {
        return $this->belongsToMany(Playlist::class, 'subscribe', 'ID_user', 'ID_playlist');
    }

    public function comments_posted()
    {
        return $this->belongsTo(Comment::class);
    }

    public function moderated()
    {
        return $this->belongsToMany(Comment::Class, 'moderate', 'ID_user', 'ID_comment');
    }
}
