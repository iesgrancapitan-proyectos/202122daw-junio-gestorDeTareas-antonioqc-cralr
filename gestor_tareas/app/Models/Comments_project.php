<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Comments_project extends Model
{
    protected $table='comments_projects';

    public $timestamps = false;

    protected $fillable=['id_project','name','description','date_create','date_update'];

    public function proyecto(){
        return $this->belongsTo('App\Models\Proyecto','id_project');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','id_user');
    }
}
