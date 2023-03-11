<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nurseries extends Model
{
    protected $fillable = ['nurserie_code','address','beds','hospital_id'];
}
?>
