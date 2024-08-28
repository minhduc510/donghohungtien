<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personalities extends Model
{
    protected $table = 'personalities';
    protected $primarykey  = 'personalities.id';
    protected $guarded =  [];

    public function adjectives(){
        return $this->hasMany(\App\Models\Adjectives_Scents::class,'personality_id','id')->where('type',2);
    }
    public function scents(){
        return $this->hasMany(\App\Models\Adjectives_Scents::class,'personality_id','id')->where('type',1);
    }
}
