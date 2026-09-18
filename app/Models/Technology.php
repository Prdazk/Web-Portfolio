<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    protected $fillable = [
        'name',
        'category',
        'stack_id',
        'description',
        'github_link',
        'demo_link',
        'screenshot',
    ];

    public function images()
    {
        return $this->hasMany(TechnologyImage::class);
    }
}