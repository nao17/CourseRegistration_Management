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
		<td>
			取得単位を<a href="Rg_DB.php">登録する</a> </br>
			取得単位を<a href="edit_DB.php">編集する</a> </br>
		</td>
	</tr>
		<tr>
			<td>Plan</td>
				<td>
					<a href="plan_new.php">目標を立てる</a> </br>
					<a href="plan.php">目標を更新する</a>(設定した目標もこちらから確認できます) </br>
				</td>
		</tr>
	<tr>
		<td>Confirm</td>
	<td>
		<a href="confirm_credit.php">累計取得数を確認する</a> </br>
	</td>
</tr>
</table>


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
require_once('cfg2.php');
$sqlP2 = "SELECT * FROM creditP2  where name = :name";

$stmhP2 = $pdo->prepare($sqlP2);
$stmhP2->bindValue(":name", "$Str_Name");
$stmhP2 ->execute();

while($rowsP2 = $stmhP2->fetch(PDO::FETCH_ASSOC)){
//登録された単位数を格納する
$YearTP2 = $rowsP2['YearT'];
$termTP2 = $rowsP2['termT'];

$langMajorP2 = $rowsP2['langMajor'];
$langOtherP2 = $rowsP2['langOther'];
$langCP2 = $rowsP2['langC'];
$langEngP2 = $rowsP2['langEng'];

$AreaBasisP2 = $rowsP2['AreaBasis'];
$ReportBasisP2 = $rowsP2['ReportBasis'];
$LiteracyBasisP2 = $rowsP2['LiteracyBasis'];

$ResultlaAP2 = $rowsP2['ResultlaA'];
$ResultlaBP2 = $rowsP2['ResultlaB'];
$ResultlaCP2 = $rowsP2['ResultlaC'];

$ResultIntroP2 = $rowsP2['ResultIntro'];
$ResultIntro2P2 = $rowsP2['ResultIntro2'];
$ResultElectiveLecP2 = $rowsP2['ResultElectiveLec'];
$ResultElectiveSeminarP2 = $rowsP2['ResultElectiveSeminar'];
$ResultElectiveReportExeP2 = $rowsP2['ResultElectiveReportExe'];
$ResultElectiveReportP2 = $rowsP2['ResultElectiveReport'];

$ResultsportP2 = $rowsP2['Resultsport'];
$ResultReleP2 = $rowsP2['ResultRele'];
}
	$CreditlangArrayP2 = array($langMajorP2, $langOtherP2, $langCP2, $langEngP2);
	$CreditBasisArrayP2 = array($AreaBasisP2, $ReportBasisP2, $LiteracyBasisP2);
	$CreditLaArrayP2 = array($ResultlaAP2, $ResultlaBP2, $ResultlaCP2);
	$CreditEleArrayP2 = array($ResultIntroP2, $ResultIntro2P2, $ResultElectiveLecP2, $ResultElectiveSeminarP2, $ResultElectiveReportExeP2, $ResultElectiveReportP2);
	$CreditETCArrayP2 = array($ResultsportP2, $ResultReleP2);

		$CreditlangTotalP2  = array_sum($CreditlangArrayP2);
		$CreditBasisTotalP2 = array_sum($CreditBasisArrayP2);
		$CreditLaTotalP2 = array_sum(	$CreditLaArrayP2);
		$CreditEleTotalP2 = array_sum($CreditEleArrayP2);
		$CreditETCTotalP2 = array_sum($CreditETCArrayP2);

			if ($termTP2 == "spring"){
				$termTP2 = "春";
			}
			if ($termTP2 == "summer"){
				$termTP2 = "夏";
			}
			if ($termTP2 == "fall"){
				$termTP2 = "秋";
			}
			if ($termTP2 == "winter"){
				$termTP2 = "冬";
			}

			$CreditTotalP2 = $CreditlangTotalP2 + $CreditBasisTotalP2 + $CreditLaTotalP2 + $CreditEleTotalP2 + $CreditETCTotalP2;
				echo '<h3>'. $YearTP2. "年".  $termTP2. "学期". "において";
				echo $CreditTotalP2. "単位の取得を目標としています。". '</h3>';
?>
<table>
	<tr>
	<td>ログアウト</td>
	<td>	<a href="logout_20171202.php">ログアウトする</a></td>
	</tr>
	<tr>
	<td>マイページ</td>
	<td>	<a href="main.php">マイページに戻る</a></td>
	</tr>
</table>
<?
		}else {
			header("Location: login_manage_20171202.php");
			exit();

		}?>
