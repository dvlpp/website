<?php

namespace App\Http\Controllers;

use App\Projet;

class ProjetController extends Controller
{

    public function show($slug)
    {
        $projet = Projet::where("slug", $slug)
            ->actifs()
            ->firstOrFail();

        $suivant = $this->findNext($projet);

        return view("projet", compact('projet', 'suivant'));
    }

    /**
     * @param $projet
     */
    private function findNext($projet)
    {
        $suivant = Projet::where("ordre", ">", $projet->ordre)
            ->actifs()
            ->orderBy("ordre")
            ->first();

        if (!$suivant) {
            $suivant = Projet::actifs()
                ->orderBy("ordre")
                ->firstOrFail();
        }

        return $suivant;
    }
}
