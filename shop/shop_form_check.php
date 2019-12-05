<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ｍｙＥCサイト</title>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@9/build/highlight.min.js"></script>
        <script>
        hljs.initHighlightingOnLoad();
        hljs.configure({
        tabReplace: '  ', // 2 spaces
        })
        </script>
        <script src="https://cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js"></script>
        <script src="https://cccabinet.jpn.org/bootstrap4/js/style.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
    <div class="container">
        <div class="row">
            <header class="col">
                <a href="../index.html"><img src="../img/TOP.png" alt="タイトル画像"></a>
            </header>
            <div class="mt-3">
                <a class="btn btn-warning kaimono" href="../shop/shop_cartlook.php" role="button">買い物かご</a>
            </div>
            <nav class="navbar navbar-expand-md navbar-light bg-light col-12 border-top border-bottom">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav mr-auto ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">当店について</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown">
                                <a class="dropdown-item" href="../gaiyou/kaisya.html">ごあいさつ</a>
                                <a class="dropdown-item" href="../gaiyou/annai.html">ご利用案内</a>
                                <a class="dropdown-item" href="../gaiyou/tokutei.html">特定商取引法に基づく表示</a>
                                <a class="dropdown-item" href="../toiawase/toiawase_form.html">お問い合わせ</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">お買い物はコチラ</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown">
                                <a class="dropdown-item" href="../shop/shop_list.php">全ての商品</a>
                                <a class="dropdown-item" href="../shop/shop_list_yasai.php">お野菜</a>
                                <a class="dropdown-item" href="../shop/shop_list_niku.php">お肉</a>
                                <a class="dropdown-item" href="../shop/shop_list_sakana.php">お魚</a>
                                <a class="dropdown-item" href="../shop/shop_list_nitiyou.php">日用品</a>
                                <a class="dropdown-item" href="../shop/shop_list_other.php">その他商品</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ギャラリーはコチラ</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown">
                                <a class="dropdown-item" href="../gallery/gaikan.html">外観</a>
                                <a class="dropdown-item" href="../gallery/naisou.html">内装</a>
                            </div>
                        </li>
                        <div class="">
                            <a class="btn btn-secondary" href="../shop/member_login.html" role="button">ログイン</a>
                        </div>
                    </ul>
                </div>
            </nav>
        <main class="col">
        <div class="col font-center">
        <?php

        require_once('../common.php');

        $post = sanitize($_POST);

        $onamae = $post['onamae'];
        $email = $post['email'];
        $postal1 = $post['postal1'];
        $postal2 = $post['postal2'];
        $address = $post['address'];
        $tel1 = $post['tel1'];
        $tel2 = $post['tel2'];
        $tel3 = $post['tel3'];
        $chumon = $post['chumon'];
        $pass = $post['pass'];
        $pass2 = $post['pass2'];
        $danjo = $post['danjo'];
        $birth = $post['birth'];
        $okflg = true;

        if($onamae=='') {
            print 'お名前が入力されていません。<br /><br />';
            $okflg = false;
        } else {
            print 'お名前<br />';
            print $onamae;
            print '<br /><br />';
        }

        if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$email)==0) {
            print 'メールアドレスを正確に入力してください。<br /><br />';
            $okflg = false;
        } else {
            print 'メールアドレス<br />';
            print $email;
            print '<br /><br />';
        }

        if(preg_match("/^[0-9]+$/",$postal1)==0) {
            print '郵便番号は半角数字で入力してください。<br /><br />';
            $okflg = false;
        } else {
            print '郵便番号<br />';
            print $postal1;
            print '-';
            print $postal2;
            print '<br /><br />';
        }

        if(preg_match("/^[0-9]+$/",$postal2)==0) {
            print '郵便番号は半角数字で入力してください。<br /><br />';
            $okflg = false;
        }

        if($address=='') {
            print '住所が入力されていません。<br /><br />';
            $okflg = false;
        } else {
            print '住所<br />';
            print $address;
            print '<br /><br />';
        }

        if(preg_match("/^[0-9]{2,4}$/",$tel1)==0) {
            print '電話番号の左端の数値に誤りがあります。半角数字で正確に入力してください。<br />';
            print 'スペースを含んでいてもエラーになります。<br />';
            $okflg = false;
        } else {
            print '電話番号<br />';
            print $tel1;
            print '-';
            print $tel2;
            print '-';
            print $tel3;
            print '<br /><br />';
        }

        if(preg_match("/^[0-9]{2,4}$/",$tel2)==0) {
            print '電話番号の真ん中の数値に誤りがあります。半角数字で正確に入力してください。<br />';
            print 'スペースを含んでいてもエラーになります。<br />';
            $okflg = false;
        }

        if(preg_match("/^[0-9]{3,4}$/",$tel3)==0) {
            print '電話番号の右端の数値に誤りがあります。半角数字で正確に入力してください。<br />';
            print 'スペースを含んでいてもエラーになります。<br />';
            $okflg = false;
        }

        if($chumon=='chumontouroku') {
            if($pass=='') {
                print 'パスワードが入力されていません。<br /><br />';
                $okflg = false;
            }

            if($pass != $pass2) {
                print 'パスワードが一致しません。<br /><br />';
                $okflg = false;
            }

            print '性別<br />';
            if($danjo=='dan') {
                print '男性';
            } else {
                print '女性';
            }

            print '<br /><br />';
            print '生まれた年<br />';
            print $birth;
            print '年代';
            print '<br /><br />';
        }


        if($okflg==true) {
            print '<form method="post" action="shop_form_done.php">';
                print '<input type="hidden" name="onamae" value="'.$onamae.'">';
                print '<input type="hidden" name="email" value="'.$email.'">';
                print '<input type="hidden" name="postal1" value="'.$postal1.'">';
                print '<input type="hidden" name="postal2" value="'.$postal2.'">';
                print '<input type="hidden" name="address" value="'.$address.'">';
                print '<input type="hidden" name="tel1" value="'.$tel1.'">';
                print '<input type="hidden" name="tel2" value="'.$tel2.'">';
                print '<input type="hidden" name="tel3" value="'.$tel3.'">';
                print '<input type="hidden" name="chumon" value="'.$chumon.'">';
                print '<input type="hidden" name="pass" value="'.$pass.'">';
                print '<input type="hidden" name="danjo" value="'.$danjo.'">';
                print '<input type="hidden" name="birth" value="'.$birth.'">';
                print '<input type="button" onclick="history.back()" value="戻る">';
                print '<input type="submit" value="OK">';
                print '<form>';
                } else {
                    print '<form>';
                        print '<input type="button" onclick="history.back()" value="戻る">';
                        print '</form>';
                    }

                    ?>
            </div>
     </main>
</div>
</div>
</body>
</html>
