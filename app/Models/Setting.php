<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Components\Recusive;
use Illuminate\Support\Facades\App;

class Setting extends Model
{
    //
    protected $table = "settings";
    protected $guarded = [];
    public $parentId = "parent_id";

    protected $appends = ['breadcrumb', 'name', 'slug', 'value', 'description', 'language'];
    public function getBreadcrumbAttribute()
    {
        $listIdParent = $this->getALlCategoryPostParent($this->attributes['id']);
        $allData = $this->select('id')->find($listIdParent)->toArray();
        // dd($allData);
        return $allData;
    }


    // tạo thêm thuộc tính name
    public function getNameAttribute()
    {
        //  dd($this->translationsLanguage()->first()->name);
        return optional($this->translationsLanguage()->first())->name;
    }
    // tạo thêm thuộc tính content
    public function getContentAttribute()
    {
        //  dd($this->translationsLanguage()->first()->name);
        return optional($this->translationsLanguage()->first())->content;
    }
    // tạo thêm thuộc tính slug
    public function getValueAttribute()
    {
        return optional($this->translationsLanguage()->first())->value;
    }
    // tạo thêm thuộc tính slug
    public function getSlugAttribute()
    {
        return optional($this->translationsLanguage()->first())->slug;
    }
    // tạo thêm thuộc tính description
    public function getDescriptionAttribute()
    {
        return optional($this->translationsLanguage()->first())->description;
    }
    public function getPriceShipAttribute()
    {
        return optional($this->translationsLanguage()->first())->price_ship;
    }
    public function getFreeShipAttribute()
    {
        return optional($this->translationsLanguage()->first())->free_ship;
    }
    // tạo thêm thuộc tính content
    public function getLanguageAttribute()
    {
        return optional($this->translationsLanguage()->first())->language;
    }

    public function translationsLanguage($language = null)
    {
        if ($language == null) {
            $language = App::getLocale();
        }
        return $this->hasMany(SettingTranslation::class, "setting_id", "id")->where('language', '=', $language);
    }
    public function translations()
    {
        return $this->hasMany(SettingTranslation::class, "setting_id", "id");
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
    public function childs()
    {
        return $this->hasMany(Setting::class, 'parent_id', 'id');
    }
    public function parent()
    {
        return $this->belongsTo(Setting::class, 'parent_id', 'id');
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
