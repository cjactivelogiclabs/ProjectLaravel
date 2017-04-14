<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
   /**
    * The database table used by the model.
    *
    * @var string
    */
   protected $table = 'suppliers';

   public function products(){

       return $this->hasMany('App\Product');
   }
}
