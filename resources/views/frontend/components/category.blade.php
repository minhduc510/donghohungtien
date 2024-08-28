
  <ul class="menu-side-bar">
    {{-- <li class="nav_item"><a href="http://demo11.bivaco.net/cham-soc-da"><span>Chăm sóc da</span></a>
        <ul class="menu-side-bar-leve-2">
            <li class="nav_item1">
                <a href="http://demo11.bivaco.net/kem-tri-mun"><span>Kem trị mụn</span></a>
                <ul class="menu-side-bar-leve-3">
                    <li class="nav_item2">
                        <a href="http://demo11.bivaco.net/kem-tri-mun-eucerin"><span>Kem trị mụn Eucerin</span></a>
                    </li>
                </ul>
            </li>

        </ul>
    </li> --}}
    @foreach ($data as $value)
        @php
            $listIdChildren = $modelCategory->getALlCategoryChildrenAndSelf($value->id);
            $listItem=$modelCategory->select(['id'])->whereIn('id',$listIdChildren)->get();

            $listItemSlugFull = $listItem->map(function ($item, $key) {
                return $item->slug_full;
            });
        //   dd($listItemSlugFull->contains($urlActive));
        @endphp
        <li class="nav_item @if($listItemSlugFull->contains($urlActive)) active @endif">
            <a href="{{ makeLink($type,$value->id,$value->slug) }}"><span>{{ $value->name }}</span>
                @if ($value->childs->count())
                <i class="fa fa-angle-right pt_icon_right"></i>
                @endif
            </a>

            @if ($value->childs->count())
                <ul class="menu-side-bar-leve-2" @if($listItemSlugFull->contains($urlActive)) style="display:block" @endif>
                    @foreach ($value->childs()->orderby('order')->orderByDesc('created_at')->get() as $childValue)
                        @include('frontend.components.category-child', ['childs' => $childValue])
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>





