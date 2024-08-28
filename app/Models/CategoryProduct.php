<?php

namespace App\Models;

use App\Models\Product;
//use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Attribute;
use App\Components\Recusive;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    //
    //use SoftDeletes;
    protected $table = "category_products";
    public $parentId = "parent_id";
    protected $guarded = [];
    // protected $appends = [ 'name','slug','slug_full','description','description_seo','keyword_seo','title_seo','content','language'];
    protected $appends = ['slug_full', 'name', 'slug'];
    public function getBreadcrumbAttribute()
    {
        $listIdParent = $this->getALlCategoryParent($this->attributes['id']);
        $allData = $this->select('id')->find($listIdParent)->toArray();
        return $allData;
    }
    // tạo thêm thuộc tính name
    public function getNameAttribute()
    {
        return optional($this->translationsLanguage()->first())->name;
    }
    // tạo thêm thuộc tính slug
    public function getSlugAttribute()
    {
        return optional($this->key()->first())->slug;
    }
    public function getSlugFullAttribute()
    {
        return makeLink('checkKey', $this->attributes['id'], $this->getSlugAttribute());
    }
    // tạo thêm thuộc tính description
    public function getDescriptionAttribute()
    {
        return optional($this->translationsLanguage->first())->description;
    }
    // tạo thêm thuộc tính description_seo
    public function getDescriptionSeoAttribute()
    {
        return optional($this->translationsLanguage->first())->description_seo;
    }

    // tạo thêm thuộc tính keyword_seo
    public function getKeywordSeoAttribute()
    {
        return optional($this->translationsLanguage->first())->keyword_seo;
    }


    // tạo thêm thuộc tính title_seo
    public function getTitleSeoAttribute()
    {
        return optional($this->translationsLanguage->first())->title_seo;
    }

    // tạo thêm thuộc tính content
    public function getContentAttribute()
    {
        return optional($this->translationsLanguage->first())->content;
    }
    // tạo thêm thuộc tính content
    public function getLanguageAttribute()
    {
        return optional($this->translationsLanguage->first())->language;
    }

    // lấy số sản phẩm của danh mục
    // tạo thêm thuộc tính name
    public function getCountProductAttribute()
    {
        $pro = new Product();
        $listId = $this->getALlCategoryChildrenAndSelf($this->attributes['id']);
        $count = $pro->whereIn('category_id', $listId)->count();
        return $count;
    }

    public static function getHtmlOption($parentId = "")
    {
        $data = self::all();
        $rec = new Recusive();
        // $prId=$this->parentId;
        return  $rec->categoryRecusive($data, 0, "parent_id", $parentId, "", "");
    }
    public static function getHtmlOptionEdit($parentId = "", $id)
    {
        $data = self::all()->where('id', '<>', $id);
        $rec = new Recusive();
        // $prId=$this->parentId;
        return  $rec->categoryRecusive($data, 0, "parent_id", $parentId, "", "");
    }

    // lấy html option có danh mục cha là $Id
    public static function getHtmlOptionAddWithParent($id)
    {

        $data = self::all();
        $parentId = $id;
        $rec = new Recusive();
        // $prId=$this->parentId;
        return  $rec->categoryRecusive($data, 0, "parent_id", $parentId, "", "");
    }

    // lấy thuộc tính sản phẩm
    public function cateProSups()
    {
        return $this
            ->belongsToMany(Supplier::class, CategoryProductSupplier::class, 'category_product_id', 'supplier_id')
            ->withTimestamps();
    }
    public function cateProSupsLanguage($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }
        return $this
            ->belongsToMany(Supplier::class, CategoryProductSupplier::class, 'category_product_id', 'supplier_id')
            ->withTimestamps()->where('language', '=', $language);
    }

    public function categoryParts()
    {
        return $this
            ->belongsToMany(Attribute::class, CategoryProductPart::class, 'category_product_id', 'attribute_id')
            ->withTimestamps();
    }
    public function categoryPartsLanguage($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }
        return $this
            ->belongsToMany(Attribute::class, CategoryProductPart::class, 'category_product_id', 'attribute_id')
            ->withTimestamps()->where('language', '=', $language);
    }
    public function categoryAttributes()
    {
        return $this
            ->belongsToMany(Attribute::class, CategoryProductAttribute::class, 'category_product_id', 'attribute_id')
            ->withTimestamps();
    }
    public function categoryAttributesLanguage($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }
        return $this
            ->belongsToMany(Attribute::class, CategoryProductAttribute::class, 'category_product_id', 'attribute_id')
            ->withTimestamps()->where('language', '=', $language);
    }

    // get admin_id was created category_product
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
    // get product was created category_product
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
    public function childs()
    {
        return $this->hasMany(CategoryProduct::class, 'parent_id', 'id');
    }
    public function parent()
    {
        return $this->belongsTo(CategoryProduct::class, 'parent_id', 'id');
    }

    // lấy tất cả sản phẩm thuộc danh mục này ở bảng ProductForCategory
    public function productForCategory()
    {
        return $this
            ->belongsToMany(Product::class, ProductForCategory::class, 'category_id', 'product_id')
            ->withTimestamps();
    }

    public function getALlCategoryChildren($id)
    {
        $data = self::all();
        $rec = new Recusive();
        return  $rec->categoryRecusiveAllChild($data, $id);
    }
    public function getALlCategoryChildrenAndSelf($id)
    {
        $data = self::select('id', 'parent_id')->get();
        $rec = new Recusive();
        $arrID = $rec->categoryRecusiveAllChild($data, $id);
        array_unshift($arrID, $id);
        return  $arrID;
    }
    public function getALlCategoryParent($id)
    {
        $data = self::select('id', 'parent_id')->get();
        $rec = new Recusive();
        return  $rec->categoryRecusiveAllParent($data, $id);
    }
    public function getALlCategoryParentAndSelf($id)
    {
        $data = self::select('id', 'parent_id')->get();
        $rec = new Recusive();
        $arrID = $rec->categoryRecusiveAllParent($data, $id);
        array_push($arrID, $id);
        return  $arrID;
    }

    public function translationsLanguage($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }
        return $this->hasMany(CategoryProductTranslation::class, "category_id", "id")->where('language', '=', $language);
    }

    public function translations()
    {
        return $this->hasMany(CategoryProductTranslation::class, "category_id", "id");
    }



    public function getALlModelCategoryChildrenAndSelf($parent, $limit = null, $data = null)
    {
        $id = $parent->id;
        if (!$data) {
            $data = $this->with(['translationsLanguage' => function ($query) {
                return $query->select(['name', 'slug']);
            }])->where('active', 1)->orderby('order')->latest()->get();
        }
        $rec = new Recusive();
        $parent = $parent->toArray();
        $parent['childs'] = $rec->categoryModelRecusiveAllChild($data, $id, $limit);
        // $arrID = $rec->categoryModelRecusiveAllChild($data, $id,$limit);
        // array_unshift($arrID, $id);
        return  $parent;
    }
    public function getALlModelCategoryChildren($id, $limit = null, $data = null)
    {
        if (!$data) {
            $data = $this->with(['translationsLanguage' => function ($query) {
                return $query->select(['name', 'slug']);
            }])->where('active', 1)->orderby('order')->latest()->get();
        }
        $rec = new Recusive();
        return  $rec->categoryModelRecusiveAllChild($data, $id, $limit);
    }

    public function getALlModelAdminCategoryChildrenAndSelf($parent, $limit = null, $data = null)
    {
        $id = $parent->id;
        if (!$data) {
            $data = $this->with(['translationsLanguage' => function ($query) {
                return $query->select(['name', 'slug']);
            }])->orderby('order')->latest()->get();
        }
        $rec = new Recusive();
        $parent = $parent->toArray();
        $parent['childs'] = $rec->categoryModelRecusiveAllChild($data, $id, $limit);
        // $arrID = $rec->categoryModelRecusiveAllChild($data, $id,$limit);
        // array_unshift($arrID, $id);
        return  $parent;
    }
    public function getALlModelAdminCategoryChildren($id, $limit = null, $data = null)
    {
        if (!$data) {
            $data = $this->with(['translationsLanguage' => function ($query) {
                return $query->select(['name', 'slug']);
            }])->orderby('order')->latest()->get();
        }
        $rec = new Recusive();
        return  $rec->categoryModelRecusiveAllChild($data, $id, $limit);
    }
    public function key($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }
        return $this->hasMany(Key::class, "key_id", "id")->where('type', 3)->where('language', '=', $language);
    }
    public function productsByCategory()
    {
        return $this->belongsToMany(Product::class, "product_for_categorys", "category_id", "product_id");
    }
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, "category_product_attribute", "category_product_id", "attribute_id");
    }
    public function categoryFilterAttributeMenu()
    {
        return $this->belongsToMany(Attribute::class, "category_filter_attribute_menu", "category_id", "attribute_id");
    }
}
