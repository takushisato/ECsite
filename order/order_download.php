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
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ｍｙECサイト：ダウンロード画面</title>
  </head>
  <body>

    <?php
    require_once('../common.php');
    ?>

    ダウンロードしたい注文日を選んでください。<br />
    <form action="order_download_done.php" method="post">
    <br />
    <?php pulldown_year(); ?>
    年
    <?php pulldown_month(); ?>
    月
    <?php pulldown_day(); ?>
    日<br />
    <br />
    <input type="submit" value="ダウンロードへ">
    </form>

  </body>
</html>
