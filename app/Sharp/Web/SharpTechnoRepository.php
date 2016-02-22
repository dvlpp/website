<?php

namespace App\Sharp\Web;

use App\Techno;
use Dvlpp\Sharp\ListView\SharpEntitiesListParams;
use Dvlpp\Sharp\Repositories\SharpCmsRepository;
use Dvlpp\Sharp\Repositories\SharpEloquentRepositoryUpdaterTrait;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SharpTechnoRepository implements SharpCmsRepository
{
    use SharpEloquentRepositoryUpdaterTrait;

    /**
     * List all instances, with optional sorting and search.
     *
     * @param \Dvlpp\Sharp\ListView\SharpEntitiesListParams $params
     * @return mixed
     */
    public function listAll(SharpEntitiesListParams $params)
    {
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
        return Techno::orderBy("nom")->paginate($count);
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

        return $this->updateEntity("web", "techno", $instance, $data);
    }

    /**
     * Find an instance with the given id.
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Techno::find($id);
    }

    /**
     * Create a new instance for initial population of create form.
     *
     * @return mixed
     */
    public function newInstance()
    {
        return new Techno();
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
     * Handle the Techno ref list
     *
     * @param $askingInstance
     * @return mixed
     */
    public function formList($askingInstance)
    {
        return Techno::orderBy("nom", "asc")
            ->lists("nom", "id")
            ->toArray();
    }
}