<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'teacher_id',
    ];

    public function teachers()
    {
        return $this->belongsTo(Teacher::class);
    }
}
