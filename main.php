<?php
session_start();
if (isset($_SESSION["NAME"])) {
	echo '<table>';
	echo '<td>';
	echo '<th>'. htmlspecialchars($_SESSION["NAME"], ENT_QUOTES). 'さんとしてログインしています。</th>';
	echo '<th><a href="main.php">マイページ</a></th>';
	echo '</td>';
	echo '</table>';
	$Str_Name = $_SESSION["NAME"];
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
<title>"取得単位管理システム"</title>
<link rel="stylesheet" href="CourseRegi_Style_20171004.css">
</head>
  <header>
	   <h1>マイページ</h1>
  		<p><u><?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?></u>さんとしてログインしています。</p>
  </header>
<body>
<table>
	<tr>
	<td>Register</td>
	<td><a href="Rg_DB.php">登録する</a>/<a href="edit_DB.php">編集する</a></td>
	</tr>
	<tr>
	<td>Plan</td>
	<td><a href="CourseRegistration_Manage_20170930.php">計算する</a></td>
	</tr>
	<tr>
		<td>Confirm</td>
	<td><a href="confirm_credit.php">累計取得数を確認する</a></td>
</tr>
<table>
</body>
<?

//遷移したら最初にidを格納
//$postid1 = $_POST['NumberEdit'];
//echo "$postid1 ";
//サーバーに接続
require_once('cfg2.php');
	try {
			$pdo = new PDO(MYSQL_DSN, MYSQL_USER, MYSQL_PW,
			array(PDO::ATTR_EMULATE_PREPARES => false));
	} catch (PDOException $e) {
			exit('データベース接続失敗。'.$e->getMessage());
}


$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM creditN  where name = :name";

$stmhR = $pdo->prepare($sql);
$stmhR->bindValue(":name", "$Str_Name");
$stmhR ->execute();

while($rowsR = $stmhR->fetch(PDO::FETCH_ASSOC)){
//登録された単位数を格納する
$langMajor = $rowsR['langMajor'];
$langOther = $rowsR['langOther'];
$langC = $rowsR['langC'];
$langEng = $rowsR['langEng'];

$AreaBasis = $rowsR['AreaBasis'];
$ReportBasis = $rowsR['ReportBasis'];
$LiteracyBasis = $rowsR['LiteracyBasis'];

$ResultlaA = $rowsR['ResultlaA'];
$ResultlaB = $rowsR['ResultlaB'];
$ResultlaC = $rowsR['ResultlaC'];

$ResultIntro = $rowsR['ResultIntro'];
$ResultIntro2 = $rowsR['ResultIntro2'];
$ResultElectiveLec = $rowsR['ResultElectiveLec'];
$ResultElectiveSeminar = $rowsR['ResultElectiveSeminar'];
$ResultElectiveReportExe = $rowsR['ResultElectiveReportExe'];
$ResultElectiveReport = $rowsR['ResultElectiveReport'];

$Resultsport = $rowsR['Resultsport'];
$ResultRele = $rowsR['ResultRele'];
}

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
//基礎科目
$BasisTotal = array_sum($CreditBasisAll);
//専修科目
$EleTotal = array_sum($CreditIntroEleArray);
//そのほか
$ETCTotal = $Resultsport + $ResultRele;

$CreditTotal = $langTotal + $laTotal + $BasisTotal + $EleTotal + $ETCTotal;
?>
<h2>取得している単位数:<?  echo "$CreditTotal";?></h2>

<?
		}else {
			header("Location: login_manage_20171202.php");
			exit();

		}?>
