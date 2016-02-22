<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Techno extends Model
{
    protected $fillable = ["nom"];

    public function projets()
    {
        return $this->belongsToMany(Projet::class);
    }
}
