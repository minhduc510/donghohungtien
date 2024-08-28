$(document).on("click", ".lb_delete", actionDelete);
$(document).on("click", ".lb_delete_recusive", actionDeleteRecusive);
$(document).on("click", ".lb_delete_image", actionDeleteImage);

function actionDeleteRecusive(event) {
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
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                url: urlRequest,
                success: function(data) {
                    if (data.code == 200) {
                        $remove = mythis.closest(".lb_item_delete");
                        $ul = $remove.closest("ul");
                        $remove.remove();
                        if (!$ul.children().length) {
                            $ul.prev().find(".lb-toggle").remove();
                            $ul.prev().find(".fas.fa-folder").removeClass("fas fa-folder").addClass("fas fa-file-alt");
                            $ul.remove();
                        }
                        // mythis.parents("tr").remove();
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
}

function actionDelete(event) {
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
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                url: urlRequest,
                success: function(data) {
                    if (data.code == 200) {

                        mythis.parents("tr").remove();
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
}

function actionDeleteImage(event) {
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
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                url: urlRequest,
                success: function(data) {
                    if (data.code == 200) {

                        mythis.parents(".col-image").remove();
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
}