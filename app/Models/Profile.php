<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';
    protected $primarykey  = 'profile.id';
    protected $guarded =  [];

    public function accords(){
        return $this->hasMany(\App\Models\Profile_AP::class,'profile_id','id')->join('accords_personalities','accords_personalities.id','=','profile_ap.ap_id')->where('accords_personalities.type',1)->select(['accords_personalities.id','accords_personalities.name','accords_personalities.color','accords_personalities.weight','profile_ap.profile_id']);
    }

    public function personalities(){
        return $this->hasMany(\App\Models\Profile_AP::class,'profile_id','id')->join('accords_personalities','accords_personalities.id','=','profile_ap.ap_id')->where('accords_personalities.type',2)->select(['accords_personalities.id','accords_personalities.name','accords_personalities.color','accords_personalities.weight','profile_ap.profile_id']);
    }
}
