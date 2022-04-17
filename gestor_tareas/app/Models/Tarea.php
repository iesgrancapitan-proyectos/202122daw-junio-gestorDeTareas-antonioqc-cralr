<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table='tasks';

    protected $fillable=['id_user','name','description','date_create','date_update','date_finally'];

    public function user(){
        return $this->belongsTo('App\Models\User','id_user');
    }
}
