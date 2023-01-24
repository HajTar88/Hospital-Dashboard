<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operations extends Model
{
    protected $fillable = ['operation_code','address','beds','hospital_id'];
    public function Hospita()
    {
        return $this->belongsTo('App\Hospital', 'hospital_id');
    }
}
