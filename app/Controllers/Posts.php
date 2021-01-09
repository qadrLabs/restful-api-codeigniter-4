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
}
