<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table='comments_tasks';

    public $timestamps = false;

    protected $fillable=['id_task','name','description','date','date_update'];

    public function tarea(){
        return $this->belongsTo('App\Models\Tarea','id_task');
    }
}
