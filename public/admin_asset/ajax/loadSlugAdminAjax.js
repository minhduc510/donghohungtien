$(document).on("change keyup", ".lb_name_slug", function() {
    let str = $(this).val();
    let urlRequest = $(this).data("url");
    let that = $(this);
    $.ajax({
        type: "GET",
        url: urlRequest + "?str=" + str,
        success: function(data) {
            if (data.code == 200) {
                that.parents("form").find(".lb_load_slug").val(data.resultSlug);
            }
        },
        error: function() {
            
        }
    });
});