<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments_task extends Model
{
    protected $table='comments_tasks';

    public $timestamps = false;

    protected $fillable=['id_task','name','description','date_create','date_update'];

    public function tarea(){
        return $this->belongsTo('App\Models\Tarea','id_task');
    }
}
