<div class="text-left wrap-breadcrumbs">
    <div class="ctnr">
        <ul class="breadcrumb">
            <li class="breadcrumbs-item">
                <a href="{{ makeLink('home') }}">{{ __('home.home') }}</a>
                <span class="mr_lr">&nbsp;/&nbsp;</span>
            </li>
            @foreach ($breadcrumbs as $item)

            @if ($loop->last)

            <li class="breadcrumbs-item active"><a href="{{ makeLink($type,$item['id']??'',$item['slug']??'') }}" class="currentcat">{{ $item['name'] }}</a></li>
            @else

            <li class="breadcrumbs-item"><a href="{{ makeLink($type,$item['id']??'',$item['slug'])??'' }}" class="currentcat">{{ $item['name'] }}</a></li>
            @endif
            @endforeach
        </ul>
    </div>
</div>