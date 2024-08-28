$(function () {
    // js tinymce
    var editor_config = {
        path_absolute: "/",
        selector: 'textarea.tinymce_editor_init',
        relative_urls: false,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry",
        external_plugins: {
            'tiny_mce_wiris': 'http://demo.largevendor.com/lib/tinymce5/tiny_mce_wiris/plugin.min.js'
        },
        file_picker_callback: function (callback, value, meta) {
            let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            let y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            let cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
            if (meta.filetype == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.openUrl({
                url: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no",
                onMessage: (api, message) => {
                    callback(message.content);
                }
            });
        }
    };

    // xử lý exercise
    // load view create  exercise
    $(document).on("click", ".addQuestionAjax", function () {
        event.preventDefault();
        let contentWrap = $('#loadContent');
        let urlRequest = $(this).data("url");
        $.ajax({
            type: "GET",
            url: urlRequest,
            success: function (data) {
                if (data.code == 200) {
                    let html = data.html;
                    contentWrap.html(html);
                    $('#loadAjaxParent').modal('show');
                    if ($("textarea.tinymce_editor_init").length) {
                        var textareaID = $("textarea.tinymce_editor_init").attr("id");
                        CKEDITOR.replace(textareaID, {});
                    }
                }
            }
        });
    });

    // lưu exercise
    $(document).on("submit", '.formAddQuestionAjax, .formEditQuestionAjax, .formAddQuestionAnswerAjax,.formEditQuestionAnswerAjax', function () {
        event.preventDefault();
        //  let data=$(this).serialize();
        let data = new FormData(this);
        // console.log(data);
        let urlRequest = $(this).data("url");
        let errorSelector = $(this).find('.loadHtmlErrorValide');
        // var form_data = new FormData();
        console.log(data);
        //  alert(urlRequest);
        $.ajax({
            type: "POST",
            url: urlRequest,
            dataType: "JSON",
            data: data,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data.code == 200) {
                    if (data.validate === true) {
                        errorSelector.html(data.htmlErrorValidate);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Lưu không thành công',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        errorSelector.children().remove();
                        let html = data.html;
                        $('#loadListExercise').html(html);
                        if ($("textarea.tinymce_editor_init").length) {
                            var textareaID = $("textarea.tinymce_editor_init").attr("id");
                            CKEDITOR.replace(textareaID, {});
                        }
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: "Lưu thành công",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                }
            },
            error: function (response) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Lưu không thành công',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
        return false;
    });

    // load view add answer
    $(document).on('click', '#addQuestionAnswer', function () {
        // alert('a');
        event.preventDefault();
        //  let wrapActive = $(this).parents('.wrap-load-active');
        let urlRequest = $(this).data("url");
        let i = $('.wrap-anser tbody').find('tr.answer').length;
        //  alert(urlRequest);
        $.ajax({
            type: "GET",
            data: { i: i },
            url: urlRequest,
            success: function (data) {
                if (data.code == 200) {
                    let html = data.html;
                    $('.wrap-anser tbody').append(html);
                    if ($("textarea.tinymce_editor_init").length) {
                        var textareaID = $("textarea.tinymce_editor_init").attr("id");
                        CKEDITOR.replace(textareaID, {});
                    }
                }
            }
        });
    });

    // load delete đáp án  khi đáp án chưa thêm database
    $(document).on('click', '.deleteQuestionAnswer', function () {
        event.preventDefault();
        let $this = $(this);
        Swal.fire({
            title: "Bạn có muốn xóa đáp án ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Tôi đồng ý'
        }).then((result) => {
            if (result.isConfirmed) {
                $this.parents('tr').remove();
            }
        })
    });
    // load exercise để edit
    $(document).on("click", ".btnShowQuestion", function () {
        let contentWrap = $('#loadContent');
        let urlRequest = $(this).data("url");
        $.ajax({
            type: "GET",
            url: urlRequest,
            success: function (data) {
                if (data.code == 200) {
                    let html = data.html;
                    contentWrap.html(html);
                    $('#loadAjaxParent').modal('show');
                    if ($("textarea.tinymce_editor_init").length) {
                        var textareaID = $("textarea.tinymce_editor_init").attr("id");
                        CKEDITOR.replace(textareaID, {});
                    }
                }
            }
        });
    });

    // load answer edit
    // load exercise answer để edit
    $(document).on("click", ".btnShowQuestionAnswer", function () {
        let contentWrap = $('#loadContent');
        let urlRequest = $(this).data("url");
        $.ajax({
            type: "GET",
            url: urlRequest,
            success: function (data) {
                if (data.code == 200) {
                    let html = data.html;
                    contentWrap.html(html);
                    $('#loadAjaxParent').modal('show');
                    if ($("textarea.tinymce_editor_init").length) {
                        var textareaID = $("textarea.tinymce_editor_init").attr("id");
                        CKEDITOR.replace(textareaID, {});
                    }
                }
            }
        });
    });

    // delete answer
    $(document).on('click', '.deleteQuestionAnswerAjax', function () {
        event.preventDefault();
        let urlRequest = $(this).data("url");
        let mythis = $(this);
        Swal.fire({
            title: 'Bạn có chắc chắn muốn xóa',
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
                    success: function (data) {
                        if (data.code == 200) {
                            mythis.parents("li").remove();
                        } else if (data.code == 500) {
                            Swal.fire({
                                title: data.message,
                                showClass: {
                                    popup: 'animate__animated animate__fadeInDown'
                                },
                                hideClass: {
                                    popup: 'animate__animated animate__fadeOutUp'
                                }
                            });
                        }
                    },
                    error: function () { }
                });
            }
        });
    });
    // thêm answer của exercise
    $(document).on("click", ".btnCreateQuestionAnswer", function () {
        let contentWrap = $('#loadContent');
        let urlRequest = $(this).data("url");
        $.ajax({
            type: "GET",
            url: urlRequest,
            success: function (data) {
                if (data.code == 200) {
                    let html = data.html;
                    contentWrap.html(html);
                    $('#loadAjaxParent').modal('show');
                    if ($("textarea.tinymce_editor_init").length) {
                        var textareaID = $("textarea.tinymce_editor_init").attr("id");
                        CKEDITOR.replace(textareaID, {});
                    }
                }
            }
        });
    });

    // toogle anser
    $(document).on('click', '.toggleQuestionAnser', function () {
        $(this).parents('tr').next('tr.answers').toggle();
        $(this).find('i').toggleClass('fa-minus fa-plus');
        //  $(this).find('i').toggleClass('');
    });

});
