@php
if(!isset($urlActive)){
    $urlActive=url()->current();
}



@endphp
<div id="side-bar">
    @isset($product)
        @if ($product)
            <div class="side-bar">
                {{-- {{dd($categoryProduct)}} --}}
                @foreach ($categoryProduct as $categoryItem)
                <div class="title-sider-bar">
                    {{ $categoryItem->name }} ({{ $categoryItem->count_product }})
                </div>
                <div class="list-category">
                    {{-- @if()

                    @else --}}
                        @include('frontend.components.category-product',[
                            'data'=>$categoryItem->setAppends(['count_product'])->childs()->orderby('order')->orderByDesc('created_at')->get(),
                            'type'=>"category_products",
                            //  $modelCategory=new \App\Models\CategoryProduct(),
                            'categoryActive'=>$categoryProductActive,
                        ])
                    {{-- @endif --}}
                    
                </div>
                @endforeach
            </div>
        @endif
    @endisset
    @isset($post)
        @if ($post)
            <div class="side-bar">
                @foreach ($categoryPost as $categoryItem)
                <div class="title-sider-bar">
                    {{ $categoryItem->name }}
                </div>
                <div class="list-category">
                    @include('frontend.components.category',[
                        'data'=>$categoryItem->childs()->orderby('order')->orderByDesc('created_at')->get(),
                        'type'=>"category_posts",
                         $modelCategory=new \App\Models\CategoryPost(),
                    ])
                </div>
                @endforeach
            </div>
        @endif
    @endisset
    @isset($fill)
        @if ($fill)
        <div class="side-bar">
            <div class="title-sider-bar">
                Lọc sản phẩm
            </div>
            <div class="list-fill">
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

                @isset($sidebar['attribute'])
                    @foreach ( $sidebar['attribute'] as $attributeItem)
                    <div class="box-list-fill">
                        <div class="title-s">
                        {{ $attributeItem->name }} <i class="fas fa-minus btn-sb-toogle"></i>
                        </div>
                        <ul class="fill-list-item" style="display: block;">
                            @foreach ( $attributeItem->childs()->orderby('order')->get() as $item)
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" name="attribute_id[{{ $attributeItem->id }}][]" form="formfill" class="form-check-input field-form" value="{{ $item->id }}"> {{ $item->name }}
                                    </label>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach

                @endisset

                {{-- <div class="box-list-fill">
                    <div class="title-s">
                    Loại sản phẩm <i class="fas fa-minus btn-sb-toogle"></i>
                    </div>
                    <ul class="fill-list-item" style="display: block;">
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" name="attribute_id[1][]" form="formfill" class="form-check-input field-form" value="1"> Phong thủy
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" name="attribute_id[1][]" form="formfill" class="form-check-input field-form" value="1"> Thời trang
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="box-list-fill">
                    <div class="title-s">
                      Bản mệnh phù hợp <i class="fas fa-minus btn-sb-toogle"></i>
                    </div>
                    <div class="fill-list-item" style="display: block;">
                        <select name="attribute_id[1][]" form="formfill" class="form-control field-form">
                            <option value="">1990</option>
                            <option value="">1991</option>
                        </select>
                    </div>
                </div> --}}
            </div>
        </div>
        @endif
    @endisset

    {{-- @if (isset($sidebar['product'])&&$sidebar['product'])
    <div class="side-bar">
        <div class="title-sider-bar">
            Sản phẩm được quan tâm
        </div>
        <div class="list-trending">
            <ul>
                @foreach ($sidebar['product'] as $item)
                <li>
                    <div class="box">
                        <div class="icon">
                            <a href="{{ $item->slug_full }}"><img src="{{ $item->avatar_path }}" alt="{{ $item->name }}"></a>
                        </div>
                        <div class="content">
                            <h3 class="name"><a href="{{ $item->slug_full }}">
                                {{ $item->name }} </a>
                            </h3>
                            <div class="price">
                                @if ($item->price_after_sale)
                                {{ number_format($item->price_after_sale) }} đ
                                @else
                                Liên hệ
                                @endif

                            </div>

                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif



    @if (isset($sidebar['uudiem'])&&$sidebar['uudiem'])
    <div class="side-bar">

        <div class="list-uudiem">
            <ul>
                @foreach ($sidebar['uudiem']->childs()->orderby('order')->get() as $item)
                <li class="uudiem-item">
                    <div class="icon">
                        <img src="{{ $item->image_path }}" alt="{{ $item->name }}">
                    </div>
                    <div class="content">
                        <h3>{{ $item->name }}</h3>
                        <div class="desc">
                            {{ $item->value }}
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
    @if (isset($sidebar['banner'])&&$sidebar['banner'])
    <div class="side-bar-banner">
        <a href="{{ $sidebar['banner']->slug }}"><img src="{{ $sidebar['banner']->image_path }}" alt="{{ $sidebar['banner']->name }}"></a>
    </div>
    @endif --}}

</div>


