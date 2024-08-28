<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Components\Recusive;
use Illuminate\Support\Facades\App;

class ProductParameter extends Model
{
    //
    protected $table="product_parameters";
    protected $guarded = [];

    public $parentId = "parent_id";

    protected $appends = ['breadcrumb'];

    public function getBreadcrumbAttribute()
    {
        $listIdParent = $this->getALlCategoryPostParent($this->attributes['id']);

        $allData = $this->find($listIdParent)->toArray();

        return $allData;
    }

    public function childs()
    {
        return $this->hasMany(ProductParameter::class, 'parent_id', 'id');
    }
    public function parent()
    {
        return $this->belongsTo(ProductParameter::class, 'parent_id', 'id');
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


    public function getALlCategoryProductChildren($id)
    {
        $data = self::all();
        $rec = new Recusive();
        return  $rec->categoryRecusiveAllChild($data, $id);
    }
    public function getALlCategoryPostParent($id)
    {
        $data = self::select('id', 'parent_id')->get();
        $rec = new Recusive();
        return  $rec->categoryRecusiveAllParent($data, $id);
    }
}
