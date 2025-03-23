<?php
namespace App\Repositories\Interfaces;

interface UserRepository
{
    public function all();
    public function find($id);
    // You can add more methods as needed (create, update, delete, etc.)
}