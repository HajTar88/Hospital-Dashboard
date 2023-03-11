<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\storage;
use Illuminate\Support\Facades\URL;

class Doctors extends Model
{
    protected $fillable = ['doctor_name','weekly_schedule','email','password','specialization','address','phone','hospital_id','photo'];
    public function Hospita()
    {
        return $this->belongsTo('App\Hospital', 'hospital_id');
    }
    public function getPhotoAttribute($value){
        if($value){
            return URL::to('/').storage::url($value);
        }else {
            return $value;
        }
    }
}
?>