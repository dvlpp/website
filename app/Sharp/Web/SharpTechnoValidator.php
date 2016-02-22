<?php

namespace App\Sharp\Web;

use Dvlpp\Sharp\Validation\SharpValidator;

class SharpTechnoValidator extends SharpValidator
{
    protected $rules = [
        "nom" => "required",
    ];
}