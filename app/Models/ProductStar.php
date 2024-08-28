<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductStar extends Model
{
    //
    protected $table="product_stars";
    protected $guarded = [];


    public function name_tat($string)
    {
        $ret = '';
        foreach (explode(' ', $string) as $word)
            $ret .= strtoupper($word[0]);
        return $ret;
        
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(StarImage::class, "star_id", "id");
    }
    public function childs()
    {
        return $this->hasMany(ProductStar::class, 'parent_id', 'id');
    }
}


