
 <?php

 //入力された値の設定
 $name1 = $_POST['name1'];
 $name2 = $_POST['name2'];
 $furigana1 = $_POST['furigana1'];
 $furigana2 = $_POST['furigana2'];
 $phone = $_POST['phone'];
 $postnum1 = $_POST['postnum1'];
 $postnum2 = $_POST['postnum2'];
 $city = $_POST['city'];
 $adress = $_POST['adress'];
 $buildings = $_POST['buildings'];
 $emargency = $_POST['emargency'];
 $mail = $_POST['mail'];
 $age = $_POST['age'];
 $job = $_POST['job'];
 $income = $_POST['income'];
 $date = $_POST['date'];
 $content = $_POST['content'];
 ?>

 <?php
  mb_language("Japanese");
  mb_internal_encoding("UTF-8");

  $hostMail = "yuu.yoshi12@outlook.jp";
  $subject = "$name1 $name2";
  $message = "$furigana1 $furigana2\n
              $phone\n
              $postnum1 $postnum2\n
              $city $adress";
  $headers = "From: $mail";

  if(mb_send_mail($hostMail, $subject, $message, $headers)){
    echo "メールを送信しました";
  }
  else{
    echo "メールの送信に失敗しました。";
  }

?>

<DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>購入画面</title>
    <link rel="stylesheet" type="text/css" href="check-do.css">
  </head>

  <body>
      <ul class = "form">
      </ul>


  <!--戻るボタンのフォーム-->
  <form method="POST" action="index.php">
    <!--隠しフィールドに個数を設定してPOSTする-->
    <input type="hidden" name ="kosu" value="<?php echo $kosu;?>">
    <li id ="orderBotton"><input type="submit" value="トップに戻る"style="background-color:#EEEEEE;"></li>
    <imput type="submit" value="戻る">
    </form>
  </body>

  </html>
