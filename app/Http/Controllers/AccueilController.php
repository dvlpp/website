<?php

namespace App\Http\Controllers;

use App\Projet;

class AccueilController extends Controller
{

    public function index()
    {
        $projets = Projet::actifs()
            ->orderBy("ordre", "asc")
            ->get();

        return view("accueil", compact('projets'));
    }
}
