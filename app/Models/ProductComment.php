<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    //
    protected $table="product_comments";
    protected $guarded = [];
    public function childs()
    {
        return $this->hasMany(ProductComment::class, 'parent_id', 'id');
    }
    public function origin()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
