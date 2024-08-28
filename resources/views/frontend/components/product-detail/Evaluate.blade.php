<div class="content__Evaluate">
    <div class="Evaluate">
        <div class="rating-average">
            <div class="point-comment">
                5/5
            </div>
            <div class="Evaluate-star">
                <i class="rating-star fa-solid fa-star rating-star-yellow"></i>
                <i class="rating-star fa-solid fa-star rating-star-yellow"></i>
                <i class="rating-star fa-solid fa-star rating-star-yellow"></i>
                <i class="rating-star fa-solid fa-star rating-star-yellow"></i>
                <i class="rating-star fa-solid fa-star rating-star-yellow"></i>
            </div>
        </div>
        <div class="rating-percent">
            <div class="product-review-item flex">
                <div class="product-star flex flex-center-y">
                    <i class="rating-star fa-solid fa-star rating-star-yellow"></i>
                    <i class="rating-star fa-solid fa-star rating-star-yellow"></i>
                    <i class="rating-star fa-solid fa-star rating-star-yellow"></i>
                    <i class="rating-star fa-solid fa-star rating-star-yellow"></i>
                    <i class="rating-star fa-solid fa-star rating-star-yellow"></i>
                </div>
                <span class="sum-review">
                    (99)
                </span>
                <div class=" product-bar flex flex-center-y">
                    <div class="product-result"></div>
                </div>
            </div>
            <div class="product-review-item flex">
                <div class="product-star flex flex-center-y">
                    <i class="rating-star fa-solid fa-star rating-star-yellow"></i>
                    <i class="rating-star fa-solid fa-star rating-star-yellow"></i>
                    <i class="rating-star fa-solid fa-star rating-star-yellow"></i>
                    <i class="rating-star fa-solid fa-star rating-star-yellow"></i>
                    <i class="rating-star fa-solid fa-star "></i>
                </div>
                <span class="sum-review">
                    (99)
                </span>
                <div class=" product-bar flex flex-center-y">
                    <div class="product-result"></div>
                </div>
            </div>
            <div class="product-review-item flex">
                <div class="product-star flex flex-center-y">
                    <i class="rating-star fa-solid fa-star rating-star-yellow"></i>
                    <i class="rating-star fa-solid fa-star rating-star-yellow"></i>
                    <i class="rating-star fa-solid fa-star rating-star-yellow"></i>
                    <i class="rating-star fa-solid fa-star "></i>
                    <i class="rating-star fa-solid fa-star "></i>
                </div>
                <span class="sum-review">
                    (99)
                </span>
                <div class=" product-bar flex flex-center-y">
                    <div class="product-result"></div>
                </div>
            </div>
            <div class="product-review-item flex">
                <div class="product-star flex flex-center-y">
                    <i class="rating-star fa-solid fa-star rating-star-yellow"></i>
                    <i class="rating-star fa-solid fa-star rating-star-yellow"></i>
                    <i class="rating-star fa-solid fa-star "></i>
                    <i class="rating-star fa-solid fa-star "></i>
                    <i class="rating-star fa-solid fa-star "></i>
                </div>
                <span class="sum-review">
                    (99)
                </span>
                <div class=" product-bar flex flex-center-y">
                    <div class="product-result"></div>
                </div>
            </div>
            <div class="product-review-item flex">
                <div class="product-star flex flex-center-y">
                    <i class="rating-star fa-solid fa-star rating-star-yellow"></i>
                    <i class="rating-star fa-solid fa-star "></i>
                    <i class="rating-star fa-solid fa-star "></i>
                    <i class="rating-star fa-solid fa-star "></i>
                    <i class="rating-star fa-solid fa-star "></i>
                </div>
                <span class="sum-review">
                    (99)
                </span>
                <div class=" product-bar flex flex-center-y">
                    <div class="product-result"></div>
                </div>
            </div>
        </div>
        <div class="customer-rating">
            <div class="customer-name">
                Chia sẻ nhận xét về sản phẩm
            </div>
            <button class="customer-button button" onclick="Show_comment_form()">
                Viết nhận xét
            </button>
        </div>
    </div>
    <div class="comment-form">
        <div class="product-rate flex">
            <div class="rate-text">
                1. Đánh giá
            </div>
            <div class="rate-box flex flex-center-y">
                <span class="rate_Rating" onclick="checkEvaluate(this)">
                    <i class="rating-star fa-solid fa-star rating-star-yellow "></i>
                    <input name="rate" type="radio" value="0">
                </span>
                <span class="rate_Rating" onclick="checkEvaluate(this)">
                    <i class="rating-star fa-solid fa-star rating-star-yellow "></i>
                    <input name="rate" type="radio" value="1">
                </span>
                <span class="rate_Rating" onclick="checkEvaluate(this)">
                    <i class="rating-star fa-solid fa-star rating-star-yellow "></i>
                    <input name="rate" type="radio" value="2">
                </span>
                <span class="rate_Rating" onclick="checkEvaluate(this)">
                    <i class="rating-star fa-solid fa-star rating-star-yellow "></i>
                    <input name="rate" type="radio" value="3">
                </span>
                <span class="rate_Rating" onclick="checkEvaluate(this)">
                    <i class="rating-star fa-solid fa-star rating-star-yellow "></i>
                    <input name="rate" type="radio" value="4">
                </span>

            </div>
            <div class="rate-text">cho sản phẩm này:</div>
        </div>
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
                <input type="file">
            </div>

        </form>
    </div>
</div>


<script>
    function checkEvaluate(bch) {
        const value = bch.querySelector("input").value
        const rate_Ratings = document.querySelectorAll('.rate_Rating');
        const ratings_star = document.querySelectorAll('.rate-box  .rating-star')
        ratings_star.forEach(rating_star => {
            rating_star.classList.remove('rating-star-yellow')
        })
        for (let i = 0; i <= value; i++) {

            rate_Ratings[i].querySelector('i').classList.add('rating-star-yellow')
        }
    }
</script>
<script>
    function Show_comment_form() {
        const comment_form = document.querySelector('.comment-form')
        comment_form.classList.toggle('active')
    }
</script>