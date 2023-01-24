<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $fillable = ['patient_name','patient_code','address','case','diagnosis','password','hospital_id'];
    public function Hospita()
    {
        return $this->belongsTo('App\Hospital', 'hospital_id');
    }
}
