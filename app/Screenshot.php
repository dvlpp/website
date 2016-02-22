<?php

namespace App;

use Dvlpp\Sharp\Repositories\SharpModelWithFiles;
use Illuminate\Database\Eloquent\Model;

class Screenshot extends Model implements SharpModelWithFiles
{
    protected $fillable = [
        "fichier",
        "legende",
        "projet_id",
        "ordre"
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    /**
     * Return the full path of a file identified by the $attribute.
     *
     * @param $attribute
     * @return mixed
     */
    function getSharpFilePathFor($attribute)
    {
        return "screenshots/" . $this->fichier;
    }
}
