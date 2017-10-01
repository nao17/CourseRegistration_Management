<!DOCTYPE html>
<html lang="ja">
  <head>
    <<meta charset="UTF-8">
<title>"取得単位管理システム"</title>
</head>
<body>
<?php
//以下の内容は遷移先のファイルで処理する

/*
//htmlフォームで登録された場合
if (isset($_POST["register"])){

//登録された単位数を格納する
$langMajor = $_POST["CreditLangMajor"];
$langOther = $_POST["CreditLangOther"];
$langC = $_POST["CreditLangAreaC"];
$langEng = $_POST["CreditLangEnglish"];


var_dump($langMajor);
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



}

*/

 ?>




     <h1>累計取得単位数を登録してください</h1>

 <form action="CourseRegistration_result1_20170930.php" method="post">
   学部: <br />
   <input type="radio" name="faculty" value="国際社会学部">国際社会学部
<input type="radio" name="faculty" value="言語文化学部">言語文化学部
<input type="radio" name="faculty" value="外国語学部">外国語学部<br />
    専攻言語単位数: <br />
    <input type="number" name="CreditLangMajor"><br />
    教養外国語単位数: <br />
    <input type="number" name="CreditLangOther"><br />
    地域言語c単位数: <br />
    <input type="number" name="CreditLangAreaC"><br />
    GLIP単位数: <br />
    <input type="number" name="CreditLangEnglish"><br />

    地域基礎単位数: <br />
    <input type="number" name="CreditAreaBasis"><br />
    基礎演習単位数: <br />
    <input type="number" name="CreditReportBasis"><br />
    基礎リテラシー単位数: <br />
    <input type="number" name="CreditLiteracyBasis"><br />


    <br />
    <input type="submit" name = "register" value="Register" />
    <br />
</form>

</body>
</html>
