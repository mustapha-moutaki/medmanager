<?php

namespace App\Repositories\Interfaces;

use App\Models\Doctor;

interface DoctorRepositoryInterface
{
    public function getAll();
    public function findById(int $id);
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
}
