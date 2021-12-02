<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Media;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $guarded = ['id'];
    protected $hidden = [];

    public function medias()
    {
        return $this->belongsToMany(Media::class, 'defined', 'ID_category', 'ID_media');
    }

}
