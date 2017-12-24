<?php
session_start();
if (isset($_SESSION["NAME"])) {
	echo "ログイン中です。";
?>
<html>
<head>
<title>reimbursement form</title>
<link rel="stylesheet" type="text/css" href="display_style.css">
<meta http-equiv="content-type" charset="utf-8">
</head>
<header>
	<h1>BBS</h1>
  		<p><u><?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?></u>さんとしてログインしています。</p>
  </header>
  <?php
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
  ?>

  <?php
  //テーブル情報をmysqlより取得
  $sql = "SELECT * FROM creditN";
  $stmh = $pdo->prepare($sql);
  $stmh->execute();
  //$rows = $stmh->fetchAll();

  //取得した情報をテーブル表示
  echo "<table>";
  $ArrayDisplay= array('専攻言語単位数', '教養外国語単位数', '地域言語c単位数', 'GLIP単位数');
  $NumArrayDisplay = count($ArrayDisplay);
  var_dump($NumArrayDisplay);

      echo "<tr>";
    for ($i=0; $i < $NumArrayDisplay  ; $i++) {
  	   echo "<td>$ArrayDisplay[$i]</td>";
      }
      echo "</tr>";

var_dump($rows['name']);

    while($rows = $stmh->fetch(PDO::FETCH_ASSOC)){
      echo "<tr>";
      echo "<td>". $rows['langMajor']. "</td>";
      echo "<td>". $rows['langOther']. "</td>";
      echo "<td>". $rows['langC']. "</td>";
      echo "<td>". $rows['langEng']. "</td>";
      echo "</tr>";
  }
  echo "</table>";

  $stmh2 = $pdo->prepare($sql);
  $stmh2 ->execute();

  echo "<table>";
  $ArrayDisplay= array('地域基礎単位数', '基礎演習単位数', '基礎リテラシー単位数');
  $NumArrayDisplay = count($ArrayDisplay);
  var_dump($NumArrayDisplay);

      echo "<tr>";
    for ($i=0; $i < $NumArrayDisplay  ; $i++) {
       echo "<td>$ArrayDisplay[$i]</td>";
      }
      echo "</tr>";

    while($rows2 = $stmh2->fetch(PDO::FETCH_ASSOC)){
      echo "<tr>";
      echo "<td>". $rows2['AreaBasis']. "</td>";
      echo "<td>". $rows2['ReportBasis']. "</td>";
      echo "<td>". $rows2['LiteracyBasis']. "</td>";
      echo "</tr>";
  }
  echo "</table>";


  $stmh3 = $pdo->prepare($sql);
  $stmh3 ->execute();

  echo "<table>";
  $ArrayDisplay= array('世界教養区分ア', '世界教養区分イ', '世界教養区分ウ');
  $NumArrayDisplay = count($ArrayDisplay);
  var_dump($NumArrayDisplay);

      echo "<tr>";
    for ($i=0; $i < $NumArrayDisplay  ; $i++) {
       echo "<td>$ArrayDisplay[$i]</td>";
      }
      echo "</tr>";



    while($rows3 = $stmh3->fetch(PDO::FETCH_ASSOC)){
      echo "<tr>";
      echo "<td>". $rows3['ResultlaA']. "</td>";
      echo "<td>". $rows3['ResultlaB']. "</td>";
      echo "<td>". $rows3['ResultlaC']. "</td>";
      echo "</tr>";
  }
  echo "</table>";

  $stmh4 = $pdo->prepare($sql);
  $stmh4 ->execute();


  echo "<table>";
  $ArrayDisplay= array('導入科目', '概論', '選択科目 講義', '選択科目 ゼミ', '選択科目 卒論演習', '選択科目 卒論');
  $NumArrayDisplay = count($ArrayDisplay);
  var_dump($NumArrayDisplay);

      echo "<tr>";
    for ($i=0; $i < $NumArrayDisplay  ; $i++) {
       echo "<td>$ArrayDisplay[$i]</td>";
      }
      echo "</tr>";

    while($rows4 = $stmh4->fetch(PDO::FETCH_ASSOC)){
      echo "<tr>";
      echo "<td>". $rows4['ResultIntro']. "</td>";
      echo "<td>". $rows4['ResultIntro2']. "</td>";
      echo "<td>". $rows4['ResultElectiveLec']. "</td>";
      echo "<td>". $rows4['ResultElectiveSeminar']. "</td>";
      echo "<td>". $rows4['ResultElectiveReportExe']. "</td>";
      echo "<td>". $rows4['ResultElectiveReport']. "</td>";
      echo "</tr>";
  }
  echo "</table>";

  $stmh5 = $pdo->prepare($sql);
  $stmh5 ->execute();

  echo "<table>";
  $ArrayDisplay= array('スポーツ', '関連科目');
  $NumArrayDisplay = count($ArrayDisplay);
  var_dump($NumArrayDisplay);

      echo "<tr>";
    for ($i=0; $i < $NumArrayDisplay  ; $i++) {
       echo "<td>$ArrayDisplay[$i]</td>";
      }
      echo "</tr>";

    while($rows5 = $stmh5->fetch(PDO::FETCH_ASSOC)){
      echo "<tr>";
      echo "<td>". $rows5['Resultsport']. "</td>";
      echo "<td>". $rows5['ResultRele']. "</td>";
      echo "</tr>";
  }
  echo "</table>";
  ?>
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
    header("Location: login_manage_20171202.php");
    exit();
  }
  ?>
