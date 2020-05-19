<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class post extends Model
{
  use Sluggable;

  /**
   * Return the sluggable configuration array for this model.
   *
   * @return array
   */
  public function sluggable()
  {
    return [
      'slug' => [
        'source' => 'title',
        'onUpdate' => true
      ]
    ];
  }

  // creamos la relación entre un usuario y un posto
  // relacion entre modelos
  public function user(){
    return $this->belongsTo(User::class);
  }

  public function getSubBodyAttribute() {
    return  substr($this->body, 0, 144);
  }
}
