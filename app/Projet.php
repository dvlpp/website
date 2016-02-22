<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = ["ordre"];

    public function screenshots()
    {
        return $this->hasMany(Screenshot::class)
            ->orderBy("ordre");
    }

    public function technos()
    {
        return $this->belongsToMany(Techno::class)
            ->withPivot('ordre')
            ->orderBy('ordre', 'asc');
    }

    public function screenshotsByTag($tag)
    {
        return $this->screenshots->filter(function ($item) use ($tag) {
            return $item->tag == $tag;
        })->all();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActifs($query)
    {
        $etat = auth()->check() ? 2 : 3;

        return $query->where('etat', ">=", $etat);
    }
}
