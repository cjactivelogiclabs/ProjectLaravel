<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    var $company_type_constant = array('Locksmith' => 'Locksmith', 'Auto Dealer' => 'Auto Dealer', 'Retail Store' => 'Retail Store', 'Other' => 'Other'); 
    var $interested_constant = array('Pick and Decoder' => 'Pick and Decoder', 'Programmer' => 'Programmer', 'Key-Less Entry' => 'Key-Less Entry', 'Key Blank' => 'Key Blank',
                            'Duplication System' => 'Duplication System', 'Transporder Key' => 'Transporder Key', 
                            'Product Information' => 'Product Information', 'All Above' => 'All Above', 'Other' => 'Other'); 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname','email','phone','type','id_country','id_state','city','zipcode','address', 'password','hear_about_us' ,'company_type','interested_in','programmer_using'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function state(){
        
        return $this->belongsTo('App\State','id_state');
    }

}
