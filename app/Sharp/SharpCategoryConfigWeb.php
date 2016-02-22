<?php

namespace App\Sharp;

use Dvlpp\Sharp\Config\SharpCategoryConfig;

class SharpCategoryConfigWeb extends SharpCategoryConfig
{
    protected $key = "web";

    protected $label = "Web";

    protected $entities = [
        "projet",
        "techno"
    ];
}