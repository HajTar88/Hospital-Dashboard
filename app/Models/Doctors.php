<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    protected $fillable = ['doctor_name','weekly_schedule','email','specialization','address','phone','hospital_id'];
    public function Hospita()
    {
        return $this->belongsTo('App\Hospital', 'hospital_id');
    }
}
