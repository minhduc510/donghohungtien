class Compare {

    constructor() {
        this.selectorWrapperCompare = $('.compare-wrapper');
        this.compareItem = '.compare-item';
    }
    addToCompare($this) {
        event.preventDefault();
        let url = $this.data('url');
        let swalOption = {
            //  title: "test",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Tiếp tục!',
            cancelButtonText: 'Bỏ qua'
        }
        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function(data) {
                if (data.code === 200) {
                    swalOption.title = "Thêm sản phẩm vào so sánh thành công. Bạn có muốn đến so sánh không?";
                    swalOption.icon = 'success';
                    Swal.fire(swalOption).then((result) => {
                        if (result.isConfirmed) {
                            //let hostname = window.location.hostname;
                            window.location.href = "/compare";
                        } else {
                            $('.countCompare').html(data.totalQuantity);
                        }
                    })
                } else {
                    swalOption.title = "Thêm sản phẩm vào so sánh thất bại !  Bạn có muốn đi đến so sánh?";
                    Swal.fire(swalOption).then((result) => {
                        if (result.isConfirmed) {
                            //let hostname = window.location.hostname;
                            window.location.href = "/compare";
                        }
                    })
                }
            },
            error: function() {

            }
        });



    }


    removeCompare($this) {
        event.preventDefault();
        let url = $this.data('url');
        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function(data) {
                if (data.code === 200) {
                    $('.compare-wrapper').html(data.html);
                    $('.countCompare').html(data.totalQuantity);
                    // $('#total-price-compare').text(data.totalPrice);
                    alert('Xóa sản phẩm so sánh thành công');
                } else {
                    alert('Xóa sản phẩm so sánh thất bại');
                }
            },
            error: function() {

            }
        });
    }

    clearCompare($this) {
        event.preventDefault();
        let url = $this.data('url');
        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function(data) {
                if (data.code === 200) {
                    console.log(data.html);
                    $('.compare-wrapper').html(data.html);
                    $('.countCompare').html(data.totalQuantity);
                    alert('Xóa sản phẩm so sánh thành công');
                } else {
                    alert('Xóa sản phẩm so sánh thất bại');
                }
            },
            error: function() {

            }
        });
    }
}

let compare = new Compare();
$(document).on('click', '.add-compare', function() {
    $this = $(this);
    compare.addToCompare($this);
});
$(document).on('click', '.remove-compare', function() {
    $this = $(this);
    compare.removeCompare($this);
});
$(document).on('click', '.clear-compare', function() {
    $this = $(this);
    compare.clearCompare($this);
});