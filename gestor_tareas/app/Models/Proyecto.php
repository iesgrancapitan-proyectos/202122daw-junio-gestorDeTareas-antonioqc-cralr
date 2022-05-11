<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table='projects';

    public $timestamps = false;

    protected $fillable=['name','description','date_create','date_update','date_finally'];

    public function user(){
        return $this->belongsToMany('App\Models\User','user_project','id_project','id_user')
            ->withPivot('id_user');
    }
}
