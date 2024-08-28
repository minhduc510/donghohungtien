<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
   //  use SoftDeletes;
   protected $table = "social";

   protected $guarded = [];


   public function userProvider()
   {
      return $this->belongsTo(User::class, 'user_id', 'id');
   }
}
