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

 if(isset($_POST['name1'])){
   $name1 = $_POST['name1'];
 }
 else{
   //エラー
   $name1= "";
 }

 if(isset($_POST['name2'])){
   $name2 = $_POST['name2'];
 }
 else{
   //エラー
   $name2= "";
 }

 if(isset($_POST['furigana1'])){
   $furigana1 = $_POST['furigana1'];
 }
 else{
   //エラー
   $furigana1= "";
 }

 if(isset($_POST['furigana2'])){
   $furigana2 = $_POST['furigana2'];
 }
 else{
   //エラー
   $furigana2= "";
 }

 if(isset($_POST['phone'])){
   $phone = $_POST['phone'];
 }
 else{
   //エラー
   $phone= "";
 }

 if(isset($_POST['postnum1'])){
   $postnum1 = $_POST['postnum1'];
 }
 else{
   //エラー
   $postnum1 = "";
 }

 if(isset($_POST['postnum2'])){
   $postnum2 = $_POST['postnum2'];
 }
 else{
   //エラー
   $postnum2= "";
 }

 if(isset($_POST['city'])){
   $city = $_POST['city'];
 }
 else{
   //エラー
   $city= "市町村";
 }

 if(isset($_POST['adress'])){
   $adress = $_POST['adress'];
 }
 else{
   //エラー
   $adress= "番地";
 }

 if(isset($_POST['buildings'])){
   $buildings = $_POST['buildings'];
 }
 else{
   //エラー
   $buildings= "建物名";
 }

 if(isset($_POST['emargency'])){
   $emargency = $_POST['emargency'];
 }
 else{
   //エラー
   $emargency= "";
 }

 if(isset($_POST['mail'])){
   $mail = $_POST['mail'];
 }
 else{
   //エラー
   $mail= "";
 }

 if(isset($_POST['age'])){
   $age = $_POST['age'];
 }
 else{
   //エラー
   $age= "";
 }

 if(isset($_POST['job'])){
   $job = $_POST['job'];
 }
 else{
   //エラー
   $job= "";
 }

 if(isset($_POST['income'])){
   $income = $_POST['income'];
 }
 else{
   //エラー
   $income="";
 }

 if(isset($_POST['date'])){
   $date = $_POST['date'];
 }
 else{
   //エラー
   $date="";
 }

 if(isset($_POST['content'])){
   $content = $_POST['content'];
 }
 else{
   //エラー
   $content="";
 }
 ?>

 <?php
  function checked($value, $question){
    if(is_array($question)){
      //配列のとき、値が含まれていればtrue
      $isChecked = in_array($value, $question);
    }
    else{
      //配列ではないとき、値が一致すればtrue
      $isChecked = ($value===$question);
    }
    if($isChecked){
      //チェックする
      echo "checked";
    }
    else{
      echo "";
    }
  }
 ?>


<DOCTYPE html>
     <!--お問い合わせフォーム-->
     <html lang="ja">
       <head>
         <meta charset="utf-8">
         <title>入力ページ</title>
         <link rel="stylesheet" type="text/css" href="style.css">
       </head>

         <body>
           <!--入力フォームの作成-->
           <div class="inputForm">
            <form method="POST" class="form" action="check.php">
              <!--隠しフィールドにクーポンコードと商品IDを設定してPOSTする-->
              <ul class = "form">
                <li><label>お名前</label></li>
                  <span class="indent">性</span>
                    <input type ="text" name="name1" class="input0" value=<?php echo $name1?>>
                      <span class="indent2">　ー　名</span>
                        <input type ="text" name="name2" class="input2" value=<?php echo $name2?>><br>
                <li><label>ふりがな</label></li>
                  <span class="indent">性</span>
                    <input type ="text" name="furigana1" class="input0" value=<?php echo $furigana1?>>
                      <span class="indent2">　ー　名</span>
                        <input type ="text" name="furigana2" class="input2" value=<?php echo $furigana2?>><br>
                <li><label>電話番号</label></li>
                  <input type ="number" name="phone" class="input1" value=<?php echo $phone?>><br>
                <li><label>郵便番号</label></li>
                  <input type ="number" name="postnum1" class="input1" value=<?php echo $postnum1?>>
                    <span class="indent2">ー</span>
                      <input type ="number" name="postnum2" class="input2" value=<?php echo $postnum2?>>
                        <span class="indent2">(半角数字)</span><br>
                <li><label>ご住所</label></li>
                  <input type ="text" name="city" class="input5" value=<?php echo $city?>><br>
                  <input type ="text" name="adress" class="input3" value=<?php echo $adress?>><br>
                  <input type ="text" name="buildings" class="input3" value=<?php echo $buildings?>><br>
                <li><label>緊急連絡先</label></li>
                  <input type ="number" name="emargency" class="input5"　value=<?php echo $emargency?>>
                    <span class="indent2">(半角数字)</span><br>
                <li><label>メールアドレス</label></li>
                  <input type ="text" name="mail" class="input4" value=<?php echo $mail?>><br>
                <li><label>ご年齢</label></li>
                  <input type ="number" name="age" class="input1" value=<?php echo $age?>><br>
                <li><label>ご職業</label></li>
                  <input type ="text" name="job" class="input5" value=<?php echo $job?>><br>
                <li><label>ご年収</label></li>
                  <input type ="text" name="income" class="input5" value=<?php echo $income?>><br>
                <li><label>参加希望日</label></li>
                  <input type ="radio" name="date" class="input1" value="10月15日(土) 18:00~20:00" <?php checked("10月15日(土) 18:00~20:00", $date);?>>10月15日(土) 18:00~20:00<br>
                  <input type ="radio" name="date" class="input7" value="10月16日(日) 12:00~14:00" <?php checked("10月16日(日) 12:00~14:00", $date);?>>10月16日(日) 12:00~14:00<br>
                  <input type ="radio" name="date" class="input7" value="10月22日(土) 18:00~20:00" <?php checked("10月22日(土) 18:00~20:00", $date);?>>10月22日(土) 18:00~20:00<br>
                <li><label>その他ご要望など</label></li>
                  <input type ="text" name="content" class="input6" value=<?php echo $content?>><br>
                <li id ="orderBotton">
                  <input type="submit" value="送信する"style="background-color:#FFFF99;">
                </li>
              </ul>
            </form>
          </div>
        </body>
      </html>
