<!DOCTYPE html>
<html lang="ja">
  <head>
    <<meta charset="UTF-8">
<title>"取得単位管理システム"</title>
</head>
<body>

<?php



//htmlフォームで登録された場合
if (isset($_POST["register"])){



//登録された単位数を格納する
$facultyName = $_POST["faculty"];
$langMajor = $_POST["CreditLangMajor"];
$langOther = $_POST["CreditLangOther"];
$langC = $_POST["CreditLangAreaC"];
$langEng = $_POST["CreditLangEnglish"];

var_dump($langMajor);

if ($facultyName == "国際社会学部" ) {
  # code...
  echo "<h2>登録に成功しました。</h2>";


  echo
    "登録した専攻言語単位数は $langMajor<br>
    登録した教養外国語単位数は $langOther<br>
    登録した地域言語c単位数は $langC<br>
    登録したGLIP単位数は $langEng<br>";

  //取得数の和
  $langTotal = $langMajor + $langOther + $langC + $langEng;

  echo "<b>言語単位の合計は $langTotal</b>";

  //残り必要単位の表示
  $langNeed = 36 - $langTotal;
  echo "<h2>残り必要な言語単位は $langNeed</h2>";
} else {
  # code...
  echo "<h2>申し訳ございません。現在、国際社会学部のみ対応しております</h2>";
}

/*
echo "<h2>登録に成功しました。</h2>";


echo
  "登録した専攻言語単位数は $langMajor<br>
  登録した教養外国語単位数は $langOther<br>
  登録した地域言語c単位数は $langC<br>
  登録したGLIP単位数は $langEng<br>";

//取得数の和
$langTotal = $langMajor + $langOther + $langC + $langEng;

echo "<b>言語単位の合計は $langTotal</b>";

//残り必要単位の表示
$langNeed = 36 - $langTotal;
echo "<h2>残り必要な言語単位は $langNeed</h2>";

*/

}



 ?>

</body>
</html>
