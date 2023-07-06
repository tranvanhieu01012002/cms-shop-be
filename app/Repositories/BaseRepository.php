<?php

namespace App\Repositories;

use App\Constants\Pagination;

abstract class BaseRepository implements IRepository
{

    protected $model;
    protected $page;
    protected $limit;
    protected $offset;
    protected $count;
    protected $with = [];

    // Create model
    public function __construct()
    {
        $this->setModel();
    }

    public function setPaginate($limit)
    {
        $this->page = request()->query("page") ?? 1;
        $this->limit = (int) $limit;
        $this->offset = $this->page == 1 ? 0 : ($this->page - 1) * $this->limit;
        $this->count = $this->model->count();
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

    public function setWith($with = [])
    {
        $this->with = $with;
        return $this;
    }

    abstract public function getModel();

    // Query methods
    public function getAll($column = ['*'])
    {
        return $this->model->all($column);
    }

    public function paginate(int $limit = Pagination::LIMIT, $column = ['*'])
    {
        $this->setPaginate($limit);
        return [
            'masterData' => [
                'count' => $this->count
            ],
            'data' => $this
                ->model
                ->with($this->with)
                ->when($this->limit !== Pagination::UNLIMITED, function ($query) {
                    $query->offset($this->offset)->limit($this->limit);
                })
                ->latest()
                ->get($column)
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
