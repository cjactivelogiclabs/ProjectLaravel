<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ModelCar;

class Product_model_year extends Model
{
    //
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_model_year';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_product','id_maker','id_model','year','status'];

    public function model(){
        
        return $this->belongsTo('App\ModelCar','id_model');
    }
    public function maker(){
        
        return $this->belongsTo('App\Maker','id_maker');
    }

    public function product(){
        
        return $this->belongsTo('App\Product','id_product');
    }

    public function modelName($id){

        $model = ModelCar::find($id);
        return $model->name;
    }
}
