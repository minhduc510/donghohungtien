

  <ol class="breadcrumb mb-0">
    @foreach ($breadcrumbs as $item)
    @if ($loop->last)
    <li class="breadcrumb-item active ">{{ $item['name'] }}</li>
    @else()
    <li class="breadcrumb-item"><a href="#">{{ $item['name'] }}</a></li>
    @endif

    @endforeach
  </ol>

