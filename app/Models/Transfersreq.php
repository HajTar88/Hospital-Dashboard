<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfersreq extends Model
{
    protected $fillable = ['patient_name','reason','current_hospital','hospital_referred','hospital_id'];
}
?>