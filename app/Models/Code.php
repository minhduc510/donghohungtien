<?php

namespace App\Models;
//use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Code extends Model
{
    //  use SoftDeletes;
    protected $table = "codes";
    protected $guarded = [];
}
