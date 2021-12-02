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

    public function act()
    {
        return $this->belongsToMany(Media::class, 'act', 'ID_person', 'ID_media');
    }

    public function direct()
    {
        return $this->belongsToMany(Media::class, 'direct', 'ID_person', 'ID_media');
    }
}
