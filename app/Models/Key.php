<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    //
    /**
     * type : 1 Table CatePosts
     * type : 2 Table Posts
     * type : 3 Table CateProducts
     * type : 4 Table Products
     */
    protected $table="keys";

    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo(Post::class, 'key_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'key_id', 'id');
    }
    public function galaxy()
    {
        return $this->belongsTo(Galaxy::class, 'key_id', 'id');
    }

    public function categoryProduct()
    {
        return $this->belongsTo(CategoryProduct::class, 'key_id', 'id');
    }

    public function categoryPost()
    {
        return $this->belongsTo(CategoryPost::class, 'key_id', 'id');
    }
    public function CategoryGalaxy()
    {
        return $this->belongsTo(CategoryGalaxy::class, 'key_id', 'id');
    }
}
