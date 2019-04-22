$(function () {
    //1枚目のパネルを除いて非表示にする
    $('#panel > dd:gt(0)').hide();
    $('#panel > dt')
        .click(function (e) {
            //すべてのパネルを閉じる。
            $('#panel > dd').slideUp(200);
            //選択したパネルのみ表示する
            $('+dd', this).slideDown(200);
        })
});

$(function () {
    // #で始まるアンカーをクリックした場合に処理
    $('a[href^=#]').click(function () {
        // スクロールの速度
        var speed = 600; // ミリ秒
        // アンカーの値取得
        var href = $(this).attr("href");
        // 移動先を取得
        var target = $(href == "#" || href == "" ? 'html' : href);
        // 移動先を数値で取得
        var position = target.offset().top-50;
        // スムーススクロール
        $('body,html').animate({scrollTop: position}, speed, 'swing');
        return false;
    });
});