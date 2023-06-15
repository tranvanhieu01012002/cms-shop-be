<?php

namespace App\Repositories;

interface IRepository
{
    /**
     * Get methods
     */

    public function getAll($columns);

    public function find($id, $columns);

    public function paginate(int $limit, $columns);

    public function first($columns);

    public function getEntityModel();

    /**
     * Action methods
     */

    public function create($attributes = []);

    public function update($id, $attributes = []);

    public function delete($id);
}
