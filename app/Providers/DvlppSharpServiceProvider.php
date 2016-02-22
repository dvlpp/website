<?php

namespace App\Providers;

use App\Sharp\SharpCategoryConfigWeb;
use App\Sharp\SharpEntityConfigWebCategorie;
use App\Sharp\SharpEntityConfigWebProjet;
use App\Sharp\SharpEntityConfigWebTechno;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;


class DvlppSharpServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind("sharp.web", SharpCategoryConfigWeb::class);
        $this->app->bind("sharp.web.projet", SharpEntityConfigWebProjet::class);
        $this->app->bind("sharp.web.categorie", SharpEntityConfigWebCategorie::class);
        $this->app->bind("sharp.web.techno", SharpEntityConfigWebTechno::class);
    }
}
