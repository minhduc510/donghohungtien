@foreach ($data as $sliderItem)
    <tr>
        <td>{{ $sliderItem->id }}</td>
        <td>{{ $sliderItem->name }}</td>
        <td class="w-50">{!! $sliderItem->description !!}</td>
        <td><img src="{{ asset($sliderItem->image_path) }}" alt="{{ $sliderItem->name }}" style="width:80px;"></td>
        <td>
            {{ config('web_default.type_slider.' . $sliderItem->type) ?? '' }}
        </td>
        <td> <input data-url="{{ route('admin.loadOrderVeryModel', ['table' => 'sliders', 'id' => $sliderItem->id]) }}"
                class="lb-order text-center" type="number" min="0"
                value="{{ $sliderItem->order ? $sliderItem->order : 0 }}" style="width:50px" /></td>
        <td class="wrap-load-active" data-url="{{ route('admin.slider.load.active', ['id' => $sliderItem->id]) }}">
            @include('admin.components.load-change-active', [
                'data' => $sliderItem,
                'type' => 'slider',
            ])
        </td>
        <td>
            <a href="{{ route('admin.slider.edit', ['id' => $sliderItem->id]) }}"
                class="btn btn-sm btn-success tooltip11"><i class="fas fa-edit"></i><span
                    class="tooltiptext">Sửa</span></a>
            <a data-url="{{ route('admin.slider.destroy', ['id' => $sliderItem->id]) }}"
                class="btn btn-sm btn-danger lb_delete tooltip11"><i class="far fa-trash-alt"></i><span
                    class="tooltiptext">Xóa</span></a>
        </td>
    </tr>
@endforeach
