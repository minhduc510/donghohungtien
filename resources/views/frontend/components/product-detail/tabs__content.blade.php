<div class="tabs__content">
    <div class="ctnr">
        <ul class="nav-tabs list__tabs" id="myTab" role="tablist">
            <li class="item__tab">
                <button class="btn_tab active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1-pane" type="button" role="tab" aria-controls="tab1-pane" aria-selected="true">
                    Mô tả sản phẩm
                </button>
            </li>
            <li class="item__tab">
                <button class="btn_tab " id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2-pane" type="button" role="tab" aria-controls="tab2-pane" aria-selected="false">
                    Hướng dẫn mua hàng
                </button>
            </li>
            <li class="item__tab">
                <button class="btn_tab " id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3-pane" type="button" role="tab" aria-controls="tab3-pane" aria-selected="false">
                    Vận chuyển & Đổi trả
                </button>
            </li>

        </ul>
        <div class="tab-content list__content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab1-pane" role="tabpanel" aria-labelledby="tab1-tab" tabindex="0">
                <div class="content__tab_text">
                    {!! $data['content3'] !!}
                </div>
            </div>
            <div class="tab-pane fade" id="tab2-pane" role="tabpanel" aria-labelledby="tab2-tab" tabindex="0">
                {{-- {!! $huongDan['description'] !!} --}}
                @include('frontend.components.product-detail.Evaluate')
                
            </div>
            
            <div class="tab-pane fade" id="tab3-pane" role="tabpanel" aria-labelledby="tab3-tab" tabindex="0">
                {{-- {!! $vanChuyenDoiTra['description'] !!} --}}
            </div>
        </div>
    </div>
</div>