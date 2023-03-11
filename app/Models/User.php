<?php

namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends \Eloquent implements Authenticatable
{
    
    use AuthenticableTrait, HasFactory, Notifiable, HasApiTokens;
   
    protected $fillable = ['name','password' , 'email' , 'hospital_name'];
}
