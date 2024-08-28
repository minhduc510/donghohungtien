<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variants extends Model
{
    //
    protected $table = "variants";
    protected $guarded = [];

    public function getAttribute1(){
        return $this->hasMany(\App\Models\AttributeTranslation::class,'attribute_id','attribute1');
    }
    public function getAttribute2(){
        return $this->hasMany(\App\Models\AttributeTranslation::class,'attribute_id','attribute2');
    }
}
