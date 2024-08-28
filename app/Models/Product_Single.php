<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_Single extends Model
{
    protected $table = 'product_single';
    protected $primarykey  = 'product_single.id';
    protected $guarded =  [];

    public function profile(){
        return $this->hasOne(\App\Models\Profile::class,'id','profile_id')->with('personalities','accords');
    }
}
