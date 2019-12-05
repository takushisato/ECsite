<?php
session_start();
session_regenerate_id(true);
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ｍｙＥCサイト</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/styles.css">
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
        <main class="coll">
        <br>
        <br>

        <?php

            try {

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
            $danjo = $post['danjo'];
            $birth = $post['birth'];

            print $onamae.'様<br />';
            print 'ご注文ありがとうございました。<br /><br />';
            print $email.'にメールを送りましたのでご確認ください。<br /><br />';
            print '商品は以下の住所に発送させていただきます。<br /><br />';
            print $postal1.'-'.$postal2.'<br />';
            print $address.'<br />';
            print $tel1.'-'.$tel2.'-'.$tel3.'<br /><br />';

            $honbun = '';
            $honbun .= $onamae."様 \r\n\r\n この度はご注文ありがとうございました。¥n";
            $honbun .= "\r\n";
            $honbun .= "ご注文商品 \r\n";
            $honbun .= "---------------\r\n";

            $cart = $_SESSION['cart'];
            $kazu = $_SESSION['kazu'];
            $max = count($cart);

            $dsn = "mysql:dbname=golnrrfq_shop;host=localhost;charset=utf8";
            $user = "root";
            $password = "root";
            $dbh = new PDO($dsn,$user,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            for($i=0; $i<$max; $i++) {
              $sql = "SELECT name, price FROM mst_product WHERE code=?";
              $stmt = $dbh->prepare($sql);
              $data[0] = $cart[$i];
              $stmt->execute($data);

              $rec = $stmt->fetch(PDO::FETCH_ASSOC);

              $name = $rec['name'];
              $price = $rec['price'];
              $kakaku[] = $price;
              $suryo = $kazu[$i];
              $shokei = $price * $suryo;

              $honbun .= $name.'';
              $honbun .= $price.'円 x';
              $honbun .= $suryo.'個 =';
              $honbun .= $shokei."円 \r\n";
            }

            $sql = 'LOCK TABLES dat_sales WRITE, dat_sales_product WRITE, dat_member WRITE';
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            $lastmembercode = 0;
            if($chumon=='chumontouroku') {
                $sql = 'INSERT INTO dat_member (password, name, email, postal1, postal2, address, tel1, tel2, tel3, danjo, born) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
                $stmt = $dbh->prepare($sql);
                $data = array();
                $data[] = md5($pass);
                $data[] = $onamae;
                $data[] = $email;
                $data[] = $postal1;
                $data[] = $postal2;
                $data[] = $address;
                $data[] = $tel1;
                $data[] = $tel2;
                $data[] = $tel3;

                if($danjo=='dan') {
                    $data[] = 1;
                } else {
                    $data[] = 2;
                }

                $data[] = $birth;
                $stmt->execute($data);

                $sql = 'SELECT LAST_INSERT_ID()';
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                $rec = $stmt->fetch(PDO::FETCH_ASSOC);
                $lastmembercode = $rec['LAST_INSERT_ID()'];
            }

            $sql = 'INSERT INTO dat_sales(code_member, name, email, postal1, postal2, address, tel1, tel2, tel3) VALUES (?,?,?,?,?,?,?,?,?)';
            $stmt = $dbh->prepare($sql);
            $data = array();
            $data[] = $lastmembercode;
            $data[] = $onamae;
            $data[] = $email;
            $data[] = $postal1;
            $data[] = $postal2;
            $data[] = $address;
            $data[] = $tel1;
            $data[] = $tel2;
            $data[] = $tel3;
            $stmt->execute($data);

            $sql = 'SELECT LAST_INSERT_ID()';
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            $lastcode = $rec['LAST_INSERT_ID()'];

            for($i=0; $i<$max; $i++) {
              $sql = 'INSERT INTO dat_sales_product(code_sales, code_product, price, quantity) VALUES (?,?,?,?)';
              $stmt = $dbh->prepare($sql);
              $data = array();
              $data[] = $lastcode;
              $data[] = $cart[$i];
              $data[] = $kakaku[$i];
              $data[] = $kazu[$i];
              $stmt->execute($data);
            }

            $sql = 'UNLOCK TABLES';
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            $dbh = null;

            if($chumon=='chumontouroku') {
                print '会員登録が完了しました。<br />';
                print '次回からメールアドレスとパスワードでログインしてください。<br />';
                print 'ご注文が簡単にできる様になります。<br />';
                print '<br />';
            }

            $honbun .= "送料は無料です。\r\n";
            $honbun .= "--------------\r\n";
            $honbun .= "\r\n";
            $honbun .= "代金は以下の口座にお振込ください。\r\n";
            $honbun .= "サンプル銀行 サンプル支店 普通 1234567\r\n";
            $honbun .= "入金が確認され次第、発送させていただきます。\r\n";
            $honbun .= "\r\n";

            if($chumon=='chumontouroku') {
                $honbun .= "会員登録が完了しました。\r\n";
                $honbun .= "次回からメールアドレスとパスワードでログインしてください。\r\n";
                $honbun .= "ご注文が簡単にできる様になります。\r\n";
                $honbun .= "\r\n";
            }

            $honbun .= "□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□\r\n";
            $honbun .= "〜安心野菜のサンプル農園〜\r\n";
            $honbun .= "\r\n";
            $honbun .= "岩手県一関市田舎群過疎村 123–4\r\n";
            $honbun .= "TEL: 0199-33-○○○○\r\n";
            $honbun .= "e-mail: sanpuru@yagoo.co.jp\r\n";
            $honbun .= "□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□□\r\n";

            $title = 'ご注文ありがとうございます。';
            $header = 'From: info@rokumarunouen.co.jp';
            $honbun = html_entity_decode($honbun, ENT_QUOTES, 'UTF-8');
            mb_language('Japanese');
            mb_internal_encoding('UTF-8');
            mb_send_mail($email, $title, $honbun, $header);

            $title = 'お客様からご注文がありました。';
            $header = 'From:'.$email;
            $honbun = html_entity_decode($honbun, ENT_QUOTES, 'UTF-8');
            mb_language('Japanese');
            mb_internal_encoding('UTF-8');
            mb_send_mail('info@rokumarunouen.co.jp', $title, $honbun, $header);

            } catch (Exception $e) {
            print 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
            }

            ?>

            <br />
            <a href="shop_list.php">商品画面へ</a>
        </main>
    </div>
</div>
</body>
</html>
