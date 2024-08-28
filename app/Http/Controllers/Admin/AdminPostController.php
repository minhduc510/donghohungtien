<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostTranslation;
use App\Models\CategoryPost;
use App\Models\Tag;
use App\Models\PostTag;
use App\Models\Key;
use App\Models\PostCate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\StorageImageTrait;
use App\Traits\DeleteRecordTrait;
use App\Traits\ParagraphTrait;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\ValidateAddPost;
use App\Http\Requests\Admin\ValidateEditPost;
use App\Models\ParagraphPost;
use App\Models\ParagraphPostTranslation;
use App\Exports\ExcelExportsDatabase;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelImportsDatabase;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;


class AdminPostController extends Controller
{
    use StorageImageTrait, DeleteRecordTrait, ParagraphTrait;
    private $post;
    private $postTranslation;
    private $categoryPost;
    private $htmlselect;
    private $tag;
    private $postTag;
    private $langConfig;
    private $langDefault;
    private $typeParagraph;
    private $configParagraph;
    public function __construct(
        Post $post,
        PostTranslation $postTranslation,
        CategoryPost $categoryPost,
        Tag $tag,
        PostTag $postTag,
        ParagraphPost $paragraphPost,
        ParagraphPostTranslation $paragraphPostTranslation
    ) {
        $this->post = $post;
        $this->postTranslation = $postTranslation;
        $this->categoryPost = $categoryPost;
        $this->paragraphPost = $paragraphPost;
        $this->paragraphPostTranslation = $paragraphPostTranslation;
        $this->tag = $tag;
        $this->postTag = $postTag;
        $this->langConfig = config('languages.supported');
        $this->langDefault = config('languages.default');
        $this->typeParagraph = config('paragraph.posts');
        $this->configParagraph = config('paragraph.posts');
    }
    //
    public function index(Request $request)
    {
        $data = $this->post;
        if ($request->input('category')) {
            $categoryPostId = $request->input('category');
            $idCategorySearch = $this->categoryPost->getALlCategoryChildren($categoryPostId);
            $idCategorySearch[] = (int)($categoryPostId);
            $data = $data->whereIn('category_id', $idCategorySearch);
            $htmlselect = $this->categoryPost->getHtmlOption($categoryPostId);
        } else {
            $htmlselect = $this->categoryPost->getHtmlOption();
        }
        $where = [];
        if ($request->input('keyword')) {
            // $where[] = ['name', 'like', '%' . $request->input('keyword') . '%'];
            $data = $data->where(function ($query) {
                $idPostTran = $this->postTranslation->where([
                    ['name', 'like', '%' . request()->input('keyword') . '%']
                ])->pluck('post_id');
                // dd($idProTran);
                $query->whereIn('id', $idPostTran);
            });
        }
        if ($request->has('fill_action') && $request->input('fill_action')) {
            $key = $request->input('fill_action');
            switch ($key) {
                case 'hot':
                    $where[] = ['hot', '=', 1];
                    break;
                default:
                    break;
            }
        }
        if ($where) {
            $data = $data->where($where);
        }
        if ($request->input('order_with')) {
            $key = $request->input('order_with');
            switch ($key) {
                case 'dateASC':
                    $orderby = ['created_at'];
                    break;
                case 'dateDESC':
                    $orderby = [
                        'created_at',
                        'DESC'
                    ];
                    break;
                case 'viewASC':
                    $orderby = [
                        'view',
                        'ASC'
                    ];
                    break;
                case 'viewDESC':
                    $orderby = [
                        'view',
                        'DESC'
                    ];
                    break;
                default:
                    $orderby =  $orderby = [
                        'created_at',
                        'DESC'
                    ];
                    break;
            }
            $data = $data->orderBy(...$orderby);
        } else {
            $data = $data->orderBy('order')->orderBy("created_at", "DESC");
        }
        $data = $data->paginate(30);

        return view(
            "admin.pages.post.list",
            [
                'data' => $data,
                'option' => $htmlselect,
                'keyword' => $request->input('keyword') ? $request->input('keyword') : "",
                'order_with' => $request->input('order_with') ? $request->input('order_with') : "",
                'fill_action' => $request->input('fill_action') ? $request->input('fill_action') : "",
            ]
        );
    }


    public function create(Request $request = null)
    {
        $htmlselect = $this->categoryPost->getHtmlOption();
        $data = $this->categoryPost->with('translationsLanguage')->where('parent_id', 0)->orderBy("order")->get();
        $product = Product::get();
        $tacGia = Setting::where('parent_id', 538)->where('active', 1)->orderBy('order')->get();
        $url = URL::to('/');
        return view(
            "admin.pages.post.add",
            [
                'data' => $data,
                'tacGia' => $tacGia,
                'product' => $product,
                'url' => $url,
                'option' => $htmlselect,
                'request' => $request
            ]
        );
    }
    public function store(ValidateAddPost $request)
    {
        try {
            DB::beginTransaction();
            $category_id = [];
            $category_id = $request->input('category');
            $dataPostCreate = [
                //  "name" => $request->input('name'),
                //  "slug" => $request->input('slug'),
                "hot" => $request->input('hot') ?? 0,
                "setting_id" => $request->input('tacGia') ?? 0,
                "view" => $request->input('view') ?? 0,
                //  "description" => $request->input('description'),
                //  "description_seo" => $request->input('description_seo'),
                //  "title_seo" => $request->input('title_seo'),
                //   "content" => $request->input('content'),
                "order" => $request->input('order') ?? null,
                "active" => $request->input('active'),
                "category_id" => $category_id[0],
                "admin_id" => auth()->guard('admin')->id()
            ];
            if ($request->has('created_at') && $request->input('created_at')) {
                $dataPostCreate['created_at'] = $request->created_at;
            }
            $dataUploadAvatar = $this->storageTraitUpload($request, "avatar_path", "post");
            if (!empty($dataUploadAvatar)) {
                $dataPostCreate["avatar_path"] = $dataUploadAvatar["file_path"];
            }
            //dd($dataPostCreate);
            // insert database in posts table
            $post = $this->post->create($dataPostCreate);
            // dd($post);
            // insert database in postscate table
            if ($request->has("category")) {
                $category_ids = [];
                //dd($category_ids);
                foreach ($request->input('category') as $categoryItem) {
                    if ($categoryItem) {
                        $categoryInstance = $this->categoryPost->find($categoryItem);
                        $category_ids[] = $categoryInstance->id;
                    }
                }
                //dd($category_ids);

                $post_cate = $post->postscate()->attach($category_ids);
            }

            // insert data product lang
            $dataPostTranslation = [];
            //  dd($this->langConfig);
            foreach ($this->langConfig as $key => $value) {
                $itemPostTranslation = [];
                $itemPostTranslation['name'] = $request->input('name_' . $key);
                $itemPostTranslation['slug'] = $request->input('slug_' . $key);
                $itemPostTranslation['description'] = $request->input('description_' . $key);
                $itemPostTranslation['description_seo'] = $request->input('description_seo_' . $key);
                $itemPostTranslation['title_seo'] = $request->input('title_seo_' . $key);
                $itemPostTranslation['keyword_seo'] = $request->input('keyword_seo_' . $key);
                $itemPostTranslation['content'] = $request->input('content_' . $key);
                $itemPostTranslation['language'] = $key;
                //  dd($itemPostTranslation);
                $dataPostTranslation[] = $itemPostTranslation;
            }
            // dd($dataPostTranslation);
            // dd($post->translations());
            $postTranslation =   $post->translations()->createMany($dataPostTranslation);
            // dd($postTranslation);
            // insert database to post_tags table
            //Thêm slug vào bảng key
            foreach ($this->langConfig as $key => $value) {
                $itemKey = [];
                $itemKey['slug'] = $request->input('slug_' . $key);
                $itemKey['type'] = 2;
                $itemKey['language'] = $key;
                $itemKey['key_id'] = $post->id;
                $dataKey = Key::create($itemKey);
            }

            foreach ($this->langConfig as $key => $value) {
                if ($request->has("tags_" . $key)) {
                    $tag_ids = [];
                    foreach ($request->input('tags_' . $key) as $tagItem) {
                        $slug = Str::slug($tagItem);
                        $tagInstance = $this->tag->firstOrCreate([
                            "name" => $tagItem,
                            "slug" => $slug
                        ]);
                        $tag_ids[] = $tagInstance->id;
                    }
                    $post->tags()->attach($tag_ids, ['language' => $key]);
                }
            }

            if ($request->has('typeParagraph')) {
                $dataParagraphCreate = [];
                foreach ($request->input('typeParagraph') as $key => $typeParagraph) {
                    if ($typeParagraph) {
                        $dataParagraphCreateItem = [];
                        $dataParagraphCreateItem = [
                            "active" => $request->input('activeParagraph')[$key],
                            "type" => $typeParagraph,
                            "parent_id" => $request->input('parentIdParagraph')[$key] ?? 0,
                            "order" => $request->input('orderParagraph')[$key] ?? 0,
                            "admin_id" => auth()->guard('admin')->id()
                        ];

                        //  dd(count($request->image_path_paragraph));
                        //dd($request->hasFile('image_path_paragraph[0]'));
                        $dataUploadParagraphAvatar = $this->storageTraitUploadMutipleArray($request, "image_path_paragraph", $key, "post");
                        if (!empty($dataUploadParagraphAvatar)) {
                            $dataParagraphCreateItem["image_path"] = $dataUploadParagraphAvatar["file_path"];
                        }
                        $dataParagraphCreate[] = $dataParagraphCreateItem;
                        $paragraph = $post->paragraphs()->create(
                            $dataParagraphCreateItem
                        );

                        // insert data paragraph lang
                        $dataParagraphTranslation = [];
                        //  dd($this->langConfig);
                        foreach ($this->langConfig as $keyL => $valueL) {
                            $itemParagraphTranslation = [];
                            $itemParagraphTranslation['name'] = $request->input('nameParagraph_' . $keyL)[$key];
                            $itemParagraphTranslation['value'] = $request->input('valueParagraph_' . $keyL)[$key];
                            $itemParagraphTranslation['language'] = $keyL;
                            $dataParagraphTranslation[] = $itemParagraphTranslation;
                        }
                        // dd($dataParagraphTranslation);
                        $paragraphTranslation =   $paragraph->translations()->createMany($dataParagraphTranslation);
                        //  dd($paragraphTranslation);
                    }
                }
            }
            if ($request->has("product_post")) {
                $product_ids = $request->input('product_post');

                $data = [];
                foreach ($product_ids as $productItem) {
                    $data[] = [
                        'id_post' => $post->id,
                        'id_product' => $productItem
                    ];
                }
                //dd($data);
                DB::table('product_post')->insert($data);
            }

            // dd($post->tags);
            DB::commit();
            return redirect()->route('admin.post.index')->with("alert", "Thêm bài viết thành công");
        } catch (\Exception $exception) {
            //throw $th;
            dd($exception);
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.post.index')->with("error", "Thêm bài viết không thành công");
        }
    }
    public function edit($id)
    {
        $data = $this->post->find($id);
        $category_id = $data->category_id;
        $htmlselect = $this->categoryPost->getHtmlOption($category_id);
        $data_ed = $this->categoryPost->with('translationsLanguage')->where('parent_id', 0)->orderBy("order")->get();
        $categoryPostOfAdmin = PostCate::where('post_id', $data->id)->get()->pluck('category_id');
        $tacGia = Setting::where('parent_id', 538)->where('active', 1)->orderBy('order')->get();
        $url = URL::to('/');
        return view("admin.pages.post.edit", [
            'tacGia' => $tacGia,
            'data_ed' => $data_ed,
            'url' => $url,
            'categoryPostOfAdmin' => $categoryPostOfAdmin,
            'option' => $htmlselect,
            'data' => $data,
            'configParagraph' => $this->configParagraph
        ]);
    }
    public function update(ValidateEditPost $request, $id)
    {
        //dd($request->all());
        try {
            DB::beginTransaction();
            $category_id = [];
            $category_id = $request->input('category');
            $dataPostUpdate = [
                //  "name" => $request->input('name'),
                //   "slug" => $request->input('slug'),
                "hot" => $request->input('hot') ?? 0,
                "setting_id" => $request->input('tacGia') ?? 0,
                // "view" => $request->input('view'),
                // "description" => $request->input('description'),
                //  "description_seo" => $request->input('description_seo'),
                //  "title_seo" => $request->input('title_seo'),
                // "content" => $request->input('content'),
                "active" => $request->input('active'),
                "category_id" => $category_id[0],
                "admin_id" => auth()->guard('admin')->id(),
            ];
            if ($request->has('created_at') && $request->input('created_at')) {
                $dataPostUpdate['created_at'] = $request->created_at;
            }
            $dataUploadAvatar = $this->storageTraitUpload($request, "avatar_path", "post");
            if (!empty($dataUploadAvatar)) {
                $path = $this->post->find($id)->avatar_path;
                if ($path) {
                    Storage::delete($this->makePathDelete($path));
                }
                $dataPostUpdate["avatar_path"] = $dataUploadAvatar["file_path"];
            }

            // sua file
            $dataUploadFile = $this->storageTraitUpload($request, "file", "file");
            if (!empty($dataUploadFile)) {
                $path = $this->post->find($id)->file;
                if ($path) {
                    Storage::delete($this->makePathDelete($path));
                }
                $dataPostUpdate["file"] = $dataUploadFile["file_path"];
            }

            if ($request->input('deleteFile')) {
                $path1 = $this->post->find($id)->file;

                if ($path1) {
                    $dataPostUpdate["file"] = null;
                }
            }
            //dd($dataPostUpdate);
            // insert database in post table
            $this->post->find($id)->update($dataPostUpdate);
            $post = $this->post->find($id);

            if ($request->has("category")) {
                $category_ids = [];
                //dd($category_ids);
                foreach ($request->input('category') as $categoryItem) {
                    if ($categoryItem) {
                        $categoryInstance = $this->categoryPost->find($categoryItem);
                        $category_ids[] = $categoryInstance->id;
                    }
                }
                //dd($category_ids);
                $post_cate = $post->postscate()->sync($category_ids);
            }
            // insert data product lang
            $dataPostTranslationUpdate = [];
            foreach ($this->langConfig as $key => $value) {
                $itemPostTranslationUpdate = [];
                $itemPostTranslationUpdate['name'] = $request->input('name_' . $key);
                $itemPostTranslationUpdate['slug'] = $request->input('slug_' . $key);
                $itemPostTranslationUpdate['description'] = $request->input('description_' . $key);
                $itemPostTranslationUpdate['description_seo'] = $request->input('description_seo_' . $key);
                $itemPostTranslationUpdate['title_seo'] = $request->input('title_seo_' . $key);
                $itemPostTranslationUpdate['keyword_seo'] = $request->input('keyword_seo_' . $key);
                $itemPostTranslationUpdate['content'] = $request->input('content_' . $key);
                $itemPostTranslationUpdate['language'] = $key;

                if ($post->translationsLanguage($key)->first()) {
                    $post->translationsLanguage($key)->first()->update($itemPostTranslationUpdate);
                } else {
                    $post->translationsLanguage($key)->create($itemPostTranslationUpdate);
                }
            }
            //Sửa slug vào bảng key
            foreach ($this->langConfig as $key => $value) {
                $dataKey = Key::where('type', 2)->where('key_id', $post->id)->where('language', $key)->first();
                $itemKey = [];
                if ($dataKey) {
                    $itemKey['slug'] = $request->input('slug_' . $key);
                    $itemKey['type'] = 2;
                    $itemKey['language'] = $key;
                    $itemKey['key_id'] = $post->id;
                } else {
                    $itemKey['slug'] = $request->input('slug_' . $key);
                    $itemKey['type'] = 2;
                    $itemKey['language'] = $key;
                    $itemKey['key_id'] = $post->id;
                }

                if ($post->key($key)->first()) {
                    $post->key($key)->first()->update($itemKey);
                } else {
                    $post->key($key)->create($itemKey);
                }
            }

            // insert database to post_tags table

            $tag_ids = [];
            foreach ($this->langConfig as $key => $value) {

                if ($request->has("tags_" . $key)) {
                    foreach ($request->input('tags_' . $key) as $tagItem) {
                        $slug = Str::slug($tagItem);
                        $tagInstance = $this->tag->firstOrCreate([
                            "name" => $tagItem,
                            "slug" => $slug
                        ]);
                        $tag_ids[$tagInstance->id] = ['language' => $key];
                    }
                    //   $product->tags()->attach($tag_ids, ['language' => $key]);
                    // Các syncphương pháp chấp nhận một loạt các ID để ra trên bảng trung gian. Bất kỳ ID nào không nằm trong mảng đã cho sẽ bị xóa khỏi bảng trung gian.
                }
            }
            // dd($tag_ids);
            $post->tags()->sync($tag_ids);

            DB::commit();
            return redirect()->route('admin.post.index')->with("alert", "sửa bài viết thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.post.index')->with("error", "Sửa bài viết không thành công");
        }
    }
    public function updateProductPost(Request $request)
    {
        try {
            DB::beginTransaction();
            $productItem = $request->input('productItem');
            $post_id = $request->input('post_id');

            $existingRecord = DB::table('product_post')
                ->where('id_product', '=', $productItem)
                ->where('id_post', '=', $post_id)
                ->first();
            if ($existingRecord) {
                // Nếu cặp đã tồn tại, xóa bản ghi
                DB::table('product_post')
                    ->where('id_product', $productItem)
                    ->where('id_post', $post_id)
                    ->delete();
            } else {
                // Nếu cặp chưa tồn tại, thêm mới vào
                DB::table('product_post')->insert([
                    'id_product' => $productItem,
                    'id_post' => $post_id
                ]);
            }
            DB::commit();
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :'
                . $exception->getLine());
        }
    }

    public function coppy($id)
    {
        $data = $this->post->find($id);
        $data_ed = $this->categoryPost->with('translationsLanguage')->where('parent_id', 0)->orderBy("order")->get();
        $categoryPostOfAdmin = PostCate::where('post_id', $data->id)->get()->pluck('category_id');
        $category_id = $data->category_id;
        $htmlselect = $this->categoryPost->getHtmlOption($category_id);
        $url = URL::to('/');
        return view("admin.pages.post.coppy", [
            'option' => $htmlselect,
            'data_ed' => $data_ed,
            'url' => $url,
            'data' => $data,
            'data_ed' => $data_ed,
            'categoryPostOfAdmin' => $categoryPostOfAdmin,
            'configParagraph' => $this->configParagraph
        ]);
    }
    public function updateCoppy(ValidateEditPost $request, $id)
    {
        try {
            DB::beginTransaction();
            $category_id = [];
            $category_id = $request->input('category');
            $dataPostCreate = [
                //  "name" => $request->input('name'),
                //  "slug" => $request->input('slug'),
                "hot" => $request->input('hot') ?? 0,
                "setting_id" => $request->input('tacGia') ?? 0,
                "view" => $request->input('view') ?? 0,
                //  "description" => $request->input('description'),
                //  "description_seo" => $request->input('description_seo'),
                //  "title_seo" => $request->input('title_seo'),
                //   "content" => $request->input('content'),
                "order" => $request->input('order') ?? null,
                "active" => $request->input('active'),
                "category_id" => $category_id[0],
                "admin_id" => auth()->guard('admin')->id()
            ];
            if ($request->has('created_at') && $request->input('created_at')) {
                $dataPostCreate['created_at'] = $request->created_at;
            }
            $dataUploadAvatar = $this->storageTraitUpload($request, "avatar_path", "post");
            if (!empty($dataUploadAvatar)) {
                $dataPostCreate["avatar_path"] = $dataUploadAvatar["file_path"];
            }
            //dd($dataPostCreate);
            // insert database in posts table
            $post = $this->post->create($dataPostCreate);
            // dd($post);
            // insert database in postscate table
            if ($request->has("category")) {
                $category_ids = [];
                //dd($category_ids);
                foreach ($request->input('category') as $categoryItem) {
                    if ($categoryItem) {
                        $categoryInstance = $this->categoryPost->find($categoryItem);
                        $category_ids[] = $categoryInstance->id;
                    }
                }
                //dd($category_ids);

                $post_cate = $post->postscate()->attach($category_ids);
            }

            // insert data product lang
            $dataPostTranslation = [];
            //  dd($this->langConfig);
            foreach ($this->langConfig as $key => $value) {
                $itemPostTranslation = [];
                $itemPostTranslation['name'] = $request->input('name_' . $key);
                $itemPostTranslation['slug'] = $request->input('slug_' . $key);
                $itemPostTranslation['description'] = $request->input('description_' . $key);
                $itemPostTranslation['description_seo'] = $request->input('description_seo_' . $key);
                $itemPostTranslation['title_seo'] = $request->input('title_seo_' . $key);
                $itemPostTranslation['keyword_seo'] = $request->input('keyword_seo_' . $key);
                $itemPostTranslation['content'] = $request->input('content_' . $key);
                $itemPostTranslation['language'] = $key;
                //  dd($itemPostTranslation);
                $dataPostTranslation[] = $itemPostTranslation;
            }
            // dd($dataPostTranslation);
            // dd($post->translations());
            $postTranslation =   $post->translations()->createMany($dataPostTranslation);
            // dd($postTranslation);
            // insert database to post_tags table
            //Thêm slug vào bảng key
            foreach ($this->langConfig as $key => $value) {
                $itemKey = [];
                $itemKey['slug'] = $request->input('slug_' . $key);
                $itemKey['type'] = 2;
                $itemKey['language'] = $key;
                $itemKey['key_id'] = $post->id;
                $dataKey = Key::create($itemKey);
            }

            foreach ($this->langConfig as $key => $value) {
                if ($request->has("tags_" . $key)) {
                    $tag_ids = [];
                    foreach ($request->input('tags_' . $key) as $tagItem) {
                        $tagInstance = $this->tag->firstOrCreate(["name" => $tagItem]);
                        $tag_ids[] = $tagInstance->id;
                    }
                    $post->tags()->attach($tag_ids, ['language' => $key]);
                }
            }

            if ($request->has('typeParagraph')) {
                $dataParagraphCreate = [];
                foreach ($request->input('typeParagraph') as $key => $typeParagraph) {
                    if ($typeParagraph) {
                        $dataParagraphCreateItem = [];
                        $dataParagraphCreateItem = [
                            "active" => $request->input('activeParagraph')[$key],
                            "type" => $typeParagraph,
                            "parent_id" => $request->input('parentIdParagraph')[$key] ?? 0,
                            "order" => $request->input('orderParagraph')[$key] ?? 0,
                            "admin_id" => auth()->guard('admin')->id()
                        ];

                        //  dd(count($request->image_path_paragraph));
                        //dd($request->hasFile('image_path_paragraph[0]'));
                        $dataUploadParagraphAvatar = $this->storageTraitUploadMutipleArray($request, "image_path_paragraph", $key, "post");
                        if (!empty($dataUploadParagraphAvatar)) {
                            $dataParagraphCreateItem["image_path"] = $dataUploadParagraphAvatar["file_path"];
                        }
                        $dataParagraphCreate[] = $dataParagraphCreateItem;
                        $paragraph = $post->paragraphs()->create(
                            $dataParagraphCreateItem
                        );

                        // insert data paragraph lang
                        $dataParagraphTranslation = [];
                        //  dd($this->langConfig);
                        foreach ($this->langConfig as $keyL => $valueL) {
                            $itemParagraphTranslation = [];
                            $itemParagraphTranslation['name'] = $request->input('nameParagraph_' . $keyL)[$key];
                            $itemParagraphTranslation['value'] = $request->input('valueParagraph_' . $keyL)[$key];
                            $itemParagraphTranslation['language'] = $keyL;
                            $dataParagraphTranslation[] = $itemParagraphTranslation;
                        }
                        // dd($dataParagraphTranslation);
                        $paragraphTranslation =   $paragraph->translations()->createMany($dataParagraphTranslation);
                        //  dd($paragraphTranslation);
                    }
                }
            }
            if ($request->has("product_post")) {
                $product_ids = $request->input('product_post');

                $data = [];
                foreach ($product_ids as $productItem) {
                    $data[] = [
                        'id_post' => $post->id,
                        'id_product' => $productItem
                    ];
                }
                //dd($data);
                DB::table('product_post')->insert($data);
            }

            // dd($post->tags);
            DB::commit();
            return redirect()->route('admin.post.index')->with("alert", "Thêm bài viết thành công");
        } catch (\Exception $exception) {
            //throw $th;
            DB::rollBack();
            Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
            return redirect()->route('admin.post.index')->with("error", "Thêm bài viết không thành công");
        }
    }
    public function destroy($id)
    {
        Key::where([
            ['key_id', $id],
            ['type', 2]
        ])->delete();

        return $this->deleteTrait($this->post, $id);
    }

    public function destroyPostAvatar($id)
    {
        // dd($id);
        return $this->deleteAvatarTrait($this->post, $id);
    }

    // thêm sửa xóa đoạn văn
    public function loadParagraphPost(Request $request)
    {
        return $this->loadParagraph($request, $this->configParagraph);
    }

    public function loadParentParagraphPost($id, Request $request)
    {
        return $this->loadParentParagraph($this->post, $this->paragraphPost, $id, $request);
    }

    public function loadCreateParagraphPost($id)
    {
        return  $this->loadCreateParagraph($this->post, $id, $this->configParagraph);
    }

    public function loadEditParagraphPost($id, Request $request)
    {

        return $this->loadEditParagraph($this->paragraphPost, $this->configParagraph, $id);
    }

    public function storeParagraphPost(Request $request, $id)
    {
        return $this->storeParagraph($this->post, $this->configParagraph, $id,  $request);
    }
    public function updateParagraphPost(Request $request, $id)
    {
        return $this->updateParagraph($this->paragraphPost, $this->configParagraph, $id,  $request);
    }
    public function destroyParagraphPost($id)
    {
        return $this->deleteCategoryRecusiveTrait($this->paragraphPost, $id);
    }
    // end thêm sửa xóa đoạn văn

    public function loadActive($id)
    {
        $post   =  $this->post->find($id);
        $active = $post->active;
        if ($active) {
            $activeUpdate = 0;
        } else {
            $activeUpdate = 1;
        }
        $updateResult =  $post->update([
            'active' => $activeUpdate,
        ]);
        $post   =  $this->post->find($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-active', ['data' => $post, 'type' => 'bài viết'])->render(),
                "message" => "success"
            ], 200);
        } else {
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }
    public function loadHot($id)
    {
        $post   =  $this->post->find($id);
        $hot = $post->hot;

        if ($hot) {
            $hotUpdate = 0;
        } else {
            $hotUpdate = 1;
        }
        $updateResult =  $post->update([
            'hot' => $hotUpdate,
        ]);

        $post   =  $this->post->find($id);
        if ($updateResult) {
            return response()->json([
                "code" => 200,
                "html" => view('admin.components.load-change-hot', ['data' => $post, 'type' => 'bài viết'])->render(),
                "message" => "success"
            ], 200);
        } else {
            return response()->json([
                "code" => 500,
                "message" => "fail"
            ], 500);
        }
    }

    public function excelExportDatabase()
    {
        return Excel::download(new ExcelExportsDatabase(config('excel_database.post')), config('excel_database.post.excelfile'));
    }
    public function excelImportDatabase()
    {
        $path = request()->file('fileExcel')->getRealPath();
        Excel::import(new ExcelImportsDatabase(config('excel_database.post')), $path);
    }

    public function deleteAll(Request $request)
    {
        $idPost = $request->checkedValues;
        $model = $this->post;
        if ($idPost) {
            try {
                foreach ($idPost as $id) {
                    $model->find($id)->delete();
                    Key::where('key_id', $id)->delete();
                }
                return response()->json([
                    "code" => 200,
                    "message" => "success"
                ], 200);
            } catch (\Exception $exception) {
                Log::error('message' . $exception->getMessage() . 'line :' . $exception->getLine());
                return response()->json([
                    "code" => 500,
                    "message" => "fail"
                ], 500);
            }
        }
    }
}
