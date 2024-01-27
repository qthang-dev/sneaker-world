<?php

namespace App\Repositories\Eloquent;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Log;
use DB;

abstract class EloquentBaseRepository implements BaseRepository
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * EloquentRepository constructor.
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Get All
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->model->orderBy('created_at', 'desc')->get();
    }

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $result = $this->model->find($id);

        return $result;
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        DB::beginTransaction();
        try {
            $item = $this->model->create($attributes);
            DB::commit();
            return $item;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Create item fail: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Update
     * @param $uuid
     * @param array $attributes
     * @return $model
     */
    public function update($uuid, array $attributes)
    {
        DB::beginTransaction();
        try {
            $item = $this->model->where('uuid', $uuid)->first();
            if (!$item) {
                return false;
            }
            $item->update($attributes);
            DB::commit();
            return $item;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Update item fail: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Delete
     * @param $uuid
     * @return bool
     */
    public function delete($uuid)
    {
        $item = $this->model->where('uuid', $uuid)->first();

        if ($item) {
            $item->delete();

            return true;
        }

        return false;
    }

}