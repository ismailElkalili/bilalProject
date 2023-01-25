<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' , 'date_of_birth' ,'phone_number','nation_id','whatsapp_number','specialization','qualification','committees_id'
    ];
    public function Classes()
    {
        return $this->hasOne(Classes::class);
    }
}
