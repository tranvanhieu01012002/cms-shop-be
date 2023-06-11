<?php

namespace App\Repositories;

abstract class BaseRepository implements IRepository
{

    protected $model;

    // Create model
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * Set model
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    abstract public function getModel();

    // Query methods
    public function getAll()
    {
        return $this->model->all();
    }

    public function paginate(int $limit = 20)
    {
        return $this->model->paginate($limit);
    }

    public function first()
    {
        return $this->model->first();
    }

    public function find($id)
    {
        $result = $this->model->find($id);

        return $result;
    }


    // Action methods

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes = [])
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }
}
