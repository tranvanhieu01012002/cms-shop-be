<?php

namespace App\Repositories;

interface IRepository
{
    /**
     * Get methods
     */

    public function getAll();

    public function find($id);

    public function paginate(int $limit);

    public function first();

    public function getEntityModel();

    /**
     * Action methods
     */

    public function create($attributes = []);

    public function update($id, $attributes = []);

    public function delete($id);
}
