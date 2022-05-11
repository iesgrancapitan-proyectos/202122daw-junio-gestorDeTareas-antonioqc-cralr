<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProyectoUser extends Model
{
    protected $table='user_project';

    protected $fillable=['id_user','id_project'];

    protected $guarded = ['id'];
    
}
