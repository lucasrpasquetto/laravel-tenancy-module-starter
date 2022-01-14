<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class Repository
{

    /* @var Model */
    protected $model;

    /**
     * Repository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function select()
    {
        return $this->model
            ->newQuery()
            ->pluck('name', 'id');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->model->newQuery()->get();
    }

    /**
     *
     * @param null $search
     * @param null $perPage
     * @return mixed
     */
    public function fetchAll($search = null, $perPage = null, $filter = null)
    {
        $query = $this->model->newQuery();

        if (empty($filter)) {
            $query->search($search);
        }

        return $query->orderBy('id', 'ASC')->paginate($perPage);
    }

    /**
     *
     * @param null $search
     * @param null $perPage
     * @return mixed
     */
    public function fetchOrderBy($order, $search = null, $perPage = null)
    {
        return $this->model->newQuery()
            ->search($search)
            ->orderBy($order)
            ->paginate($perPage);
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function get(int $id)
    {
        return $this->model->newQuery()
            ->find($id);
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function findBy($column, $value)
    {
        return $this->model->newQuery()
            ->where($column, $value)
            ->first();
    }

    /**
     * @param array $params
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function create(array $params)
    {
        $entity = $this->model->newQuery();
        return $entity->create($params);
    }

    /**
     * @param Model $entity
     * @param array $params
     * @return Model
     */
    public function update(Model $entity, array $params)
    {
        $entity->fill($params);
        $entity->save();

        return $entity;
    }

    /**
     * @param Model $entity
     * @return int
     */
    public function destroy(Model $entity)
    {
        return $entity->delete();
    }

    /**
     * @param Model $entity
     * @return Model
     */
    public function toggleActive(Model $entity)
    {
        $entity->active = !$entity->active;
        $entity->save();
        return $entity;
    }

    public function fetchActive()
    {
        return $this->model->newQuery()
            ->where('active', true)
            ->orderBy('name')
            ->get();
    }

    public function findById($column, $id)
    {
        return $this->model->newQuery()
            ->where($column, $id)
            ->paginate();
    }

    public function findAllById($column, $id)
    {
        return $this->model->newQuery()
            ->where($column, $id)
            ->get();
    }

    public function countAll()
    {
        return $this->model->newQuery()->count();
    }
}
