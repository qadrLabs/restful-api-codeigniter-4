<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Posts extends ResourceController
{
    protected $modelName = 'App\Models\PostModel';
    protected $format = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function show($id = null)
    {
        $record = $this->model->find($id);
        if (!$record) {
            # code...
            return $this->failNotFound(sprintf(
                'post with id %d not found',
                $id
            ));
        }

        return $this->respond($record);
    }

    public function create()
    {
        $data = $this->request->getPost();
        if (!$this->model->save($data)) {
            # code...
            return $this->fail($this->model->errors());
        }

        return $this->respondCreated($data, 'post created');
    }
}
