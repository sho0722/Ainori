$(function() {
    //ロゴをクリックした時の処理
    $(".logo").on("click", function() {
        // audioを再生
        $("#audio").get(0).play();

        // 虹を出現
        $(".rainbow").animate({'opacity': 1}, 4000);

        // リンクを表示
        $("#links").delay(4500).animate({'opacity': 1}, 3000);

        // 背景をbg2変更
        $("body").delay(10000).queue(function() {
            $(this).addClass("background2").dequeue();
        });

        // 背景をbg3変更
        $("body").delay(15000).queue(function() {
            $(this).addClass("background3").dequeue();
        });
    });

    //スクロールした時の処理
    $(window).scroll(function() {
        let scrollTop = $(window).scrollTop();

        // iconを表示
        if (scrollTop > 1000) {
            $("#icon").fadeIn();
        } else {
            $("#icon").fadeOut();
        };
    });

    // iconをクリックした時の処理
    $("#icon").on("click", function() {
        $("html").animate({scrollTop: 0}, 1000);
    });
});