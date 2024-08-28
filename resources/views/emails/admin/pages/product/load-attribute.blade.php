{{-- <div style="border: 1px solid; padding: 5px;">
    <div class="row">
        <div class="col-md-12">
            <div style="height: 750px; overflow: auto;border: 1px solid #eee;font-size: 12px;line-height: 18px;">
                @foreach ($attributes as $item)
                    <div class="item-permission mt-2 mb-2">
                        <div class="form-check permission-title">
                            <label class="form-check-label p-3">
                                {{ $item->name }}
                            </label>
                        </div>
                        @if (count($item->childs) > 0)
                            <div class="list-permission p-3 pl-4">
                                @foreach ($item->childs()->where('active', 1)->orderBy('order')->get() as $i)
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox"
                                                class="form-check-input check-attribute check-children"
                                                name="attribute[]" value="{{ $i->id }}"
                                                @if ($categoryAttrOfAdmin && $categoryAttrOfAdmin->contains($i->id)) {{ 'checked' }} @endif
                                                >
                                            {{ $i->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div> --}}


<div style="border: 1px solid; padding: 5px;">
    <div class="row">
        <div class="col-md-12">
            <div style="height: 750px; overflow: auto; border: 1px solid #eee; font-size: 12px; line-height: 18px;">
                @foreach ($attributes as $item)
                    <div class="item-permission mt-2 mb-2">
                        <div class="form-check permission-title">
                            <label class="form-check-label p-3">
                                {{ $item->name }}
                            </label>
                        </div>
                        @if (count($item->childs) > 0)
                            <div class="list-permission p-3 pl-4">
                                @foreach ($item->childs()->where('active', 1)->orderBy('order')->get() as $i)
                                    @if (is_null($requestId))
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox"
                                                    class="form-check-input check-attribute check-children"
                                                    name="attribute[]" value="{{ $i->id }}"
                                                    @if (in_array($i->id, $attribute_product)) {{ 'checked' }} @endif>
                                                {{ $i->name }}
                                            </label>
                                        </div>
                                    @else
                                        @if (in_array($i->id, $attribute_ids))
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox"
                                                        class="form-check-input check-attribute check-children"
                                                        name="attribute[]" value="{{ $i->id }}"
                                                        @if (in_array($i->id, $attribute_product)) {{ 'checked' }} @endif>
                                                    {{ $i->name }}
                                                </label>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
