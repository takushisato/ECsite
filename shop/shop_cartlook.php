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
        <main class="col-12">
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
            <?php
            try {
            $cart = $_SESSION['cart'];
            $kazu = $_SESSION['kazu'];
            $max = count($cart);

            if(isset($_SESSION['cart'])==true) {
              $cart = $_SESSION['cart'];
              $kazu = $_SESSION['kazu'];
              $max = count($cart);
            } else {
              $max = 0;
            }

            ?>
            <div class="youkoso">
                <?php
                if($max==0) {
                    print 'カートに商品が入っていません。<br />';
                    print '<br />';
                    print '<a href="shop_list.php">商品一覧へ戻る</a>';
                    exit();
                }
                ?>
            </div>
            <?php
            $dsn = 'mysql:dbname=golnrrfq_shop;host=localhost;charset=utf8';
            $user = 'root';
            $password = 'root';
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            foreach ($cart as $key => $val) {
              $sql = 'SELECT code, name, price, gazou FROM mst_product WHERE code=?';
              $stmt = $dbh->prepare($sql);
              $data[0] = $val;
              $stmt->execute($data);

              $rec = $stmt->fetch(PDO::FETCH_ASSOC);

              $pro_name[] = $rec['name'];
              $pro_price[] = $rec['price'];

              if($rec['gazou']=='') {
                $pro_gazou[] = '';
              } else {
                $pro_gazou[] = '<img width="400" src="../product/gazou/'.$rec['gazou'].'">';
              }
            }

            $dbh = null;

            } catch (Exception $e) {
            print 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
            }

            ?>
            <div class="youkoso">
                <a href="clear_cart.php">カートの中身を空にする</a>
                <br />
                <br />
                カートの中身<br />
            </div>
            <br>
            <div class="container">
                    <form action="kazu_change.php" method="post">
                        <div class="row">
                            <table class="font-center col-12">
                                <?php for($i=0; $i<$max; $i++)
                                {
                                    ?>
                                        <tr class="table">
                                            <th class=""><?php print $pro_gazou[$i]; ?></th>
                                            <th class="col-12 font-center">
                                                <div class="#">商品名：<?php print $pro_name[$i]; ?></div>
                                                <div class="#">価格：<?php print $pro_price[$i]; ?>円</div>
                                                <div class="#">数量：<input type="text" name="kazu<?php print $i; ?>" value="<?php print $kazu[$i]; ?>"></div>
                                                <div class="#">小計：<?php print $syoukei[$i] = $pro_price[$i] * $kazu[$i]; ?>円</div>
                                                <div class="#">削除：<input type="checkbox" name="sakujo<?php print $i; ?>"></div>
                                                <div class="col-12"><p></p></div><br>
                                                <div class="col-12"><p></p></div><br>
                                            </th>
                                        </tr>
                                    <?php
                                    $goukei[] += $syoukei[$i];
                                }
                                ?>
                                <div class="col-12">
                                    <?php
                                    print '合計金額 ';
                                    print array_sum($goukei);
                                    print '円';
                                    ?>
                                </div>
                            </table>
                            <input type="hidden" name="max" value="<?php print $max; ?>">
                            <br />
                        </div>
                    </div>
                    <div class="col-12"><p></p></div><br>
                    <div class="col-12 font-center">
                        <input type="submit" value="数量変更">
                        <input type="button" onclick="history.back()" value="戻る">
                    </div>
                    </form>
            <br />
            <div class="font-center"><a href="shop_form.html">ご購入手続きに進む</a></div>
            <br />
        <?php
        if(isset($_SESSION["member_login"])==true) {
            print '<a href="shop_kantan_check.php">会員かんたん注文へ進む</a>';
        }
        ?>
        <br>
        <br>
        <br>
        </main>
    </div>
</div>
</body>
</html>
