
$(function() {
    var lazyLoadInstance = new LazyLoad({
        elements_selector: ".lazy",
        effect : "fadeIn"
    });
    $('body').append('<div class="to__top"><span>&laquo;</span></div>');
    $('.to__top').click(function() {
        $('html, body').stop().animate({scrollTop: 0}, 'slow', 'swing');
    });
    $(window).scroll(function() {
        if ($(this).scrollTop() > $(window).height()) {
            $('.to__top').addClass("active");
        } else {
            $('.to__top').removeClass("active");
        };
    });
    // var t = $(".stiky__buttons"),
    //     e = t.offset().top;
    // $(window).scroll((function() {
    //     t.toggleClass("stiky", $(this).scrollTop() > e);
    // }));
    // clear input
    $('input, textarea').each(function () {
        var placeholder = $(this).attr('placeholder');
        $(this).focus(function () {
            $(this).attr('placeholder', '');
            return false;
        });
        $(this).focusout(function () {
            $(this).attr('placeholder', placeholder);
            return false;
        });
    });

    $('.login__user').on('click', function(){
        $('.login__list').slideToggle();
    });

    $('.collapse__item-title').on('click', function(){
        $(this).siblings('.collapse__item-body').slideToggle();
    });
    $(document).mouseup(function (e){
        var div = $(".login__list");
        var btn = $('.login__user');
        if (!div.is(e.target) && div.has(e.target).length === 0  && !btn.is(e.target)) {
            div.hide(400);
        }
    });
    $('.forget-password').on("click", (function(t) {
        parent.jQuery.fancybox.getInstance().close();
    }))

    $(".reset span").on('click', function() {
        $(".search__area")[0].reset();
    })

});