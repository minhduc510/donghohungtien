@if(isset($data) && count($data)>0)
@foreach($data as $item)
    <div class="item-permission mt-2 mb-2">
        <div class="form-check permission-title">
            <label class="form-check-label p-2">
                <input
                        type="checkbox"
                        class="form-check-input check-children check-product"
                        value="{{ $item->id }}"
                        name="product_product[]"
                >
                {{ $item->name??"" }}
            </label>
        </div>
    </div>
@endforeach
@endif
