<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderTranslation extends Model
{
    //
    protected $table = "slider_translations";
    // public $fillable =['name'];
    protected $guarded = [];
    public function slider()
    {
        return $this->belongsTo(Slider::class, 'slider_id', 'id');
    }
}
