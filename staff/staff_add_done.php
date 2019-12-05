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
        session_start();
        session_regenerate_id(true);
        if(isset($_SESSION['login'])==false) {
          print 'ログインされていません。<br />';
          print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
          exit();
        } else {
          print $_SESSION['staff_name'];
          print 'さんログイン中<br />';
          print '<br />';
        }

            try {

              require_once('../common.php');

              $post = sanitize($_POST);
              $staff_name = $post['name'];
              $staff_pass = $post['pass'];

              $dsn = 'mysql:dbname=golnrrfq_shop;host=localhost;charset=utf8';
              $user = 'root';
              $password = 'root';
              $dbh = new PDO($dsn, $user, $password);
              $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              $sql = 'INSERT INTO mst_staff(name, password) VALUES (?,?)';
              $stmt = $dbh->prepare($sql);
              $data[] = $staff_name;
              $data[] = $staff_pass;
              $stmt->execute($data);

              $dbh = null;

              print $staff_name;
              print 'さんを追加しました。<br />';

            } catch(Exception $e) {
              print 'ただいま障害により大変ご迷惑をお掛けしております。';
              exit();
            }

            ?>

            <a href = "staff_list.php">戻る</a>

        </main>
    </div>
</div>
</body>
</html>
