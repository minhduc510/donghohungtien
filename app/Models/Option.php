<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    //
    protected $table="options";
    protected $guarded = [];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function getPriceAfterSaleAttribute()
    {
        $sale=optional($this->product)->sale;
        if ($sale) {
            return $this->attributes['price'] * (100 - $sale) / 100;
        } else {
            return $this->attributes['price'];
        }
    }

    public function images()
    {
        return $this->hasMany(OptionImage::class, "option_id", "id");
    }
}
 //  protected $appends = ['price_after_sale', 'slug_full', 'number_pay', 'name', 'slug', 'description', 'description_seo', 'keyword_seo', 'title_seo', 'content', 'language','model','tinhtrang','baohanh','xuatsu','content1','content2','content3','content4'];

