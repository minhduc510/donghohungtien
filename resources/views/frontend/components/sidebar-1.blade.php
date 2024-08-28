@if($category->parent_id == 0)

@else
@if($category->childs->count() >0)
@else
<div class="wrap-fill">
    {{-- @isset($sidebar['supplier'])
    <div class="box-list-fill">
        <div class="title-s">
            Thương hiệu <i class="fas fa-minus"></i>
        </div>
        <ul class="fill-list-item"  style="display: block;">
            @foreach ( $sidebar['supplier'] as $supplierItem)
            <li>

                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" name="supplier_id[]" form="formfill" class="form-check-input field-form" value="{{ $supplierItem->id }}"
                        @if (request()->has('supplier_id')&&collect(request()->input('supplier_id'))->contains($supplierItem->id))
                        selected
                        @endif>
                        <img src="{{ $supplierItem->logo_path }}" alt="{{ $supplierItem->name }}">
                    </label>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    @endisset --}}
    
    @php
        $categoryPModel=new App\Models\CategoryProduct();
        
        $listCategoryProduct=$categoryPModel->where('parent_id',$category->parent_id)->orderby('order')->latest()->get();
        
        // dd($listCategoryProduct);
        // dd($category)
    @endphp

    
    <div class="form-group">
        <select name=""  class="form-control field-change-link" >
            {{-- <option value="">DANH MỤC SẢN PHẨM</option> --}}
            @foreach ($listCategoryProduct as $categoryItem)

               <option value="{{ $categoryItem->id==$category->id?'':$categoryItem->slug_full  }}" {{ $categoryItem->id==$category->id?'selected':'' }}>{{ $categoryItem->name }}</option>

            @endforeach

            
        </select>
    </div>

    {{-- <div class="form-group">
        <select name="orderby" id="" class="form-control field-form" form="formfill">
            <option value="0">Sắp sếp theo</option>
            <option value="5">Tên từ A-Z</option>
            <option value="6">Tên từ Z-A</option>
            <option value="1">Giá: tăng dần</option>
            <option value="2">Giá: giảm dần</option>
        </select>
    </div> --}}
    {{--
    <div class="form-group">
        <select form="formfill" class="form-control field-form" name="price" >
            <option value="">KHOẢNG GIÁ</option>
            @foreach ( $priceSearch as $item)
             <option value="{{ $item['value'] }}" @if (isset($price)) {{ $item['value']==$price?"selected":"" }} @endif >
              {{ $item['end']? ($item['start']? 'Từ '.number_format($item['start']) :"Nhỏ hơn".number_format($item['end'])):""}}  {{ $item['start']? ($item['end']? 'đến '.number_format($item['end']):'> '.number_format($item['start'])):"" }}
           </option>
           <option value="{{ $item['value'] }}" {{ $item['value']==($priceS??"")?"selected":"" }}>
              {{ $item['name'] }}
            </option>
           @endforeach
        </select>
    </div>
    --}}
    @isset($sidebar['attribute'])
        @foreach ( $sidebar['attribute'] as $attributeItem)
        <div class="form-group">
            <select  name="attribute_id[{{ $attributeItem->id }}][]" form="formfill" class="form-control field-form">
                <option value="">{{ $attributeItem->name }}</option>
                @foreach ( $attributeItem->childs()->orderby('order')->get() as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        @endforeach
    @endisset
   {{--<div class="form-group">
    <select name="orderby" id="" class="form-control field-form" form="formfill">
        <option value="0">SẮP XẾP THEO</option>
        <option value="1">Giá tăng dần</option>
        <option value="2">Giá giảm dần</option>
         <option value="3">Sale tăng dần</option>
        <option value="4">Sale giảm dần</option> 
    </select>
   </div>--}}
</div>
@endif
@endif

