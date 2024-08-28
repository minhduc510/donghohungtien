@isset($data)
    @if (isset($countProduct) && $countProduct)
        {{--
        <h2 class="count-search">Đã tìm thấy {{ $countProduct??0 }} sản phẩm</h2>
      --}}
    @else
        <h2 class="count-search">Không tìm thấy sản phẩm nào</h2>
    @endif
    <div class="content-wrapper">
    <div class="main">
        <div class="block-product">
            <div class="section_product_hot">
                <div class="ctnr">
                    <div class="col-lg-12">
                        <div class="box-pro-right" >
                            <div class="list_pro row" style="margin: 0;" id="dataProductSearch">
                                @foreach($data as $key => $product)
                                <div class="item col-lg-3 col-md-3 col-sm-6 col-6">
                                    <div class="box box-pro">
                                        <div class="image">
                                            <a href="{{ $product->slug_full }}">
                                                <img src="{{ $product->avatar_path }}" alt="{{ $product->name }}">
                                            </a>
                                        </div>
                                        <div class="info cart-item {{$product->id}}-{{ $key }}">
                                            <h3 style="font-size: 14px"><a href="{{ $product->slug_full }}">{{ $product->name }}</a></h3>
                                            <div class="wapper-price">
                                                @if($product->price && $product->old_price)
                                                <span class="price-old">{{ number_format($product->old_price) }}{{ $unit  }}</span>
                                                @endif
                                                @if($product->price)
                                                <span class="price-new">{{ number_format($product->price) }}{{ $unit  }}</span>
                                                @else
                                                <span class="price-new">{{ __('home.lien_he') }}</span>
                                                @endif
                                            </div>
                                           
                                            <div class="buy">
                                                <button type="submit" class="single_add_to_cart_button" style="width: 100%;
                                                background: #ee484a;
                                                padding: 5px;
                                                border: 1px solid #fff;
                                                border-radius: 15px;
                                                margin-top: 10px;
                                                color: #ffffff;
                                                font-size: 13px;
                                                font-weight: 500;
                                                text-transform: uppercase;
                                                transition: all .7s ease-in-out;">
                                                    <a class="add-to-cart" id="addCart" 
                                                    data-url="{{ route('cart.add', ['id' => $product->id]) }}?quantity=1"
                                                        data-start="{{ route('cart.add', ['id' => $product->id]) }}">
                                                        {{ __('home.them_vao_gio_hang') }}
                                                    </a>
                                                </button>
                                            </div>
                                          
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-md-12">
        @if (count($data))
            {{ $data->appends(request()->all())->links() }}
        @endif
    </div>
@endisset
