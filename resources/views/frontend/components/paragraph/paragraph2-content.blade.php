

@foreach ($data->paragraphs()->where([['type', $typeKey], ['active', 1],['parent_id',0]])->orderby('order')->orderByDesc('created_at')->get()
    as $paragraph)
   @php
   $level = $loop->index + 1;
   $index =$loop->index + 1;
   @endphp

   <div id="para-{{ $typeKey . '-' . $level }}">
        <div class="name-p2">
            <span class="index2">{{ $index }} </span>
            <span>{!! $paragraph->name !!}</span>
        </div>
           <div class="content-p2">
            {!! $paragraph->value !!}
            @if ($paragraph->childs()->where([['active', 1], ['type', $typeKey]])->count())
                @foreach ($paragraph->childs()->where([['active', 1], ['type', $typeKey]])->orderby('order')->orderByDesc('created_at')->get()
                    as $childValue)
                    @include('frontend.components.paragraph.paragraph2-content-child', ['childs' => $childValue])
                @endforeach
            @endif
         </div>
    </div>



@endforeach
