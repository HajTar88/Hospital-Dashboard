<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cares extends Model
{
    protected $fillable = ['care_code','address','beds','hospital_id'];
}
