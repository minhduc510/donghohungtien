<?php
namespace App\Http\Controllers;
use App\Models\Tag;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\CategoryProduct;

use App\Models\Post;
use App\Models\CategoryPost;


class SitemapXmlController extends Controller
{

    public function index() {

        $post = Post::all();

        $catePost = CategoryPost::all();

        $product = Product::all();

        $cateProduct = CategoryProduct::all();

        $tag = Tag::all();

        return response()->view('index', [
            'post' => $post,
            'catePost' => $catePost,
            'product' => $product,
            'cateProduct' => $cateProduct,
            'tag' => $tag,
        ])->header('Content-Type', 'text/xml');
    }
}