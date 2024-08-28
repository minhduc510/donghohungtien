

@foreach ($data->paragraphs()->where([['type', $typeKey], ['active', 1],['parent_id',0]])->orderby('order')->orderByDesc('created_at')->get()
    as $paragraph)
   @php
   $level = $loop->index + 1;
   $index =$loop->index + 1;
   @endphp

   <div id="para-{{ $typeKey . '-' . $level }}">
        <div class="name-p js-btn-show-content
        @if ($loop->first)
            active
        @endif">
            <span class="index">{{ $index }} </span>
            <h2 style="display: inline; font-weight: bold;">{!! $paragraph->name !!}</h2>
            <i class="fas fa-plus"></i>
        </div>
           <div class="content-p js-content"
           @if ($loop->first)
               style="display:block;"
           @endif>
            {!! $paragraph->value !!}
            @if ($paragraph->childs()->where([['active', 1], ['type', $typeKey]])->count())
                @foreach ($paragraph->childs()->where([['active', 1], ['type', $typeKey]])->orderby('order')->orderByDesc('created_at')->get()
                    as $childValue)
                    @include('frontend.components.paragraph.paragraph-content-child', ['childs' => $childValue])
                @endforeach
            @endif
         </div>
    </div>



@endforeach
