<a class="btn btn-sm {{ $data->sale == 1 ? 'btn-danger' : 'btn-info' }} lb-hot" data-value="{{ $data->sale }}"
    data-type="{{ $type ? $type : '' }}"
    style="width:63px;">{{ $data->sale == 1 ? 'Khuyến mại' : 'Không khuyến mại' }}</a>
