<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'state',
        'dapartment_id',
        'class_id',
        'nation_id',
        'date_of_birth',
        'phone_number',
        'address',
        'whatsapp_number',
        'father_job',
        'nationality',
    ];

}
