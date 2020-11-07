<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'students';

     protected $fillable = [
        'cedula',
        'id_num',
        'fisrt_name',
        'last_name',
        'home_phone',
        'work_phone',
        'cell_phone',
        'email',
        'address',
        'type',
        'updated_by',
        'created_at'
    ];
    protected $hidden = [
        'cedula',
    ];
}
