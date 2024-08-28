@if($data->count()>0)
<h3>Sản phẩm đã xem</h3>
<span class="is-divide"></span>
<ul class="product-ca">
    @foreach($data as $product)
    <li>
        <a href="{{ $product->slug_full }}">
            <img width="100" height="100" src="{{ $product->avatar_path }}" class="attachment-woocommerce_gallery_thumbnail size-woocommerce_gallery_thumbnail" alt="{{ $product->name }}" loading="lazy" sizes="(max-width: 100px) 100vw, 100px">		
            <span class="product-title">{{ $product->name }}</span>
        </a>
        @if($product->old_price & $product->price)
        <del aria-hidden="true">
            <span class="woocommerce-Price-amount amount">
                <bdi>{{ number_format($product->old_price) }}<span class="woocommerce-Price-currencySymbol">₫</span>
                </bdi>
            </span>
        </del>
        @endif 
        <ins>
            <span class="woocommerce-Price-amount amount">
                <bdi>{{ number_format($product->price)??'Liên hệ' }}<span class="woocommerce-Price-currencySymbol">₫</span>
                </bdi>
            </span>
        </ins>
    </li>
    @endforeach
</ul>
@endif