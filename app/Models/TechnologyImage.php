<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TechnologyImage extends Model
{
    protected $table = 'technology_images';

    protected $fillable = ['technology_id', 'image'];

    public function technology()
    {
        return $this->belongsTo(Technology::class);
    }
}