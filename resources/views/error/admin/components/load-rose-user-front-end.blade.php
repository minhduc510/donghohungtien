<div class="card card-outline card-primary">
    <div class="card-header">Danh sách hoa hồng</div>
    <div class="card-body table-responsive p-0 lb-list-category">
        <table class="table table-head-fixed">
            <thead>
                <tr>
                  <th>Hoa hồng</th>
                  <th>Nhận từ</th>
                  <th>Thời gian</th>
                  <th>Ghi chú</th>
                </tr>
              </thead>
              <tbody>

                @isset($rose)
                    @if ($rose->count()>0)
                        @foreach ($rose as $item)
                        <tr>
                            <td>{{ $item->point }}</td>
                            <td>
                                @if ($item->userorigin_id)


                                    <a href="{{ route('admin.user_frontend.detail',['id'=>$item->userOriginPoint->id]) }}"> {{ $item->userOriginPoint->name }}</a>
                                @endif
                            </td>
                            <td>{{ date_format($item->created_at,'d/m/Y H:i:s') }}</td>
                            <td>{{ $typePoint[$item->type]['name'] }}</td>
                        </tr>
                        @endforeach
                    @else
                    <tr class="text-center"><td class="p-3" colspan="4">Chưa có hoa hồng</td></tr>
                    @endif
                @endisset

              </tbody>
        </table>
    </div>
</div>

{{ $rose->appends('type','rose-user_frontend')->links() }}
