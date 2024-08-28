<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $primarykey  = 'questions.id';
    protected $guarded =  [];

    public function answers(){
        return $this->hasMany(\App\Models\Answer::class,'question_id','id');
    }
}
