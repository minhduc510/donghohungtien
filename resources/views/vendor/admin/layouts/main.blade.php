<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> @yield('title')</title>

  <!-- Font Awesome Icons -->
  {{-- <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}"> --}}
  <link rel="stylesheet" type="text/css" href="{{asset('font/fontawesome-5.13.1/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('lib/adminlte/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('lib/sweetalert2/css/sweetalert2.min.css')}}">
  <link href="{{asset('lib/select2/css/select2.min.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('admin_asset/css/stylesheet.css')}}">
  @yield('css')
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
  @include('admin.partials.header')
    <!-- /.navbar -->

  @include('admin.partials.sidebar')
  @yield('content')
  @include('admin.partials.footer')
  </div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script type="text/javascript" src="{{asset('lib/jquery/jquery-3.2.1.min.js')}} "></script>
<!-- Bootstrap 4 -->
<script type="text/javascript" src="{{asset('lib/bootstrap-4.5.3-dist/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('lib/adminlte/js/adminlte.min.js')}}"></script>
<script src="{{asset('lib/sweetalert2/js/sweetalert2.all.min.js')}}"></script>
{{-- <script src="{{asset('lib/tinymce5/js/tinymce.min.js')}}"></script> --}}
<script src="https://cdn.tiny.cloud/1/si5evst7s8i3p2grgfh7i5gdsk2l26daazgefvli0hmzapgn/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
{{-- <script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script> --}}
<script src="{{asset('lib/select2/js/select2.min.js')}}"></script>
<script src="{{asset('admin_asset/ajax/deleteAdminAjax.js')}}"></script>
<script src="{{asset('admin_asset/js/function.js')}}"></script>
<script src="{{asset('admin_asset/js/main.js')}}"></script>
<script>
       // đoạn văn
       $(document).on('click', '#addOptionProduct', function() {
        // alert('a');
        event.preventDefault();
        //  let wrapActive = $(this).parents('.wrap-load-active');
        let urlRequest = $(this).data("url");
        //let i = $('.wrap-paragraph tbody').find('tr').length;
        //  alert(urlRequest);
        $.ajax({
            type: "GET",
            url: urlRequest,
            // data: { i: i },
            success: function(data) {
                if (data.code == 200) {
                    let html = data.html;
                    $('#wrapOption').append(html);
                    // if ($("textarea.tinymce_editor_init").length) {
                    //     tinymce.init(editor_config);
                    // }
                }
            }
        });
    });
    $(document).on('click', '.deleteOptionProduct', function() {
        event.preventDefault();
        let $this = $(this);
        Swal.fire({
            title: "Bạn có muốn xóa option?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Tôi đồng ý'
        }).then((result) => {
            if (result.isConfirmed) {
                $this.parents('.item-price').remove();
            }
        })
    });
     // load delete đáp án  khi đáp án chưa thêm database
     $(document).on('click', '.deleteOptionProductDB', function() {
        event.preventDefault();
        let urlRequest = $(this).data("url");
        let mythis = $(this);
        Swal.fire({
            title: 'Bạn có chắc chắn muốn xóa option này',
            text: "Bạn sẽ không thể khôi phục điều này",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Tôi đồng ý!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "GET",
                    url: urlRequest,
                    success: function(data) {
                        if (data.code == 200) {
                            mythis.parents(".item-price").remove();
                        }
                    },
                    error: function() {

                    }
                });
                // Swal.fire(
                // 'Deleted!',
                // 'Your file has been deleted.',
                // 'success'
                // )
            }
        })
    });
</script>
@yield('js')
</body>
</html>
