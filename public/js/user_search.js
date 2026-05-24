$(function () {
    $('.search_conditions').click(function () {
        $('.search_conditions_inner').slideToggle();
    });

    $('.subject_edit_btn').click(function () {
        $('.subject_inner').slideToggle();
    });

    $('.search_conditions_wrapper').click(function () {
        const chevron = $(this).find('.chevron');
        chevron.toggleClass('active');
        $('.subject_inner').toggleClass('active');
    });

    $('.course_register').click(function () {
        const chevron = $(this).find('.chevron');
        chevron.toggleClass('active');
        $('.subject_inner').toggleClass('active');
    });
});
