<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfersreq extends Model
{
    protected $fillable = ['patient_code','patient_name','address','diagnosis','case','reason','current_hospital','hospital_referred','hospital_id'];
}
