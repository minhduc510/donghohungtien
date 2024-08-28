@if (count($data) > 0)
    @foreach ($data as $item)
        <div class="clm" style="--w-lg: 3; --w-md: 6; --w-sm: 4; --w-xs: 6;">
            <div class="product-box">
                <div class="product-item">
                    <div class="product-img p-relative">
                        <a href="{{ $item->slug_full }}">
                            <img class="d-block" src="{{ asset($item->avatar_path ?? 'frontend/images/no_image.jpg') }}"
                                alt="{{ $item->name }}">
                        </a>
                        <div class="product-action clearfix hidden-xs d-flex js-center">
                            <a title="Xem nhanh" href="{{ $item->slug_full }}" data-handle="{{ $item->name }}"
                                class="xem_nhanh btn-circle btn_view btn right-to quick-view hidden-xs hidden-sm hidden-md">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a class="dat_mua buy-now" data-cart-list="{{ route('cart.list') }}"
                                data-post_id="{{ $item->id }}"
                                data-url="{{ route('cart.add', ['id' => $item->id]) }}"
                                data-start="{{ route('cart.add', ['id' => $item->id]) }}" data-quantity="1">
                                <i class="fas fa-dolly"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-content">
                        @if ($item->price && $item->old_price)
                            <div class="tit">
                                <span>Giảm
                                    {{ round((($item->old_price - $item->price) / $item->old_price) * 100) }}%</span>
                            </div>
                        @endif
                        <a href="{{ $item->slug_full }}">
                            <h3>{{ $item->name }}</h3>
                        </a>
                        <div class="price d-flex ai-center">
                            @if ($item->price > 0)
                                <div class="price-new">
                                    {{ number_format($item->price) }}đ
                                </div>
                            @else
                                <div class="price-new">Liên hệ</div>
                            @endif
                            @if ($item->price > 0 && $item->old_price > 0)
                                <del class="price-old">{{ number_format($item->old_price) }}đ</del>
                            @endif
                        </div>
                        <div class="star d-flex ai-center">
                            @php
                                $avgRating = 0;
                                $sumRating = array_sum(
                                    array_column($item->stars()->where('active', 1)->get()->toArray(), 'star'),
                                );
                                $countRating = count($item->stars()->where('active', 1)->get());
                                if ($countRating != 0) {
                                    $avgRating = $sumRating / $countRating;
                                }
                            @endphp
                            @if ($avgRating == 0)
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                        </path>
                                    </svg>
                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                        </path>
                                    </svg>
                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                        </path>
                                    </svg>
                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                        </path>
                                    </svg>
                                </li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                        </path>
                                    </svg>
                                </li>
                            @else
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $avgRating)
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path
                                                    d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                                </path>
                                            </svg>
                                        </li>
                                    @else
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path fill="#C0C0C0"
                                                    d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                                </path>
                                            </svg>
                                        </li>
                                    @endif
                                @endfor
                            @endif
                        </div>
                        <div class="view">
                            Lượt xem: {{ $item->view + 100 }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="clm" style="--w-lg: 12; --w-md: 12; --w-sm: 12; --w-xs: 12;">
        {{ $data->appends(request()->input())->links() }}
    </div>
@else
    <div class="clm" style="--w-lg: 12; --w-md: 12; --w-sm: 12; --w-xs: 12;">
        <strong>Không tìm thấy sản phẩm phù hợp!</strong>
    </div>
@endif
