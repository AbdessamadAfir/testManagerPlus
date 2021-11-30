<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $fillable = [
        'categorie_id',
        "title",
        'description',
        'slug',
        'featured_image',
    ];
    public function categorie()
    {
        return $this->belongsTo('App\Models\Categories');
    }
}
