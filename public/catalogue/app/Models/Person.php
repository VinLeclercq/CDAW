<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Media;

class Person extends Model
{
    use HasFactory;

    protected $table = 'person';

    protected $guarded = ['id'];
    protected $hidden = [];

    public function medias()
    {
        return $this->belongsToMany(Media::class, 'compose', 'ID_media', 'ID_person');
    }
}
