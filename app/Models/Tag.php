<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Tag extends Model
{
    //
    protected $table = "tags";
    protected $guarded = [];

    public function posts()
    {
        return $this
            ->belongsToMany(Post::class, PostTag::class, 'tag_id', 'post_id')
            ->withTimestamps();
    }
    public function postsLanguage($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }
        return $this
            ->belongsToMany(Post::class, PostTag::class, 'tag_id', 'post_id')
            ->withTimestamps()->where('language', '=', $language);
    }

    public function postTags($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }
        return $this->hasMany(PostTag::class, 'tag_id', 'id')->where('post_tags.language', '=', $language);
    }
    public function products()
    {
        return $this
            ->belongsToMany(Product::class, ProductTag::class, 'tag_id', 'product_id')
            ->withTimestamps();
    }
    public function productsLanguage($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }
        return $this
            ->belongsToMany(Product::class, ProductTag::class, 'tag_id', 'product_id')
            ->withTimestamps()->where('language', '=', $language);
    }

    public function productTags($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }
        return $this->hasMany(ProductTag::class, 'tag_id', 'id')->where('product_tags.language', '=', $language);
    }
}
