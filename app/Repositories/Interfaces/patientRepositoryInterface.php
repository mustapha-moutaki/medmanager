<?php

namespace App\Repositories\Interfaces;

use App\Models\Patient;

interface patientRepositoryInterface

{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
}