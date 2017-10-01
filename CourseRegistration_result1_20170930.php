<!DOCTYPE html>
<html lang="ja">
  <head>
    <<meta charset="UTF-8">
<title>"取得単位管理システム"</title>
</head>
<body>
  <h1>累計取得した単位数・今後必要な単位数を表示します</h1>
<?php



//htmlフォームで登録された場合
if (isset($_POST["register"])){



//登録された単位数を格納する
$facultyName = $_POST["faculty"];
$langMajor = $_POST["CreditLangMajor"];
$langOther = $_POST["CreditLangOther"];
$langC = $_POST["CreditLangAreaC"];
$langEng = $_POST["CreditLangEnglish"];
$AreaBasis = $_POST["CreditAreaBasis"];
$ReportBasis = $_POST["CreditReportBasis"];
$LiteracyBasis = $_POST["CreditLiteracyBasis"];
  //配列で格納
  //言語
  $CreditlangAll = array($langMajor, $langOther, $langC, $langEng);
  $NamelangAll = array('専攻言語', '教養外国語', '地域言語c', 'GLIP');
  $CountlangAll = count($CreditlangAll);
  //基礎系
  $CreditBasisAll = array($AreaBasis, $ReportBasis, $LiteracyBasis);
  $NameBasisAll = array('地域基礎', '基礎演習', '基礎リテラシー');
  $CountBasisAll = count($CreditBasisAll);

//卒業に必要な単位数を前もって格納
$requireAreaBasis = 6;
$requireReportBasis = 2;
$requireLiteracyBasis = 1;


var_dump($langMajor);

//学部で分岐
if ($facultyName == "国際社会学部" ) {
  # code...
  echo "<h2>登録に成功しました。</h2>";

//以下はテスト用。同内容をテーブル表示
  /*echo
    "登録した専攻言語単位数は $langMajor<br>
    登録した教養外国語単位数は $langOther<br>
    登録した地域言語c単位数は $langC<br>
    登録したGLIP単位数は $langEng<br>";*/
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

  //残り必要単位の表示
  $langNeed = 36 - $langTotal;
  echo "<h2>残り必要な言語単位は $langNeed</h2>";
//次もテスト。同じ内容がループでテーブル表示されている。
  /*echo
    "登録した地域基礎単位数は $AreaBasis<br>
    登録した基礎演習単位数は $ReportBasis<br>
    登録した基礎リテラシ-単位数は $LiteracyBasis<br>";*/

    ?>
    <table border="1">
    <?php
      echo "<tr>";
      echo "<th>". "登録した基礎科目". "</th>";
      echo "<th>". "単位数". "</th>";
      echo "</tr>";

      for ($i=0; $i < $CountBasisAll; $i++) {
        # code...
        echo "<tr>";
        echo "<td>". $NameBasisAll[$i]. "</td>";
        echo "<td>". $CreditBasisAll[$i]. "</td>";
        echo "</tr>";
        }

      ?>
      </table>

    <?php

     if ($AreaBasis == $requireAreaBasis ) {
       # code...
       echo "地域基礎の必要単位数は$requireAreaBasis <br>";
       echo "よって必要な単位数は確保されています<br>";
     } else {
       # code...
       echo "地域基礎の必要単位数は$requireAreaBasis <br>";
       echo "よって必要な単位数に足りていません<br>";
     }

     if ($ReportBasis == $requireReportBasis ) {
       # code...
       echo "基礎演習の必要単位数は$requireReportBasis <br>";
       echo "よって必要な単位数は確保されています<br>";
     } else {
       # code...
       echo "基礎演習の必要単位数は$requireReportBasis <br>";
       echo "よって必要な単位数に足りていません<br>";
     }

     if ($LiteracyBasis == $requireLiteracyBasis ) {
       # code...
       echo "基礎リテラシーの必要単位数は$requireLiteracyBasis <br>";
       echo "よって必要な単位数は確保されています<br>";
     } else {
       # code...
       echo "基礎リテラシーの必要単位数は$requireLiteracyBasis <br>";
       echo "よって必要な単位数に足りていません<br>";
     }






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
