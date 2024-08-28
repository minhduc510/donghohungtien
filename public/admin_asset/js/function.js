// function display image when upload file
// paramter selectorWrap slector thẻ bọc của image và input
// paramter selectorImg slector thẻ bọc của image
function displayImage(input, selectorWrap, selectorImg) {
    input.parents(selectorWrap).find(selectorImg).remove();

    let file = input.prop('files')[0];
    let reader = new FileReader();

    reader.addEventListener("load", function() {
        // convert image file to base64 string
        let img = $('<img />');
        img.attr({
            'src': reader.result,
            'alt': file.name,
        });
        input.parents(selectorWrap).append(img);
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }
}

// function displayImage(input, selectorWrap, selectorWrapImg) {
//     let wrapImg = input.parents(selectorWrap).find(selectorWrapImg);
//     wrapImg.find('img').remove();
//     let file = input.prop('files')[0];

//     let reader = new FileReader();

//     reader.addEventListener("load", function() {
//         // convert image file to base64 string
//         let imgContainer = $("<div></div>");
//         imgContainer.addClass("img-item");

//         let img = $('<img />');
//         img.attr({
//             'src': reader.result,
//             'alt': fileItem.name,
//         });
//         imgContainer.append(img);
//         wrapImg.append(imgContainer);
//     }, false);

//     if (file) {
//         reader.readAsDataURL(file);
//     }
// }



// function display nhiều image when upload file
// paramter selectorWrap slector thẻ bọc của image và input
// paramter selectorImg slector thẻ bọc của image
function displayMultipleImage(input, selectorWrap, selectorWrapImg) {
    let wrapImg = input.parents(selectorWrap).find(selectorWrapImg);
    wrapImg.find('img').remove();
    let files = input.prop('files');
    let length = files.length;
    for (let i = 0; i < length; i++) {
        fileItem = files[i];
        let reader = new FileReader();
        reader.addEventListener("load", function() {
            // convert image file to base64 string
            let img = $('<img />');
            img.attr({
                'src': reader.result,
                'alt': fileItem.name,
            });
            wrapImg.append(img);
        }, false);
        if (fileItem) {
            reader.readAsDataURL(fileItem);
        }
    }
}


// function convert slug
function ChangeToSlug(title) {
    // title = document.getElementById("title").value;
    //Đổi chữ hoa thành chữ thường
    let slug = title.toLowerCase();
    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    return slug;
}