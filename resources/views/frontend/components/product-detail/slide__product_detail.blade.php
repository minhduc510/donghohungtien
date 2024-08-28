<div class="slide__product_detail">
    <div class="carousel__product">
        <div class="f-carousel" id="myCarousel">
            @if( count($data->images()->get()) > 0)
                @foreach ($data->images()->get() as $item )         
                    <div class="f-carousel__slide" data-thumb-src="https://demo.aromayou.vn/{{$item['image_path']}}">
                        <a href="https://demo.aromayou.vn/{{$item['image_path']}}" data-fancybox="klnmn">
                            <img alt="" data-lazy-src="https://demo.aromayou.vn/{{$item['image_path']}}" />
                        </a>
                    </div>
                @endforeach 
            @else
                <div class="f-carousel__slide" data-thumb-src="https://demo.aromayou.vn/{{$data->avatar_path}}">
                    <a href="https://demo.aromayou.vn/{{$data->avatar_path}}" data-fancybox="klnmn">
                        <img alt="" data-lazy-src="https://demo.aromayou.vn/{{$data->avatar_path}}" />
                    </a>
                </div>
            @endif
            
        </div>
    </div>
</div>
