<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryLandingTranslation extends Model
{
    //
    protected $table = "category_landings_translations";
    // public $fillable =['name'];
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo(CategoryLanding::class, 'category_id', 'id');
    }
}
