@php
$level .='-'.($loop->index + 1);
$index .='.'.($loop->index + 1);
@endphp

<li>
    <a href="#para-{{ $typeKey . '-' . ($level) }}"><span class="index2">{{ $index }} </span> {!! $childs->name !!}</a>
    @if ($childs->childs()->where([
        ['active',1],
        ['type', $typeKey]
    ])->count())
        <ul>
            @foreach ($childs->childs()->where([
                ['active',1],
                ['type', $typeKey]
            ])->orderby('order')->orderByDesc('created_at')->get() as $childValue2)
                @include('frontend.components.paragraph2-child', ['childs' => $childValue2])
            @endforeach
        </ul>
    @endif
</li>

