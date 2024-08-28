<form class="post-comment">
    <div class="rate-text">
        <label for="" class="comment-label">
            2. Viết nhận xét của bạn vào bên dưới:
        </label>
        <div class="form-element">
            <textarea class="form-control" placeholder="Hãy cho chúng tôi biết đánh giá của bạn về sản phẩm này!"></textarea>
        </div>
    </div>
    <div class="rate-text">
        <label for="" class="comment-label">
            2. Viết nhận xét của bạn vào bên dưới:
        </label>
        <div class="form-element">
            <input class="form-control" placeholder="Họ và tên"></input>
        </div>
    </div>
    <div class="rate-text">
        <label for="" class="comment-label">
            3. Thông tin cá nhân của bạn <i>(Thông tin của bạn được bảo mật)</i>
        </label>
        <div class="form-element form__element__grout">
            <input class="form-control" placeholder="Số điện thoại"></input>
            <input class="form-control" placeholder="Địa chỉ Email ( nếu bạn muốn nhận phản hồi )"></input>
        </div>
    </div>
    <div class="fileSelector flex flex-center-y">
        <div class="fileSelector_button">
            Chọn hình
        </div>
        <div class="fileSelector__text">
            Thêm hình sản phẩm nếu có (tối đa 5 hình):
        </div>
        <input type="file" multiple id = "myfile" name="myfile">
    </div>
    <div class="preview-image">
        <div class="box-preview-image">
            <img src="" alt="" class ="">
            <span class="btn-remove-image "></span>
        </div>
    </div>
</form>

<script>
    const jk = document.querySelector('#myfile');
    console.log(jk)
</script>