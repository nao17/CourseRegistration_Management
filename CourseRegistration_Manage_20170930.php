<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
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
/配列で格納
//言語
$CreditlangAll = array($langMajor, $langOther, $langC, $langEng);
$NamelangAll = array('専攻言語', '教養外国語', '地域言語c', 'GLIP');
$CountlangAll = count($CreditlangAll);


var_dump($langMajor);
echo "<h2>登録に成功しました。</h2>";


//以下はテスト用。同内容をループ・テーブル表示
  /*echo
    "登録した専攻言語単位数は $langMajor<br>
    登録した教養外国語単位数は $langOther<br>
    登録した地域言語c単位数は $langC<br>
    登録したGLIP単位数は $langEng<br>";
?>
<table border="1">
<?php
  echo "<tr>";
  echo "<th>". "登録した言語科目". "</th>";
  echo "<th>". "単位数". "</th>";
  echo "</tr>";

  for ($i=0; $i < $CountlangAll; $i++) {
    # code...
    echo "<tr>";
    echo "<td>". $NamelangAll[$i]. "</td>";
    echo "<td>". $CreditlangAll[$i]. "</td>";
    echo "</tr>";
    }

    //取得数の和
    $langTotal = $langMajor + $langOther + $langC + $langEng;
    echo "<tr>";
    echo "<th>". "言語単位の合計". "</th>";
    echo "<th>". "$langTotal". "</th>";
    echo "</tr>";
    ?>
  </table>

<?php
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

    世界教養区分ア: <br />
    <input type="number" name="CreditlaA"><br />
    世界教養区分イ: <br />
    <input type="number" name="CreditlaB"><br />
    世界教養区分ウ: <br />
    <input type="number" name="CreditlaC"><br />

    導入科目: <br />
    <input type="number" name="CreditIntro"><br />
    概論: <br />
    <input type="number" name="CreditIntro2"><br />
    選択科目 講義: <br />
    <input type="number" name="CreditElectiveLec"><br />
    選択科目 ゼミ: <br />
    <input type="number" name="CreditElectiveSeminar"><br />
    選択科目 卒論演習: <br />
    <input type="number" name="CreditElectiveReportExe"><br />
    選択科目 卒論: <br />
    <input type="number" name="CreditElectiveReport"><br />

    スポーツ: <br />
    <input type="number" name="CreditSport"><br />
    関連科目: <br />
    <input type="number" name="CreditRele"><br />

<?php
//ループだと反映されない。原因不明
/*
//名前を格納
$laA = "世界教養区分ア";
$laB = "世界教養区分イ";
$laC = "世界教養区分ウ";
//配列
$laAll = array($laA, $laB, $laC);
$cntla = count($laAll);
//名前を格納
$PostlaA="CreditlaA";
$PostlaB="CreditlaB";
$PostlaC="CreditlaC";
//配列
$PostlaAll = array("CreditlaA", "CreditlaB", "CreditlaC");
for ($i=0; $i < $cntla; $i++) {
  # code...
  echo $laAll[$i]. "単位数: <br />";
  echo "<input type=\"number\" name=　\"$PostlaAll[$i]\"><br />";
var_dump($PostlaAll[$i]);

}

*/

 ?>

    <br />
    <input type="submit" name = "register" value="Register" />
    <br />
</form>

</body>
</html>
