<?php

namespace App\Sharp\Web;

use App\Categorie;
use App\Projet;
use App\Sharp\Utils\WithEtat;
use Dvlpp\Sharp\ListView\SharpEntitiesListParams;
use Dvlpp\Sharp\Repositories\SharpCmsRepository;
use Dvlpp\Sharp\Repositories\SharpEloquentRepositoryUpdaterTrait;
use Dvlpp\Sharp\Repositories\SharpEloquentRepositoryUpdaterWithUploads;
use Dvlpp\Sharp\Repositories\SharpHasState;
use Dvlpp\Sharp\Repositories\SharpIsReorderable;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SharpProjetRepository implements SharpCmsRepository,
    SharpHasState, SharpEloquentRepositoryUpdaterWithUploads,
    SharpIsReorderable
{
    use SharpEloquentRepositoryUpdaterTrait;
    use WithEtat;

    /**
     * List all instances, with optional sorting and search.
     *
     * @param \Dvlpp\Sharp\ListView\SharpEntitiesListParams $params
     * @return mixed
     */
    public function listAll(SharpEntitiesListParams $params)
    {
        $projets = Projet::select("projets.*")
            ->with(["technos"])
            ->orderBy("ordre");

        if ($params->search) {
            // Quicksearch
            foreach (explode_search_words($params->search) as $term) {
                $projets->where(function ($query) use ($term) {
                    $query->orWhere("titre", "like", $term)
                        ->orWhere('soustitre', 'like', $term);
                });
            }
        }

        return $projets->get();
    }

    /**
     * Paginate instances.
     *
     * @param $count
     * @param \Dvlpp\Sharp\ListView\SharpEntitiesListParams $params
     * @return LengthAwarePaginator
     */
    public function paginate($count, SharpEntitiesListParams $params)
    {
    }

    /**
     * Persists an instance.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->update(null, $data);
    }

    /**
     * Update an instance.
     *
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        $instance = $id ? $this->find($id) : $this->newInstance();

        return $this->updateEntity("web", "projet", $instance, $data);
    }

    /**
     * Find an instance with the given id.
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Projet::find($id);
    }

    /**
     * Create a new instance for initial population of create form.
     *
     * @return mixed
     */
    public function newInstance()
    {
        return new Projet();
    }

    /**
     * Delete an instance.
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->find($id)->delete();
    }

    /**
     * Must update the upload in the database, depending on implementation.
     *
     * @param $instance
     * @param $attr
     * @param $fileInfo
     * @return mixed
     */
    function updateFileUpload($instance, $attr, $fileInfo)
    {
        $instance->fichier = basename($fileInfo["path"]);
    }

    /**
     * Delete the upload on the database, depending on implementation.
     *
     * @param $instance
     * @param $attr
     * @return mixed
     */
    function deleteFileUpload($instance, $attr)
    {
    }


    /**
     * @param $instance
     * @return string
     */
    function getStorageDirPath($instance)
    {
        return "screenshots";
    }

    /**
     * Reorder instances to match the given id array.
     *
     * @param array $entitiesIds
     * @return mixed
     */
    function reorder(Array $entitiesIds)
    {
        foreach ($entitiesIds as $k => $entityId) {
            $this->find($entityId)->update([
                "ordre" => $k
            ]);
        }
    }
}