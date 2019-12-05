<?php
session_start();
session_regenerate_id(true);
?>

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
        <main>
        <br>
        <br>
        <?php
        
            try {

            require_once('../common.php');

            $post = sanitize($_POST);

            $onamae = $post['onamae'];
            $email = $post['email'];
            $inquiry = $post['inquiry'];

            print $onamae.'様<br />';
            print 'お問い合わせありがとうございました。<br /><br />';
            print $email.'に確認のメールを送りましたのでご確認ください。<br /><br />';
            print '確認のメールが届かない場合はお手数お掛けしますが、アドレスに間違いがないか再度ご確認ください。<br /><br />';
            print 'ご質問は後日返答させていただきます。<br /><br />';


            $honbun = '';
            $honbun .= $onamae."様 \r\n\r\n この度はお問い合わせありがとうございました。\r\n";
            $honbun .= "問い合わせ内容\r\n\r\n";
            $honbun .= $inquiry."\r\n";

            $dsn = "mysql:dbname=golnrrfq_shop;host=localhost;charset=utf8";
            $user = "root";
            $password = "root";
            $dbh = new PDO($dsn,$user,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql = 'INSERT INTO dat_inquiry(name, email, inquiry) VALUES (?,?,?)';
            $stmt = $dbh->prepare($sql);
            $data = array();
            $data[] = $onamae;
            $data[] = $email;
            $data[] = $inquiry;
            $stmt->execute($data);

            $sql = 'SELECT LAST_INSERT_ID()';
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            $lastcode = $rec['LAST_INSERT_ID()'];

            $sql = 'UNLOCK TABLES';
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            $dbh = null;

            if($inquiry=='inquiry') {
                print 'お問い合わせが完了しました。<br />';
                print 'ストアからの返信をお待ちください。<br />';
                print '通常１〜２営業日でのご返事となります。<br />';
                print '<br />';
            }

            $honbun .= "□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□\r\n";
            $honbun .= "〜安心野菜のサンプル農園〜\r\n";
            $honbun .= "\r\n";
            $honbun .= "岩手県一関市田舎群過疎村 123–4\r\n";
            $honbun .= "TEL: 0199-33-○○○○\r\n";
            $honbun .= "e-mail: sanpuru@yagoo.co.jp\r\n";
            $honbun .= "□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□\r\n";


            $title = 'ご質問ありがとうございます。';
            $header = 'From: info@rokumarunouen.co.jp';
            $honbun = html_entity_decode($honbun, ENT_QUOTES, 'UTF-8');
            mb_language('Japanese');
            mb_internal_encoding('UTF-8');
            mb_send_mail($email, $title, $honbun, $header);

            $title = 'お客様から質問がありました。';
            $header = 'From:'.$email;
            $honbun = html_entity_decode($inquiry, ENT_QUOTES, 'UTF-8');
            mb_language('Japanese');
            mb_internal_encoding('UTF-8');
            mb_send_mail('info@rokumarunouen.co.jp', $title, $inquiry, $header);

            } catch (Exception $e) {
            print 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
            }

            ?>

            <br />
        </main>
    </div>
</div>
</body>
</html>
