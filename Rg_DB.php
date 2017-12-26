<?php
session_start();
if (isset($_SESSION["NAME"])) {
	$Str_Name = $_SESSION["NAME"];
	echo '<table>';
	echo '<td>';
	echo '<th>'. htmlspecialchars($_SESSION["NAME"], ENT_QUOTES). 'さんとしてログインしています。</th>';
	echo '<th><a href="main.php">マイページ</a></th>';
	echo '</td>';
	echo '</table>';
?>
<html>
<head>
<title>course registration manager</title>
<link rel="stylesheet" type="text/css" href="CourseRegi_Style_20171004.css">
<meta http-equiv="content-type" charset="utf-8">
</head>
<header>
	<h1>登録画面</h1>
  </header>
  <?php
if (isset($_POST["register"])){

  $Str_Name = $_SESSION["NAME"];

  $langMajor = (int)$_POST["CreditLangMajor"];
  $langOther = (int)$_POST["CreditLangOther"];
  $langC = (int)$_POST["CreditLangAreaC"];
  $langEng = (int)$_POST["CreditLangEnglish"];

  $AreaBasis = (int)$_POST["CreditAreaBasis"];
  $ReportBasis = (int)$_POST["CreditReportBasis"];
  $LiteracyBasis = (int)$_POST["CreditLiteracyBasis"];

  $ResultlaA = (int)$_POST["CreditlaA"];
  $ResultlaB = (int)$_POST["CreditlaB"];
  $ResultlaC = (int)$_POST["CreditlaC"];

  $ResultIntro = (int)$_POST["CreditIntro"];
  $ResultIntro2 = (int)$_POST["CreditIntro2"];
  $ResultElectiveLec = (int)$_POST["CreditElectiveLec"];
  $ResultElectiveSeminar = (int)$_POST["CreditElectiveSeminar"];
  $ResultElectiveReportExe = (int)$_POST["CreditElectiveReportExe"];
  $ResultElectiveReport = (int)$_POST["CreditElectiveReport"];

  $Resultsport = (int)$_POST["CreditSport"];
  $ResultRele = (int)$_POST["CreditRele"];
  var_dump($ResultRele);
  $arrayStored = array($Str_Name, $Str_Comment);

  require_once('cfg2.php');
    try {
        $pdo = new PDO(MYSQL_DSN, MYSQL_USER, MYSQL_PW,
        array(PDO::ATTR_EMULATE_PREPARES => false));
    } catch (PDOException $e) {
        exit('データベース接続失敗。'.$e->getMessage());
  }

  $sql = "INSERT INTO creditN (name,  langMajor,  langOther, langC, langEng, AreaBasis, ReportBasis, LiteracyBasis, ResultlaA, ResultlaB, ResultlaC, ResultIntro, ResultIntro2, ResultElectiveLec, ResultElectiveSeminar, ResultElectiveReportExe,ResultElectiveReport, Resultsport, ResultRele) VALUES(:name, :langMajor, :langOther, :langC, :langEng, :AreaBasis, :ReportBasis, :LiteracyBasis, :ResultlaA, :ResultlaB, :ResultlaC, :ResultIntro, :ResultIntro2, :ResultElectiveLec, :ResultElectiveSeminar, :ResultElectiveReportExe, :ResultElectiveReport, :Resultsport, :ResultRele)";
var_dump(  $sql);

      $stmh = $pdo->prepare($sql);
  		$stmh->bindValue(":name", "$Str_Name");
      $stmh->bindValue(":langMajor", $langMajor, PDO::PARAM_INT);
      $stmh->bindValue(":langOther", $langOther, PDO::PARAM_INT);
      $stmh->bindValue(":langC", $langC, PDO::PARAM_INT);
      $stmh->bindValue(":langEng", $langEng, PDO::PARAM_INT);
      $stmh->bindValue(":AreaBasis", $AreaBasis, PDO::PARAM_INT);
      $stmh->bindValue(":ReportBasis", $ReportBasis, PDO::PARAM_INT);
      $stmh->bindValue(":LiteracyBasis", $LiteracyBasis, PDO::PARAM_INT);
      $stmh->bindValue(":ResultlaA", $ResultlaA, PDO::PARAM_INT);
      $stmh->bindValue(":ResultlaB", $ResultlaB, PDO::PARAM_INT);
      $stmh->bindValue(":ResultlaC", $ResultlaC, PDO::PARAM_INT);
      $stmh->bindValue(":ResultIntro", $ResultIntro, PDO::PARAM_INT);
      $stmh->bindValue(":ResultIntro2", $ResultIntro2, PDO::PARAM_INT);
      $stmh->bindValue(":ResultElectiveLec", $ResultElectiveLec, PDO::PARAM_INT);
      $stmh->bindValue(":ResultElectiveSeminar", $ResultElectiveSeminar, PDO::PARAM_INT);
      $stmh->bindValue(":ResultElectiveReportExe", $ResultElectiveReportExe, PDO::PARAM_INT);
      $stmh->bindValue(":ResultElectiveReport", $ResultElectiveReport, PDO::PARAM_INT);
      $stmh->bindValue(":Resultsport", $Resultsport, PDO::PARAM_INT);
      $stmh->bindValue(":ResultRele", $ResultRele, PDO::PARAM_INT);
      $stmh->execute();
var_dump($stmh);

}

  ?>
  <form action="" method="post">
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

 <div id = "StyleReg">
     <br />
     <input type="submit" name = "register" value="register" /><br /><br />
     <br />
 </form>


  <?
  }else {
    header("Location: login_manage_20171222.php");
    exit();
  }
  ?>
