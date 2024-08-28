@php
$level .= '-' . ($loop->index + 1);
$index .='.'.($loop->index + 1);
@endphp
<div id="para-{{ $typeKey . '-' . $level }}">

    <div class="name-p2"><span class="index2">{{ $index }} </span> <span>{!! $childs->name !!}</span></div>
    <div class="content-p2" style="display: block;">
     {!! $childs->value !!}
     @if ($childs->childs()->where([['active', 1], ['type', $typeKey]])->count())
        @foreach ($childs->childs()->where([['active', 1], ['type', $typeKey]])->orderby('order')->orderByDesc('created_at')->get()
        as $childValue2)
            @include('frontend.components.paragraph2-content-child', ['childs' => $childValue2])
        @endforeach
    @endif
  </div>
</div>

