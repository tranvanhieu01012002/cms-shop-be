<?php

namespace App\Repositories;

use App\Constants\Pagination;

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
    public function getAll($column = ['*'])
    {
        return $this->model->all($column);
    }

    public function paginate(int $limit = Pagination::LIMIT, $column = ['*'])
    {
        $page =  request()->query("page") ?? 1;
        $limit = $limit > 1 ? $limit : Pagination::LIMIT;
        $offset = $page == 1 ? 0 : ($page - 1) * $limit;
        $count = $this->model->count();
        return [
            'masterData' => [
                'count' => $count
            ],
            'data' => $this->model->offset($offset)->limit($limit)->latest()->get($column)
        ];
    }

    public function first($column = ['*'])
    {
        return $this->model->first($column);
    }

    public function find($id, $column = ['*'])
    {
        $result = $this->model->find($id, $column);

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

    public function getEntityModel()
    {
        return $this->model;
    }
}
