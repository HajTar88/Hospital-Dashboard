<?php
namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Http\Controllers\UserController;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Hospital extends Authenticatable
{
use Notifiable;
use HasFactory;
// protected $table = 'hospitals';
protected $primaryKey = 'id';
protected $guard = "hospitals";
protected $table = 'hospitals';
protected $fillable = ['hospital_code','hospital_name','hospital_address','phone','password'];

protected $hidden = [ 'password', 'remember_token',];
public function dor()
{
    return $this->hasOne('App\Doctor');
}
public function PAT()
{
    return $this->hasOne('App\Patients');
}
public function getAuthPassword()
{
  return $this->password;
}
// protected $table = 'hospital'; // add this line with your table name
// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Hospital extends Model
// {
//     use HasFactory;

//     protected $table = 'hospitals';
//     protected $fillable = ['hospital_name', 'password'];
// }
}