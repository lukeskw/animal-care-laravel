<?php

namespace App\Services;

use App\Exceptions\ModelNotFoundException;
use Illuminate\Database\Eloquent\Model;

class BaseService
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    public function getAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        try{
            $model = $this->model->find($id);
            if (empty($model)){
                throw new ModelNotFoundException();
            }
            $model->update($data);

        } catch (\Exception $e){
            throw $e;
        }
        return $model;
    }

    public function delete($id)
    {
        try{
            $model = $this->model->find($id);
            if (empty($model)) {
                throw new ModelNotFoundException();
            }
            $model->delete();
        } catch(\Exception $e){
            throw $e;
        }
        return $model;
    }
}
