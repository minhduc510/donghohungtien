<style>
    body {
        font-family: 'Open Sans', sans-serif;
        background-color: #fff !important;
    }

    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap');

    p.thongbao {
        position: absolute;
        top: 0;
        right: 0;
        background: red;
        padding: 1px 6px 1px 5px;
        color: white;
        border-radius: 50%;
        font-size: 10px !important;
    }

    .nav-item i {
        padding-right: 5px;
    }

    .nav-sidebar>.nav-item a p {
        font-size: 14px;
    }

    .nav-treeview>.nav-item>.nav-link {
        color: #eee;
        padding: 4px 20px 4px 32px;
    }

    .nav-item i {
        color: #b3cbdd;
        padding-right: 5px;
    }

    .nav-treeview>.nav-item>.nav-link p {
        font-size: 12px;
        color: #b3cbdd
    }

    .nav-treeview>.nav-item>.nav-link i {
        font-size: 12px;
        color: #b3cbdd
    }

    .sidebar {
        background: #2A3F54;
        padding: 0;
    }

    .sidebar a {
        color: #17a2b8;
    }

    .form-inline {
        padding: 15px 0;
    }

    .nav-sidebar>.nav-item {
        color: #b3cbdd;
        font-size: 14px;
        padding-left: 0px;
        border-bottom: 1px solid #25384c;
        border-top: 1px solid #304558;
    }
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #2A3F54;">
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3  d-flex" style="padding: 0px 0 0 0;">
            <div class="image">
                <img src="{{ asset('admin_asset/images/bivaco.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    @if (Auth::guard('admin')->check())
                        {{ Auth::guard('admin')->user()->name }}
                    @endif
                </a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        @php
            $routerName = request()->route()->getName();
        @endphp
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link">
                        <i class="fas fa-tachometer-alt"></i>
                        <p>BẢNG ĐIỀU KHIỂN</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link ">
                        <i class="fas fa-chart-bar"></i>
                        <p>
                            Quản lý module sản phẩm
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('category-product-list')
                            <li class="nav-item">
                                <a href="{{ route('admin.categoryproduct.index') }}" class="nav-link">
                                    <i class="fas fa-angle-double-right"></i>
                                    <p>Danh mục sản phẩm</p>
                                </a>
                            </li>
                        @endcan
                        @can('product-list')
                            <li class="nav-item">
                                <a href="{{ route('admin.product.index') }}" class="nav-link">
                                    <i class="fas fa-angle-double-right"></i>
                                    <p>Sản phẩm</p>
                                </a>
                            </li>
                        @endcan
                        {{-- <li class="nav-item">
                            <a href="{{ route('admin.product.indexStar') }}" class="nav-link">
                                <i class="fas fa-angle-double-right"></i>
                                <p>Quản lý đánh giá</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.productcomment.index') }}" class="nav-link">
                                <i class="fas fa-angle-double-right"></i>
                                <p>Quản lý bình luận</p>
                            </a>
                        </li> --}}
                        @can('product-list')
                            <li class="nav-item">
                                <a href="{{ route('admin.attribute.index') }}" class="nav-link">
                                    <i class="fas fa-angle-double-right"></i>
                                    <p>Thuộc tính sản phẩm</p>
                                </a>
                            </li>
                        @endcan
                        @can('product-list')
                            <li class="nav-item">
                                <a href="{{ route('admin.supplier.index') }}" class="nav-link">
                                    <i class="fas fa-angle-double-right"></i>
                                    <p>Thương hiệu sản phẩm</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-globe-americas"></i>
                        <p>
                            Quản lý module tin tức
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('category-post-list')
                            <li class="nav-item">
                                <a href="{{ route('admin.categorypost.index') }}" class="nav-link">
                                    <i class="fas fa-angle-double-right"></i>
                                    <p>Danh mục</p>
                                </a>
                            </li>
                        @endcan
                        @can('post-list')
                            <li class="nav-item">
                                <a href="{{ route('admin.post.index') }}" class="nav-link">
                                    <i class="fas fa-angle-double-right"></i>
                                    <p>Tin tức</p>
                                </a>
                            </li>
                        @endcan
                        {{-- <li class="nav-item">
                     <a href="{{ route('admin.post.comment.index') }}" class="nav-link">
                        <i class="fas fa-angle-double-right"></i>
                        <p>Quản lý bình luận</p>
                     </a>
                  </li> --}}
                    </ul>
                </li>
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link ">
                        <i class="fas fa-chart-bar"></i>
                        <p>
                            Quản lý Thư viện
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.categorygalaxy.index') }}" class="nav-link">
                                <i class="fas fa-angle-double-right"></i>
                                <p>Danh mục video / hình ảnh</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.galaxy.index') }}" class="nav-link">
                                <i class="fas fa-angle-double-right"></i>
                                <p>Video / Hình ảnh</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                <li class="nav-item">
                    @can('setting-list')
                        <a href="{{ route('admin.setting.index') }}" class="nav-link">
                            <i class="fas fa-cog"></i>
                            <p>
                                Trang thông tin
                            </p>
                        </a>
                    @endcan
                </li>
                <li class="nav-item">
                    @can('slider-list')
                        <a href="{{ route('admin.slider.index') }}" class="nav-link">
                            <i class="fas fa-images"></i>
                            <p>
                                Quản lý slide trang chủ
                            </p>
                        </a>
                    @endcan
                </li>
                @canany(['transaction-list'])
                    <li class="nav-item">
                        <a href="{{ route('admin.transaction.index') }}" class="nav-link">
                            <i class="fas fa-cart-plus"></i>
                            <p>
                                Quản lý đơn hàng
                            </p>
                            @php
                                $countTransaction = App\Models\Transaction::where('status', 1)->count();
                            @endphp
                            @if ($countTransaction > 0)
                                <p class="thongbao">{{ $countTransaction }}</p>
                            @endif
                        </a>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="{{ route('admin.contact.index') }}" class="nav-link">
                        <i class="fas fa-id-card-alt"></i>
                        <p>
                            Thông tin liên hệ
                        </p>
                        @php
                            $countContact = App\Models\Contact::where('status', 1)->count();
                        @endphp
                        @if ($countContact > 0)
                            <p class="thongbao">{{ $countContact }}</p>
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.code.index') }}" class="nav-link">
                        <i class="fas fa-cart-plus"></i>
                        <p>
                            Quản lý Mã Code
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cog"></i>
                        <p>
                            Quản lý quản trị viên
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('admin-user-list')
                            <li class="nav-item">
                                <a href="{{ route('admin.user.index') }}" class="nav-link">
                                    <i class="fas fa-angle-double-right"></i>
                                    <p>Danh sách quản trị viên</p>
                                </a>
                            </li>
                        @endcan
                        @can('role-add')
                            <li class="nav-item">
                                <a href="{{ route('admin.role.index') }}" class="nav-link">
                                    <i class="fas fa-angle-double-right"></i>
                                    <p>Vai trò</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
