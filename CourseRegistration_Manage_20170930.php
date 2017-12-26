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




     <h1>累計取得単位数の入力フォーム</h1>
   <h2 id = "link1">2016年度入学のみに対応しています。2017,11,18</h2>
<h3>所属を登録してください。</h3>
<h4>学部</h4>
<div id = "StyleReg">
 <form action="CourseRegistration_result1_20170930.php" method="post">
   <input type="radio" name="faculty" value="国際社会学部">国際社会学部
<input type="radio" name="faculty" value="言語文化学部">言語文化学部
<input type="radio" name="faculty" value="外国語学部">外国語学部<br />
</div>

  <h3>取得単位数を入力してください。</h3>

<h4>言語単位</h4>
  <div id = "StyleReg">
    専攻言語単位数:
    <input type="number" name="CreditLangMajor"><br />
    教養外国語単位数:
    <input type="number" name="CreditLangOther"><br />
    地域言語c単位数:
    <input type="number" name="CreditLangAreaC"><br />
    GLIP単位数:
    <input type="number" name="CreditLangEnglish"><br />
</div>
<div id = "line">
  </div>

<h4>基礎単位</h4>
  <div id = "StyleReg">
    地域基礎単位数:
    <input type="number" name="CreditAreaBasis"><br />
    基礎演習単位数:
    <input type="number" name="CreditReportBasis"><br />
    基礎リテラシー単位数:
    <input type="number" name="CreditLiteracyBasis"><br />
</div>
<div id = "line">
  </div>

<h4>世界教養</h4>
  <div id = "StyleReg">
    世界教養区分ア:
    <input type="number" name="CreditlaA"><br />
    世界教養区分イ:
    <input type="number" name="CreditlaB"><br />
    世界教養区分ウ:
    <input type="number" name="CreditlaC"><br />
</div>
<div id = "line">
  </div>

<h4>専修単位</h4>
  <div id = "StyleReg">

    導入科目:
    <input type="number" name="CreditIntro"><br />
    概論:
    <input type="number" name="CreditIntro2"><br />
    選択科目 講義:
    <input type="number" name="CreditElectiveLec"><br />
    選択科目 ゼミ:
    <input type="number" name="CreditElectiveSeminar"><br />
    選択科目 卒論演習:
    <input type="number" name="CreditElectiveReportExe"><br />
    選択科目 卒論:
    <input type="number" name="CreditElectiveReport"><br />
</div>
<div id = "line">
  </div>

<h4>他</h4>
  <div id = "StyleReg">
    スポーツ:
    <input type="number" name="CreditSport"><br />
    関連科目:
    <input type="number" name="CreditRele"><br />
</div>
<div id = "line">
  </div>



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
<div id = "StyleReg">
    <br />
    <input type="submit" name = "register" value="Register" /><br /><br />
    <br />
</form>

<div id ="link">
  <a href = "#link1"> ページの先頭に戻る</a>
  </div>
</body>
</html>
<?
		}else {
			header("Location: login_manage_20171222.php");
			exit();

		}
		?>
