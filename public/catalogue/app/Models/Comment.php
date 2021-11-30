<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Media;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comment';
    
    protected $guarded = ['id'];

    public function moderated_by()
    {
        return $this->belongsToMany(User::Class, 'moderate', 'ID_comment', 'ID_user');
    }

    public function user()
    {
        return $this->belongsTo(User::Class, 'ID_user', 'id');
    }

    public function media()
    {
        return $this->belongsTo(Media::Class, 'ID_media', 'id');
    }
}
