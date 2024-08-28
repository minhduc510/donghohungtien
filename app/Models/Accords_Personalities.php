<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accords_Personalities extends Model
{
    use HasFactory;
    protected $table = 'accords_personalities';
    protected $primarykey  = 'accords_personalities.id';
    protected $guarded =  [];
}
