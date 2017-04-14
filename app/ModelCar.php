<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelCar extends Model
{
    //
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'models';

    public function maker(){
        
        return $this->belongsTo('App\Maker');
    }

}
