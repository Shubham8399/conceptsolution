<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homemodel extends Model
{
      public $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name','last_name','mobile', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public function voucher()
    {
        return $this->hasOne('App\Voucher');
    }

    public function getFullName()
    {
        return ucfirst(implode(" ",[$this->usr_firstname,$this->usr_lastname]));
    }
}
