$(function () {
    $('.main_categories').click(function () {
        var category_id = $(this).attr('category_id');
        $('.category_num' + category_id).slideToggle();
    });

    $(document).on('click', '.like_btn', function (e) {
        e.preventDefault();
        $(this).addClass('un_like_btn');
        $(this).removeClass('like_btn');
        var post_id = $(this).attr('post_id');
        var count = $('.like_counts' + post_id).text();
        var countInt = Number(count);
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method: "post",
            url: "/like/post/" + post_id,
            data: {
                post_id: $(this).attr('post_id'),
            },
        }).done(function (res) {
            console.log(res);
            $('.like_counts' + post_id).text(countInt + 1);
        }).fail(function (res) {
            console.log('fail');
        });
    });

    $(document).on('click', '.un_like_btn', function (e) {
        e.preventDefault();
        $(this).removeClass('un_like_btn');
        $(this).addClass('like_btn');
        var post_id = $(this).attr('post_id');
        var count = $('.like_counts' + post_id).text();
        var countInt = Number(count);

        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method: "post",
            url: "/unlike/post/" + post_id,
            data: {
                post_id: $(this).attr('post_id'),
            },
        }).done(function (res) {
            $('.like_counts' + post_id).text(countInt - 1);
        }).fail(function () {

        });
    });

    $('.edit-modal-open').on('click', function () {
        $('.js-modal').fadeIn();
        var post_title = $(this).attr('post_title');
        var post_body = $(this).attr('post_body');
        var post_id = $(this).attr('post_id');
        $('.modal-inner-title input').val(post_title);
        $('.modal-inner-body textarea').text(post_body);
        $('.edit-modal-hidden').val(post_id);
        return false;
    });
    $('.js-modal-close').on('click', function () {
        $('.js-modal').fadeOut();
        return false;
    });

});

// サブカテゴリーを表示するシェブロンマークの動き
$(function () {
    $('.chevron').click(function () {
        $(this).toggleClass('active');
        const parent = $(this).closest('.d-flex');
        const categoryId = parent.find('.main_categories').attr('category_id');
        const targetSubs = $('.sub_categories[category_id="' + categoryId + '"]');
        if ($(this).hasClass('active')) {
            targetSubs.addClass('active');
        } else {
            targetSubs.removeClass('active');
        }
    });
    $('.sub_categories span').click(function () {
        $('.chevron').removeClass('active');
        $('.sub_categories').removeClass('active');
    });
});

// サブカテゴリーをクリックしたら対象のサブカテゴリーに属している投稿のみ表示
document.querySelectorAll('.sub_categories').forEach(item => {
    item.addEventListener('click', function () {
        const subCategoryName = this.innerText.trim();
        document.getElementById('categoryWordInput').value = subCategoryName;
        document.getElementById('postSearchRequest').submit();
    });
});
