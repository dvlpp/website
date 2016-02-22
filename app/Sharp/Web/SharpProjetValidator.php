<?php

namespace App\Sharp\Web;

use Dvlpp\Sharp\Validation\SharpValidator;

class SharpProjetValidator extends SharpValidator
{
    protected $rules = [
        "titre" => "required",
        "soustitre" => "required"
    ];
}