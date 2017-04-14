<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['SKU','supplier_sku','name', 'description','supplier_id','condition_o','categoric',
                           'weight','location','type','fcc_id','ic','frequency','num_button',
                           'reusable','board_programming','emergency_key','battery_part', 
                           'id_maker','id_model','stock','stock_minimum','price', 'purchase_price','status', 'special', 'special_price', 'image'];

    //
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    public function suppliers(){
        
        return $this->belongsTo('App\Supplier','supplier_id','id');
    } 
}
