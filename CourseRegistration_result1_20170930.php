<?php
session_start();
if (isset($_SESSION["NAME"])) {
	echo "ログイン中です。";
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
<title>"取得単位管理システム"</title>
<link rel="stylesheet" href="CourseRegi_Style_20171004.css">
</head>
<header>
   <h1>BBS</h1>
    <p><u><?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?></u>さんとしてログインしています。</p>
</header>
<body>
  <h1>累計取得した単位数・今後必要な単位数を表示します</h1>
<?php

//htmlフォームで登録された場合
if (isset($_POST["register"])){

var_dump($_POST["CreditlaA"]);

//登録された単位数を格納する
$facultyName = $_POST["faculty"];

$langMajor = $_POST["CreditLangMajor"];
$langOther = $_POST["CreditLangOther"];
$langC = $_POST["CreditLangAreaC"];
$langEng = $_POST["CreditLangEnglish"];

$AreaBasis = $_POST["CreditAreaBasis"];
$ReportBasis = $_POST["CreditReportBasis"];
$LiteracyBasis = $_POST["CreditLiteracyBasis"];

$ResultlaA = $_POST["CreditlaA"];
$ResultlaB = $_POST["CreditlaB"];
$ResultlaC = $_POST["CreditlaC"];

$ResultIntro = $_POST["CreditIntro"];
$ResultIntro2 = $_POST["CreditIntro2"];
$ResultElectiveLec = $_POST["CreditElectiveLec"];
$ResultElectiveSeminar = $_POST["CreditElectiveSeminar"];
$ResultElectiveReportExe = $_POST["CreditElectiveReportExe"];
$ResultElectiveReport = $_POST["CreditElectiveReport"];

$Resultsport = $_POST["CreditSport"];
$ResultRele = $_POST["CreditRele"];


  //取得単位数の配列
  //取得単位数の配列ー言語
  $CreditlangAll = array($langMajor, $langOther, $langC, $langEng);
    $NamelangAll = array('専攻言語', '教養外国語', '地域言語c', 'GLIP');
    $CountlangAll = count($CreditlangAll);
  //取得単位数の配列ー基礎系
  $CreditBasisAll = array($AreaBasis, $ReportBasis, $LiteracyBasis);
    $NameBasisAll = array('地域基礎', '基礎演習', '基礎リテラシー');
    $CountBasisAll = count($CreditBasisAll);
  //取得単位数の配列ー世界教養
  $CreditlaAll = array($ResultlaA, $ResultlaB, $ResultlaC);
    //名前を格納
    $laA = "世界教養区分ア";
    $laB = "世界教養区分イ";
    $laC = "世界教養区分ウ";
    //名前の配列



    $laAll = array($laA, $laB, $laC);
    $cntla = count($laAll);



  $CreditIntroEleArray = array($ResultIntro, $ResultIntro2, $ResultElectiveLec, $ResultElectiveSeminar, $ResultElectiveReportExe,$ResultElectiveReport);
   $cntIntroEle = count($CreditIntroEleArray);
    $NameIntroEleArray = array("導入科目","概論", "選択科目 講義", "選択科目 ゼミ", "選択科目 卒論演習", "択科目 卒論");
//和
//言語単位の和
$langTotal = $langMajor + $langOther + $langC + $langEng;
//世界教養
$laTotal = array_sum($CreditlaAll);

//卒業に必要な単位数を前もって格納
$requirelang = 36;
//　必要な単位数　基礎系
$requireAreaBasis = 6;
$requireReportBasis = 2;
$requireLiteracyBasis = 1;
//必要な単位数 教養
$requirelaA = 4;
$requirelaB = 6;
$requirelaC = 2;
$requirelaAll = 16;
//選択系

$reqIntro= 8;
$reqIntro2 = 4;
$reqElectiveLec = 18;
$reqElectiveSeminar = 4;
$reqElectiveReportExe= 4;
$reqElectiveReport = 8;
//他

$reqSport = 1;
$reqRele = 17;
  //必要単位数の配列
  $CreditReqBasisAll = array($requireAreaBasis, $requireReportBasis, $requireLiteracyBasis);
  $CreditReqlaArray = array($requirelaA, $requirelaB, $requirelaC);
  $ReqIntroEleArray = array($reqIntro, $reqIntro2, $reqElectiveLec, $reqElectiveSeminar, $reqElectiveReportExe, $reqElectiveReport);

//関連科目の計算
//各項目の差　必要な単位数からすでにある単位数を引く
$GapLang = $requirelang - $langTotal;
$GaplaAll = $requirelaAll - $laTotal;
$GapIntro = $reqIntro - $ResultIntro;
$GapIntro2 = $reqIntro2 - $ResultIntro2;
$GapElectiveLec = $reqElectiveLec - $ResultElectiveLec;
$GapElectiveSeminar = $reqElectiveSeminar - $ResultElectiveSeminar;
$GapElectiveReportExe = $reqElectiveReportExe - $ResultElectiveReportExe;
$GapElectiveReport = $reqElectiveReport - $ResultElectiveReport;

//デバック
var_dump($GaplaAll);

//もし関連科目に算入する分がない（正）場合、値gapは無視する（0として扱う)
if ($GapLang >= 0) {
  $GapLang = 0;
}
if ($GaplaAll >= 0) {
  $GaplaAll = 0;
}
if ($GapIntro >= 0) {
  $GapIntro = 0;
}
if ($GapIntro2 >= 0) {
  $GapIntro2 = 0;
}
if ($GapElectiveLec >= 0) {
  $GapElectiveLec = 0;
}
if ($GapElectiveSeminar >= 0) {
  $GapElectiveSeminar = 0;
}
if ($GapElectiveReportExe >= 0) {
  $GapElectiveReportExe = 0;
}
if ($GapElectiveReport >= 0) {
  $GapElectiveReport = 0;
}

//デバック
var_dump($GaplaAll);
//余った単位をまとめておく（負）
$CreditRestSumMinus = $GapLang + $GaplaAll + $GapIntro + $GapIntro2 + $GapElectiveLec + $GapElectiveSeminar + $GapElectiveReportExe + $GapElectiveReport;
//デバック
var_dump($CreditRestSumMinus);

//まとめたものを正に直しておく
$CreditRestSumPlus = abs($CreditRestSumMinus);

//デバック var_dump($CreditRestSumPlus);

//関連科目は全てでいくつあるのか和
$CreditRelTotal = $ResultRele + $CreditRestSumPlus;
//デバック var_dump($CreditRelTotal);
$GapRelTotal = $reqRele - $CreditRelTotal;
//デバック var_dump($GapRelTotal);

//チェック
//var_dump($CreditReqBasisAll);
//var_dump($ResultlaA);



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
    echo "<h3>言語科目</h3>";
?>

<table border="1">
<?php
  echo "<tr>";
  echo "<th>". "登録した言語科目". "</th>";
  echo "<th>". "取得単位数". "</th>";
  echo "</tr>";

  for ($i=0; $i < $CountlangAll; $i++) {
    # code...
    echo "<tr>";
    echo "<td>". $NamelangAll[$i]. "</td>";
    echo "<td>". $CreditlangAll[$i]. "</td>";
    echo "</tr>";
    }

    //取得数の和
    echo "<tr>";
    echo "<th>". "取得した言語単位の合計". "</th>";
    echo "<th>". "$langTotal". "</th>";
    echo "</tr>";
    ?>
  </table>

<?php

  //残り必要単位の表示
  $langNeed = $requirelang - $langTotal;
  echo "残り必要な言語単位は $langNeed<br><br>";
//次もテスト。同じ内容がループでテーブル表示されている。
  /*echo
    "登録した地域基礎単位数は $AreaBasis<br>
    登録した基礎演習単位数は $ReportBasis<br>
    登録した基礎リテラシ-単位数は $LiteracyBasis<br>";*/

    ?>
    <?php echo "<h3>基礎科目</h3>"; ?>
    <table border="1">
    <?php
      echo "<tr>";
      echo "<th>". "登録した基礎科目". "</th>";
      echo "<th>". "取得単位数". "</th>";
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

        <table border="1">
    <?php
    echo "<tr>";
    echo "<th>". "登録した基礎科目". "</th>";
    echo "<th>". "必要単位数". "</th>";
    echo "<th>". "判定". "</th>";
    echo "</tr>";

    for ($i=0; $i < $CountBasisAll; $i++) {
      # code...
      echo "<tr>";
      echo "<td>". $NameBasisAll[$i]. "</td>";
      echo "<td>". $CreditReqBasisAll[$i]. "</td>";
      if ($CreditBasisAll[$i] >= $CreditReqBasisAll[$i]) {
        # code...
        echo "<td>必要な単位数は確保されています</td>";
      }else {
        # code...
        $NeedBasisAll[$i] = $CreditReqBasisAll[$i] - $CreditBasisAll[$i];
        echo "<td>単位数が足りません。あと". $NeedBasisAll[$i]. "単位必要です。</td>";
      }
      echo "</tr>";
      }

    ?>
    </table>

<?php
echo "<br><br>";
echo "<h3>世界教養科目</h3>"; ?>
    <table border="1">
    <?php
      echo "<tr>";
      echo "<th>". "登録した世界教養科目". "</th>";
      echo "<th>". "取得単位数". "</th>";
      echo "</tr>";

      for ($i=0; $i < $cntla; $i++) {
        # code...
        echo "<tr>";
        echo "<td>". $laAll[$i]. "</td>";
        echo "<td>". $CreditlaAll[$i]. "</td>";
        echo "</tr>";
        }

      ?>
      </table>

    <table border="1">
<?php
echo "<tr>";
echo "<th>". "登録した世界教養科目". "</th>";
echo "<th>". "必要単位数". "</th>";
echo "<th>". "判定". "</th>";
echo "</tr>";

for ($i=0; $i < $cntla; $i++) {
  # code...
  echo "<tr>";
  echo "<td>". $laAll[$i]. "</td>";
  echo "<td>". $CreditReqlaArray[$i]. "</td>";
  if ($CreditlaAll[$i] >= $CreditReqlaArray[$i]) {
    # code...
    echo "<td>必要な単位数は確保されています</td>";
  }else {
    # code...
    $NeedlaAll[$i] = $CreditReqlaArray[$i] - $CreditlaAll[$i];
    echo "<td>単位数が足りません。あと". $NeedlaAll[$i]. "単位必要です。</td>";
  }
  echo "</tr>";
  }
?>
</table>
<?php

if ($laTotal >= $requirelaAll) {
  # code...
  echo "世界教養全体では". $requirelaAll. "の単位が必要です。<br>
  全体として単位数は十分です。<br><br>
  " ;
}else {
  # code...
  echo "世界教養全体では". $requirelaAll. "の単位が必要です。<br>
  全体として単位数は不十分です。<br><br>
  " ;
}

 ?>


<?php
?>
<?php echo "<h3>専修プログラム</h3>"; ?>
<table border="1">
<?php
  echo "<tr>";
  echo "<th>". "登録した専修プログラム". "</th>";
  echo "<th>". "取得単位数". "</th>";
  echo "</tr>";

  for ($i=0; $i < $cntIntroEle; $i++) {
    # code...
    echo "<tr>";
    echo "<td>". $NameIntroEleArray[$i]. "</td>";
    echo "<td>". $CreditIntroEleArray[$i]. "</td>";
    echo "</tr>";
    }

  ?>
  </table>

    <table border="1">
<?php
echo "<tr>";
echo "<th>". "登録した専修科目". "</th>";
echo "<th>". "必要単位数". "</th>";
echo "<th>". "判定". "</th>";
echo "</tr>";

for ($i=0; $i < $cntIntroEle; $i++) {
  # code...
  echo "<tr>";
  echo "<td>". $NameIntroEleArray[$i]. "</td>";
  echo "<td>". $ReqIntroEleArray[$i]. "</td>";
  if ($CreditIntroEleArray[$i] >= $ReqIntroEleArray[$i]) {
    # code...
    echo "<td>必要な単位数は確保されています</td>";
  }else {
    # code...
    $NeedIntroEleArray[$i] = $ReqIntroEleArray[$i] - $CreditIntroEleArray[$i];
    echo "<td>単位数が足りません。あと". $NeedIntroEleArray[$i] . "単位必要です。</td>";
  }
  echo "</tr>";
  }

?>
</table>

<?php echo "<h3>その他</h3>"; ?>
<table border="1">
<?php
  echo "<tr>";
  echo "<th>". "登録したその他". "</th>";
  echo "<th>". "取得単位数". "</th>";
  echo "</tr>";


    echo "<tr>";
    echo "<td>". "スポーツ科目". "</td>";
    echo "<td>". $Resultsport. "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>". "関連科目（直接入力したもの）". "</td>";
    echo "<td>". $ResultRele. "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>". "関連科目（他の余り）". "</td>";
    echo "<td>". $CreditRestSumPlus. "</td>";
    echo "</tr>";

  ?>
  </table>


     <table border="1">
 <?php
 echo "<tr>";
 echo "<th>". "登録したその他の科目". "</th>";
 echo "<th>". "必要単位数". "</th>";
 echo "<th>". "判定". "</th>";
 echo "</tr>";


   echo "<tr>";
   echo "<td>". "スポーツ科目". "</td>";
   echo "<td>". $reqSport . "</td>";
   if ($Resultsport >= $reqSport) {
     # code...
     echo "<td>必要な単位数は確保されています</td>";
   }else {
     # code...
     $NeedSport = $reqSport - $Resultsport;
     echo "<td>単位数が足りません</td> ";
   }
   echo "</tr>";


   echo "<tr>";
   echo "<td>". "関連科目". "</td>";
   echo "<td>". $reqRele . "</td>";
   if ($CreditRelTotal >= $reqRele) {
     # code...
     echo "<td>必要な単位数は確保されています。". $CreditRelTotal. "単位あります。 </td>";
   }else {
     # code...
     echo "<td>単位数が足りません。". $GapRelTotal. "単位必要です。</td>";
   }
   echo "</tr>";

 ?>
 </table>
<?php







} else {
  # code...
  echo "<h2>申し訳ございません。現在、国際社会学部のみ対応しております</h2>";
}


}



 ?>

</body>
</html>

<?

		}else {
			header("Location: login_manage_20171202.php");
			exit();

		}
		?>
