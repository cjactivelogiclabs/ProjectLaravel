<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{
    //
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'makers';

    public function models(){

        return $this->hasMany('App\ModelCar');
    }
}
