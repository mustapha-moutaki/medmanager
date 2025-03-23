<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordForgot extends Model
{
    protected $table = 'password_forgot';
    protected $fillable = ['email', 'token'];
}
