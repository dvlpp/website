<?php

use App\Projet;
use App\Techno;

class ProjetSeeder extends \Illuminate\Database\Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projets = $this->readProjets();

        foreach($projets as $i => $tabProjet) {

            $technos = $tabProjet["technos"];
            unset($tabProjet["technos"]);

            $projet = factory(\App\Projet::class)->create(
                array_merge(
                    $tabProjet, [
                        "slug" => str_slug($tabProjet["titre"]),
                        "ordre" => $i,
                    ]
                )
            );

            $this->addTechnos($projet, $technos);
        }
    }

    private function readProjets()
    {
        return include __DIR__ . "/import/projets.php";
    }

    private function addTechnos(Projet $projet, array $technos)
    {
        $k=1;

        foreach($technos as $nomTechno) {
            $techno = Techno::where("nom", $nomTechno)->first();

            if(!$techno) {
                $techno = factory(Techno::class)->create([
                    "nom" => $nomTechno
                ]);
            }

            $projet->technos()->save($techno, ["ordre" => $k++]);
        }
    }
}