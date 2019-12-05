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
        <main class="col">
          <br>
        <br>
        <div class="youkoso">
            <?php
            if(isset($_SESSION['member_login'])==false) {
                print 'ようこそ、ゲスト様<br />';
                '<br />';
            } else {
                print 'ようこそ、';
                print $_SESSION['member_name'];
                print '様';
                print '<a href="member_logout.php">ログアウト</a><br />';
                print '<br />';
            }
            ?>
        </div>
               <div class="syouhin-gazou">
                   <?php
                   try {
                       $pro_code = $_GET['procode'];

                       $dsn = 'mysql:dbname=golnrrfq_shop;host=localhost;charset=utf8';
                       $user = 'root';
                       $password = 'root';
                       $dbh = new PDO($dsn, $user, $password);
                       $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                       $sql = 'SELECT name, price, gazou FROM mst_product WHERE code=?';
                       $stmt = $dbh->prepare($sql);
                       $data[] = $pro_code;
                       $stmt->execute($data);

                       $rec = $stmt->fetch(PDO::FETCH_ASSOC);
                       $pro_name = $rec['name'];
                       $pro_price = $rec['price'];
                       $pro_gazou_name = $rec['gazou'];

                       $dbh = null;

                       if($pro_gazou_name=='') {
                           $disp_gazou='';
                       } else {
                           $disp_gazou = '<img class="img-fluid" src="../product/gazou/'.$pro_gazou_name.'">';
                       }
                   } catch (Exception $e) {
                       print 'ただいま障害により大変ご迷惑をお掛けしております。';
                       exit();
                   }

                   ?>
               <div class="youkoso">商品情報参照</div> <br />
               </div>
               <div class="syouhin-setumei col-12">
                   <br />
                   <?php print $disp_gazou; ?>
                   <br>
                   <br />
                   商品コード:
                   <?php print $pro_code; ?>
                   <br />
                   商品名:
                   <?php print $pro_name; ?>
                   <br />
                   価格:
                   <?php print $pro_price; ?>円
                   <br />
                   <form>
                   <input type="button" onclick="history.back()" value="戻る">
                   <?php print '<a href="shop_cartin.php?procode='.$pro_code.'">
                   <button type="button" class="btn btn-danger rounded-0 w-25 p-0">カートに入れる</button></a>'; ?>
                    </form>
               </div>
            <br />
            <br />
        </main>
    </div>
<footer class="col-12 bg-light border-top border-bottom">
<div class="sns-icon">
<ul class="follow-me">
    <li><a href="https://twitter.com/taku820801"></a></li>
    <li><a href="https://www.facebook.com/profile.php?id=100005894676306"></a></li>
    <li><a href="https://www.resume.id/taku820801"></a></li>
</ul>
</div>
<p class="f-moji">©︎takuchan shopping saite</p>
</footer>
</div>
</body>
</html>
