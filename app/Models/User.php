<?php

namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends \Eloquent implements Authenticatable
{
    use AuthenticableTrait;
    use HasFactory;
    protected $fillable = ['name','password' , 'hospital_name'];
}
