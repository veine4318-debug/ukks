<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable('id_template', 'nama_website', 'bio', 'slug', 'logo', 'gallery', 'is_published', 'published_at')]
class websites extends Model
{
    protected $table = 'websites';
    protected $primaryKey = 'id_website';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];
}
