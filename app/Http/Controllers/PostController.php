<?php

namespace App\Http\Controllers;

use App\Models\PostTag;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\CategoryPost;
use App\Models\CategoryProduct;
use App\Models\PostTranslation;
use App\Models\CategoryPostTranslation;
use App\Models\Setting;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PostController extends Controller
{
    const POST_PER_PAGE = 16;

    private $post;
    private $categoryProduct;
    private $unit = 'đ';
    private $categoryPost;
    private $limitPostRelate = 5;
    private $idCategoryPostRoot = 21;
    private $postTranslation;
    private $categoryPostTranslation;
    private $setting;
    private $breadcrumbFirst = [];
    public function __construct(
        Post $post,
        CategoryPost $categoryPost,
        CategoryProduct $categoryProduct,
        PostTranslation $postTranslation,
        CategoryPostTranslation $categoryPostTranslation,
        Setting $setting
    ) {
        $this->post = $post;
        $this->categoryPost = $categoryPost;
        $this->categoryProduct = $categoryProduct;
        $this->postTranslation = $postTranslation;
        $this->categoryPostTranslation = $categoryPostTranslation;
        $this->setting = $setting;
        $this->breadcrumbFirst = [
            'name' => 'Tin tức',
            'slug' => makeLink("post_all"),
            'id' => null,
        ];
    }

    public function index()
    {
        $data = $this->post->where('active', 1)->orderBy('created_at', 'desc')->paginate(self::POST_PER_PAGE);
        $category = $this->categoryPost->where('active', 1)->find(159);
        return view('frontend.pages.post-by-category', compact('data', 'category'));
    }

    public function tag($slug)
    {
        $data = [];

        $tag = Tag::where([
            ['slug', $slug],
        ])->get();

        $tag = $tag->first();


        if ($tag) {
            $listIdPost = PostTag::where('tag_id', $tag->id)->pluck('post_id');


            if ($listIdPost->count() > 0) {
                $data = $this->post
                    ->whereIn('posts.id', $listIdPost)
                    ->where([['posts.active', 1]])
                    ->paginate(20);

                return view('frontend.pages.tag', [
                    'tag' => $tag,
                    'data' => $data,
                    'unit' => $this->unit,
                    'slug' => $tag['name'],
                    'seo' => [
                        'title' =>   $tag->name,
                        'keywords' => 'TAG',
                        'description' =>  'TAG',
                        'image' => '',
                        'abstract' =>  'TAG',
                    ]
                ]);
            } else {
                return view('frontend.pages.tag', [
                    'data' => $data,
                    'unit' => $this->unit,
                    'slug' => 'TAG',
                    'seo' => [
                        'title' =>   $tag->name,
                        'keywords' => 'TAG',
                        'description' =>  'TAG',
                        'image' => '',
                        'abstract' =>  'TAG',
                    ]
                ]);
            }
        }
    }
}
