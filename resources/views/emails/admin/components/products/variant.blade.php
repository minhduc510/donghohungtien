<div>
    @foreach ($variants as $key => $variant)
    @php
        $value ='';
    @endphp
    @foreach ($variant as $key1 => $item)
        @php 
            $value = $value . $item['id'];
        @endphp
        @if ($key1+1 < count($variant))
            @php 
                $value = $value . '-';
            @endphp
        @endif
    @endforeach
    <div class="variant variants-{{$key}}">
        <div>
            <input type="checkbox" name="variants[]" value="{{$value}}">
        </div>
        <div class="list-item">
            @foreach ($variant as $key1 => $item)
                <span class="item" id="{{$item['id']}}">{{ $item['name'] }}</span> 
                @if ( ($key1+1) < count($variant)) 
                /
                @endif
            @endforeach
        </div>
    </div>
    @endforeach
</div>