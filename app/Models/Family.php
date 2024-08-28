<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $table = 'family';
    protected $primarykey  = 'family.id';
    protected $guarded =  [];
}
