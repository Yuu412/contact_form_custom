<?php
//=========文字エンコードの検証==============================
require_once("util.php");

if(!cken($_POST)){
  $encoding = mb_check_encoding();
  $err = "Encoding Error! The expected encoding is". $encoding;
  //エラーメッセージを表示して処理を終了させる
  exit($err);
}
//HTMLエスケープ(XSS対策)
$_POST = es($_POST);
 ?>

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
 //$dateはチェックボックスであるためPOSTされているか確かめる
 $content = $_POST['content'];

 if(isset($_POST['date'])){
   $date = $_POST['date'];
 }
 else{
   //エラー
   $date="";
 }
 ?>

 <?php
 $arr =[$name1,$name2,$furigana1,$furigana2,$phone,$postnum1,
        $postnum2,$city,$adress,$emargency,$mail,$age,$job,$income];
 foreach ($arr as $item) {
  if (preg_match('/^\s*$/u', $item)){
    $error = 1;
    break;
  }
  else{
    $error="";
  }
}
 ?>

<DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>購入画面</title>
    <link rel="stylesheet" type="text/css" href="check-do.css">
  </head>
<?php if(($error)!=1){?>
  <body>
      <ul class = "form">
        <li><label>お名前</label></li>
          <span class="input0"><?php echo $name1?></span>
          <span class="input2"><?php echo $name2?></span><br>
        <li><label>ふりがな</label></li>
          <span class="input0"><?php echo "$furigana1 $furigana2"?></span><br>
        <li><label>電話番号</label></li>
          <span class="input1"><?php echo $phone?></span><br>
        <li><label>郵便番号</label></li>
          <span class="input1"><?php echo "$postnum1-$postnum2"?></span><br>
        <li><label>ご住所</label></li>
          <span class="input3" ><?php echo "$city $adress $buildings"?></span><br>
        <li><label>緊急連絡先</label></li>
          <span class="input5"><?php echo $emargency?></span><br>
        <li><label>メールアドレス</label></li>
          <span class="input4"><?php echo $mail?></span><br>
        <li><label>ご年齢</label></li>
          <span class="input1"><?php echo $age?></span><br>
        <li><label>ご職業</label></li>
          <span class="input5"><?php echo $job?></span><br>
        <li><label>ご年収</label></li>
          <span class="input5"><?php echo $income?></span><br>
        <li><label>参加希望日</label></li>
          <span class="input1"><?php echo $date?></span><br>
        <li><label>その他ご要望など</label></li>
          <span class="input6"><?php echo $content?></span><br>
      </ul>


  <!--戻るボタンのフォーム-->
  <div class="orderBotton">
  <form method="POST" action="index.php">
    <!--隠しフィールドに個数を設定してPOSTする-->
    <input type="hidden" name ="name1" value="<?php echo $name1;?>">
      <input type="hidden" name ="name2" value="<?php echo $name2;?>">
      <input type="hidden" name ="furigana1" value="<?php echo $furigana1;?>">
      <input type="hidden" name ="furigana2" value="<?php echo $furigana2;?>">
      <input type="hidden" name ="phone" value="<?php echo $phone;?>">
      <input type="hidden" name ="postnum1" value="<?php echo $postnum1;?>">
      <input type="hidden" name ="postnum2" value="<?php echo $postnum2;?>">
      <input type="hidden" name ="city" value="<?php echo $city;?>">
      <input type="hidden" name ="adress" value="<?php echo $adress;?>">
      <input type="hidden" name ="buildings" value="<?php echo $buildings;?>">
      <input type="hidden" name ="emargency" value="<?php echo $emargency;?>">
      <input type="hidden" name ="mail" value="<?php echo $mail;?>">
      <input type="hidden" name ="age" value="<?php echo $age;?>">
      <input type="hidden" name ="job" value="<?php echo $job;?>">
      <input type="hidden" name ="income" value="<?php echo $income;?>">
      <input type="hidden" name ="date" value="<?php echo $date;?>">
      <input type="hidden" name ="content" value="<?php echo $content;?>">

      <input type="submit" value="内容を修正する" style="background-color:#FFFF99;">
  </form>


    <form method="POST" action="do.php">
      <!--隠しフィールドに個数を設定してPOSTする-->
      <input type="hidden" name ="name1" value="<?php echo $name1;?>">
        <input type="hidden" name ="name2" value="<?php echo $name2;?>">
        <input type="hidden" name ="furigana1" value="<?php echo $furigana1;?>">
        <input type="hidden" name ="furigana2" value="<?php echo $furigana2;?>">
        <input type="hidden" name ="phone" value="<?php echo $phone;?>">
        <input type="hidden" name ="postnum1" value="<?php echo $postnum1;?>">
        <input type="hidden" name ="postnum2" value="<?php echo $postnum2;?>">
        <input type="hidden" name ="city" value="<?php echo $city;?>">
        <input type="hidden" name ="adress" value="<?php echo $adress;?>">
        <input type="hidden" name ="buildings" value="<?php echo $buildings;?>">
        <input type="hidden" name ="emargency" value="<?php echo $emargency;?>">
        <input type="hidden" name ="mail" value="<?php echo $mail;?>">
        <input type="hidden" name ="age" value="<?php echo $age;?>">
        <input type="hidden" name ="job" value="<?php echo $job;?>">
        <input type="hidden" name ="income" value="<?php echo $income;?>">
        <input type="hidden" name ="date" value="<?php echo $date;?>">
        <input type="hidden" name ="content" value="<?php echo $content;?>">

      　<input type="submit" value="送信する" style="background-color:#FFFF99;">
    </form>
  </div>
  </body>
<?php } else{?>
  <body>
    <div class="center">
      <div class="error-msg">
        必須項目を入力してください。
      </div>
      <form method="POST" action="index.php">
        <input type="submit" value="戻る" style="background-color:#CCCCCC;">
      </form>
  </div>
  </body>
<?php }?>

  </html>
