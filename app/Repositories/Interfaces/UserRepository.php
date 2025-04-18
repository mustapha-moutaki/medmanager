<?php
namespace App\Repositories\Interfaces;

interface UserRepository
{
    public function all();
    public function find($id);

    public function countDoctors();
    public function countPatients();
    public function countStaff(); 
    public function countAppointments();
    public function gender();
    
}