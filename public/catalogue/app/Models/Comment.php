<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comment';
    
    protected $guarded = ['id'];

    public function moderated_by()
    {
        return $this->belongsToMany(User::Class, 'moderate', 'ID_comment', 'ID_user');
    }
}
