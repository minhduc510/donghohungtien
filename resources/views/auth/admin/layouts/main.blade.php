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
    <link rel="stylesheet" type="text/css" href="{{ asset('font/fontawesome-5.13.1/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lib/adminlte/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/sweetalert2/css/sweetalert2.min.css') }}">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin_asset/css/stylesheet.css') }}">
    @yield('css')
    <style>
        .invalid-feedback2 {
            display: none;
            width: 100%;
            margin-top: .25rem;
            font-size: 80%;
        }

        span#can-nhap-title {
            color: red;
        }

        span#da-nhap-title {
            color: rgb(0 255 0);
        }
    </style>
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
    <script type="text/javascript" src="{{ asset('lib/jquery/jquery-3.2.1.min.js') }} "></script>
    <!-- Bootstrap 4 -->
    <script type="text/javascript" src="{{ asset('lib/bootstrap-4.5.3-dist/js/bootstrap.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('lib/adminlte/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('lib/sweetalert2/js/sweetalert2.all.min.js') }}"></script>
    {{-- <script src="{{asset('lib/tinymce5/js/tinymce.min.js')}}"></script> --}}
    {{-- <script src="https://cdn.tiny.cloud/1/dskazawpouf0eq44ws139eihmga3ftloolji1z0nznkl5vhg/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script> --}}
	
    {{-- <script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script> --}}
    <script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('lib/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('lib/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin_asset/ajax/deleteAdminAjax.js') }}"></script>
    <script src="{{ asset('admin_asset/js/function.js') }}"></script>
    <script src="{{ asset('admin_asset/js/main.js') }}"></script>
    <script src="{{ asset('admin_asset/js/jquery.number.js') }}"></script>
    <script src="{{ asset('admin_asset/ajax/ajax-program.js') }}"></script>
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
        $(document).on('click', '.deleteAvatarProductDB', function() {
            event.preventDefault();
            let urlRequest = $(this).data("url");
            let mythis = $(this);
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa avatar này',
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
                                mythis.parents(".item-avatar").remove();
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
        $(document).on('click', '.deleteIconProductDB', function() {
            event.preventDefault();
            let urlRequest = $(this).data("url");
            let mythis = $(this);
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa banner này',
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
                                mythis.parents(".item-icon").remove();
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
    {{-- Check từ khóa seo --}}
    {{-- @dd(config('languages.supported')['vi']['value']) --}}
    @foreach (config('languages.supported') as $langItem)
        <script>
            $(document).ready(function() {
                $("input[name='name_{{ $langItem['value'] }}']").keyup(function() {
                    // Lấy giá trị của input
                    var name = $(this).val();
                    //$("input[name='title_seo_{{ $langItem['value'] }}']").val(name);
                    // $("input[name='description_seo_{{ $langItem['value'] }}']").val(name);



                    // $("input[name='keyword_seo_{{ $langItem['value'] }}']").val(name);


                    var title_seo = $("input[name='description_seo_{{ $langItem['value'] }}']").val();
                    var title_seo_length = title_seo.length;


                    var description_seo = $("input[name='description_seo_{{ $langItem['value'] }}']").val();
                    var description_seo_length = description_seo.length;



                    var keyword_seo = $("input[name='keyword_seo_{{ $langItem['value'] }}']").val();
                    var keyword_seo_length = keyword_seo.split(/\s*,\s*/).filter(function(word) {
                        return word !== "";
                    }).length;
                    console.log(keyword_seo);




                    var title_seo_id = $('#title_seo_{{ $langItem['value'] }}');
                    var title_seo_class = $("input[name='description_seo_{{ $langItem['value'] }}']");


                    var description_seo_id = $('#description_seo_{{ $langItem['value'] }}');
                    var description_seo_class = $("input[name='description_seo_{{ $langItem['value'] }}']");


                    var keyword_seo_id = $('#keyword_seo_{{ $langItem['value'] }}');
                    var keyword_seo_class = $("input[name='keyword_seo_{{ $langItem['value'] }}']");


                    if (title_seo_length > 70) {
                        title_seo_id.html('(META title <span id="can-nhap-title">' + (70 - title_seo_length) +
                            '</span> ký tự và từ)');
                    } else if (title_seo_length >= 0 && title_seo_length <= 70) {
                        title_seo_id.html('(META title <span id="da-nhap-title">' + (70 - title_seo_length) +
                            '</span> ký tự và từ)');
                    }

                    if (description_seo_length > 160) {
                        description_seo_id.html('(Trích lược SEO <span id="can-nhap-title">' + (160 -
                                description_seo_length) +
                            '</span> ký tự và từ)');
                    } else if (description_seo_length >= 0 && description_seo_length <= 160) {
                        description_seo_id.html('(Trích lược SEO <span id="da-nhap-title">' + (160 -
                                description_seo_length) +
                            '</span> ký tự và từ)');
                    }

                    if (keyword_seo_length > 5) {
                        keyword_seo_id.html('(Trích lược SEO <span id="can-nhap-title">' + (5 -
                                keyword_seo_length) +
                            '</span> ký tự và từ)');
                    } else if (keyword_seo_length >= 0 && keyword_seo_length <= 5) {
                        keyword_seo_id.html('(Trích lược SEO <span id="da-nhap-title">' + (5 -
                                keyword_seo_length) +
                            '</span> ký tự và từ)');
                    }
                });
                $("input[name='title_seo_{{ $langItem['value'] }}']").keyup(function() {
                    var typedText = $(this).val();
                    var textLength = typedText.length;
                    if (textLength > 70) {
                        $('#title_seo_{{ $langItem['value'] }}').html(
                            '(META title <span id="can-nhap-title">' + (70 - textLength) +
                            '</span> ký tự và từ)');
                    } else if (textLength >= 0 && textLength <= 70) {
                        $('#title_seo_{{ $langItem['value'] }}').html('(META title <span id="da-nhap-title">' +
                            (70 - textLength) +
                            '</span> ký tự và từ)');
                    }
                });
                $("input[name='description_seo_{{ $langItem['value'] }}']").keyup(function() {
                    var typedText = $(this).val();
                    var textLength = typedText.length;
                    if (textLength > 160) {
                        $('#description_seo_{{ $langItem['value'] }}').html(
                            '(Trích lược SEO <span id="can-nhap-title">' + (160 -
                                textLength) +
                            '</span> ký tự và từ)');
                    } else if (textLength >= 0 && textLength <= 160) {
                        $('#description_seo_{{ $langItem['value'] }}').html(
                            '(Trích lược SEO <span id="da-nhap-title">' + (160 -
                                textLength) +
                            '</span> ký tự và từ)');
                    }
                });


                $("input[name='keyword_seo_{{ $langItem['value'] }}']").keyup(function() {

                    var typedText = $(this).val();
                    var textLength = typedText.split(/\s*,\s*/).filter(function(word) {
                        return word !== "";
                    }).length;
                    if (textLength > 5) {
                        $('#keyword_seo_{{ $langItem['value'] }}').html(
                            '(Từ khóa cách nhau bằng dấu phẩy, tối đa <span id="can-nhap-title">' + (5 -
                                textLength) + '</span> từ khóa)');
                    } else if (textLength >= 0 && textLength <= 5) {
                        $('#keyword_seo_{{ $langItem['value'] }}').html(
                            '(Từ khóa cách nhau bằng dấu phẩy, tối đa <span id="da-nhap-title">' + (5 -
                                textLength) + '</span> từ khóa)');

                    }
                });

            });

            function checkFileSize(input, maxSizeNumber) {
                var fileSize = input.files[0].size; // Lấy dung lượng của tệp tin (đơn vị byte)
                var maxSize = maxSizeNumber * 1024 * 1024; // Dung lượng tối đa (5 MB)

                if (fileSize > maxSize) {
                    alert('Dung lượng ảnh không được vượt quá ' + maxSizeNumber + ' MB.');
                    // Xóa giá trị trong input để người dùng có thể chọn lại
                    input.value = '';
                }
            }

            const listInputFile = document.querySelectorAll('input[type="file"]')
            listInputFile.forEach(element => {
                element.onchange = () => {
                    checkFileSize(element, 2);
                }
            });
        </script>
    @endforeach

    {{-- Check từ khóa seo --}}
    @yield('js')
</body>

</html>
