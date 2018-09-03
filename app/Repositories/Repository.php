<?php

namespace App\Repository;

use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface {

    protected $model;

    public function __construct(Model $model) {
        return $this->model = $model;
    }

    public function all() {
        return $this->model->all();
    }

    public function create(array $data) {
        return $this->model->create($data);
    }

    public function update(array $data, $id) {
        $result = $this->model->find($id);
        return $result->update($data);
    }

    public function delete($id) {
        return $this->find($id)->delete();
    }

    public function show($id) {
        return $this->find($id);
    }



}