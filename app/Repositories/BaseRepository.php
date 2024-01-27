<?php

namespace App\Repositories;

interface BaseRepository
{
    /**
     * Get all
     * @return mixed
     */
    public function all();

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update
     * @param string $uuid
     * @param array $attributes
     * @return $model
     */
    public function update($uuid, array $attributes);

    /**
     * Delete
     * @param $uuid
     * @return mixed
     */
    public function delete($uuid);
}