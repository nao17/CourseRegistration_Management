<?php
//htmlフォームで登録された場合
if (isset($_POST["register"])){

//登録された単位数を格納する
$langMajor = $_POST["CreditLangMajor"];
$langOther = $_POST["CreditLangOther"];
$langC = $_POST["CreditLangAreaC"];
$langEng = $_POST["CreditLangEnglish"];


var_dump($langMajor);
echo "登録に成功しました。";
echo "登録した専攻言語単位数は $langMajor";
echo "登録した教養外国語単位数は $langOther";
echo "登録した地域言語c単位数は $langC";
echo "登録したGLIP単位数は $langEng";

//取得数の和
$langTotal = $langMajor + $langOther + $langC + $langEng;

echo "言語単位の合計は $langTotal";

}



 ?>



<!DOCTYPE html>
<html lang="ja">
  <head>
    <<meta charset="UTF-8">
<title>"取得単位管理システム"</title>
</head>
<body>
     <h1>累計取得単位数を登録してください</h1>

 <form action="" method="post">
    専攻言語単位数: <br />
    <input type="number" name="CreditLangMajor"><br />
    教養外国語単位数: <br />
    <input type="number" name="CreditLangOther"><br />
    地域言語c単位数: <br />
    <input type="number" name="CreditLangAreaC"><br />
    GLIP単位数: <br />
    <input type="number" name="CreditLangEnglish"><br />
    <br />
    <input type="submit" name = "register" value="Register" />
    <br />
</form>
