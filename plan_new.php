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
<html>
<head>
<title>Course registration manager</title>
<link rel="stylesheet" type="text/css" href="CourseRegi_Style_20171004.css">
<meta http-equiv="content-type" charset="utf-8">
</head>
<header>
	<h1>目標の設定</h1>
  		<p><u><?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?></u>さんとしてログインしています。</p>
      すでに立てた目標を<a href="plan.php">更新する</a>
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
	$Str_Name = $_SESSION["NAME"];
if (isset($_POST["register"])){
  $YearT = $_POST["YearT"];
  $termT = $_POST["termT"];

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

  $Resultsport = (int)$_POST["Resultsport"];
  $ResultRele = (int)$_POST["ResultRele"];

	$Str_Eid = $_POST['Edit_id'];

  //var_dump($ResultRele);
  $arrayStored = array($Str_Name, $Str_Comment);

  require_once('cfg2.php');
    try {
        $pdo = new PDO(MYSQL_DSN, MYSQL_USER, MYSQL_PW,
        array(PDO::ATTR_EMULATE_PREPARES => false));
    } catch (PDOException $e) {
        exit('データベース接続失敗。'.$e->getMessage());
  }

  $sqlE = "INSERT INTO creditP2 (name, YearT, termT, langMajor,  langOther, langC, langEng, AreaBasis, ReportBasis, LiteracyBasis, ResultlaA, ResultlaB, ResultlaC, ResultIntro, ResultIntro2, ResultElectiveLec, ResultElectiveSeminar, ResultElectiveReportExe,ResultElectiveReport, Resultsport, ResultRele) VALUES(:name, :YearT, :termT, :langMajor, :langOther, :langC, :langEng, :AreaBasis, :ReportBasis, :LiteracyBasis, :ResultlaA, :ResultlaB, :ResultlaC, :ResultIntro, :ResultIntro2, :ResultElectiveLec, :ResultElectiveSeminar, :ResultElectiveReportExe, :ResultElectiveReport, :Resultsport, :ResultRele)";

      $stmhE = $pdo->prepare($sqlE);
  		$stmhE->bindValue(":name", "$Str_Name");
      $stmhE->bindValue(":YearT", "$YearT");
      $stmhE->bindValue(":termT", "$termT");
      $stmhE->bindValue(":langMajor", $langMajor, PDO::PARAM_INT);
      $stmhE->bindValue(":langOther", $langOther, PDO::PARAM_INT);
      $stmhE->bindValue(":langC", $langC, PDO::PARAM_INT);
      $stmhE->bindValue(":langEng", $langEng, PDO::PARAM_INT);
      $stmhE->bindValue(":AreaBasis", $AreaBasis, PDO::PARAM_INT);
      $stmhE->bindValue(":ReportBasis", $ReportBasis, PDO::PARAM_INT);
      $stmhE->bindValue(":LiteracyBasis", $LiteracyBasis, PDO::PARAM_INT);
      $stmhE->bindValue(":ResultlaA", $ResultlaA, PDO::PARAM_INT);
      $stmhE->bindValue(":ResultlaB", $ResultlaB, PDO::PARAM_INT);
      $stmhE->bindValue(":ResultlaC", $ResultlaC, PDO::PARAM_INT);
      $stmhE->bindValue(":ResultIntro", $ResultIntro, PDO::PARAM_INT);
      $stmhE->bindValue(":ResultIntro2", $ResultIntro2, PDO::PARAM_INT);
      $stmhE->bindValue(":ResultElectiveLec", $ResultElectiveLec, PDO::PARAM_INT);
      $stmhE->bindValue(":ResultElectiveSeminar", $ResultElectiveSeminar, PDO::PARAM_INT);
      $stmhE->bindValue(":ResultElectiveReportExe", $ResultElectiveReportExe, PDO::PARAM_INT);
      $stmhE->bindValue(":ResultElectiveReport", $ResultElectiveReport, PDO::PARAM_INT);
      $stmhE->bindValue(":Resultsport", $Resultsport, PDO::PARAM_INT);
      $stmhE->bindValue(":ResultRele", $ResultRele, PDO::PARAM_INT);
			//$stmhE->bindValue(":id", $Str_Eid, PDO::PARAM_INT);
      $stmhE->execute();
//var_dump($stmhE);

}

/*$sql_display= 'select * from creditP2 where name =:name';
$ArrayPDOedit_display = array(':name'=>$Str_Name);
$stmt_display = $pdo -> prepare($sql_display);
$stmt_display -> execute($ArrayPDOedit_display );

while($rows6 = $stmt_display->fetch(PDO::FETCH_ASSOC)){
  echo $rows6['name']. "さんの単位情報を更新します";
  */?>
	<h3>目標の学期</h3>

  <h4>学年</h4>
  <form action="" method="post">
    <input type="radio" name="YearT" value=1>1年生
    <input type="radio" name="YearT" value=2>2年生
    <input type="radio" name="YearT" value=3>3年生
    <input type="radio" name="YearT" value=4>4年生
    <input type="radio" name="YearT" value=5>5年生
    <br />
    <h4>学期</h4>
    <input type="radio" name="termT" value="spring">春学期
    <input type="radio" name="termT" value="summer">夏学期
    <input type="radio" name="termT" value="fall">秋学期
    <input type="radio" name="termT" value="winter">冬学期
 </div>

   <h3>目標単位数を入力してください。</h3>

 <h4>言語単位</h4>
   <div id = "StyleReg">
     専攻言語単位数:
     <input type="number" name="CreditLangMajor" value="<?=$rows6['langMajor']?>"><br />
     教養外国語単位数:
     <input type="number" name="CreditLangOther" value="<?=$rows6['langOther']?>"><br />
     地域言語c単位数:
     <input type="number" name="CreditLangAreaC" value="<?=$rows6['langC']?>" ><br />
     GLIP単位数:
     <input type="number" name="CreditLangEnglish" value="<?=$rows6['langEng']?>"><br />
 </div>
 <div id = "line">
   </div>

 <h4>基礎単位</h4>
   <div id = "StyleReg">
     地域基礎単位数:
     <input type="number" name="CreditAreaBasis" value="<?=$rows6['AreaBasis']?>"><br />
     基礎演習単位数:
     <input type="number" name="CreditReportBasis" value="<?=$rows6['ReportBasis']?>"><br />
     基礎リテラシー単位数:
     <input type="number" name="CreditLiteracyBasis" value="<?=$rows6['LiteracyBasis']?>"><br />
 </div>
 <div id = "line">
   </div>

 <h4>世界教養</h4>
   <div id = "StyleReg">
     世界教養区分ア:
     <input type="number" name="CreditlaA" value="<?=$rows6['ResultlaA']?>"><br />
     世界教養区分イ:
     <input type="number" name="CreditlaB" value="<?=$rows6['ResultlaB']?>"><br />
     世界教養区分ウ:
     <input type="number" name="CreditlaC" value="<?=$rows6['ResultlaC']?>"><br />
 </div>
 <div id = "line">
   </div>

 <h4>専修単位</h4>
   <div id = "StyleReg">

     導入科目:
     <input type="number" name="CreditIntro" value="<?=$rows6['ResultIntro']?>"><br />
     概論:
     <input type="number" name="CreditIntro2" value="<?=$rows6['ResultIntro2']?>"><br />
     選択科目 講義:
     <input type="number" name="CreditElectiveLec" value="<?=$rows6['ResultElectiveLec']?>"><br />
     選択科目 ゼミ:
     <input type="number" name="CreditElectiveSeminar" value="<?=$rows6['ResultElectiveSeminar']?>"><br />
     選択科目 卒論演習:
     <input type="number" name="CreditElectiveReportExe" value="<?=$rows6['ResultElectiveReportExe']?>"><br />
     選択科目 卒論:
     <input type="number" name="CreditElectiveReport" value="<?=$rows6['ResultElectiveReport']?>"><br />
 </div>
 <div id = "line">
   </div>

 <h4>他</h4>
   <div id = "StyleReg">
     スポーツ:
     <input type="number" name="Resultsport" value="<?=$rows6['Resultsport']?>"><br />
     関連科目:
     <input type="number" name="ResultRele" value="<?=$rows6['ResultRele']?>"><br />
 </div>
 <div id = "line">
   </div>

 <div id = "StyleReg">
     <br />
     <input type="submit" name = "register" value="register" /><br /><br />
     <br />
 </form>
<?php
//whileループを閉じる
//}
 ?>

  <?
	//テーブル情報をmysqlより取得
	$sql = "SELECT * FROM creditP2  where name = :name";
	  $stmh = $pdo->prepare($sql);
	  $stmh->bindValue(":name", "$Str_Name");
	  $stmh->execute();
  //$rows = $stmh->fetchAll();

  //取得した情報をテーブル表示
	echo "<table>";
  $ArrayDisplay= array('専攻言語単位数', '教養外国語単位数', '地域言語c単位数', 'GLIP単位数');
  $NumArrayDisplay = count($ArrayDisplay);
  //var_dump($NumArrayDisplay);

      echo "<tr>";
    for ($i=0; $i < $NumArrayDisplay  ; $i++) {
  	   echo "<td>$ArrayDisplay[$i]</td>";
      }
      echo "</tr>";

//var_dump($rows['name']);

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
  $stmh2->bindValue(":name", "$Str_Name");
  $stmh2 ->execute();

  echo "<table>";
  $ArrayDisplay= array('地域基礎単位数', '基礎演習単位数', '基礎リテラシー単位数');
  $NumArrayDisplay = count($ArrayDisplay);
  //var_dump($NumArrayDisplay);

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
    $stmh3->bindValue(":name", "$Str_Name");
  $stmh3 ->execute();

  echo "<table>";
  $ArrayDisplay= array('世界教養区分ア', '世界教養区分イ', '世界教養区分ウ');
  $NumArrayDisplay = count($ArrayDisplay);
  //var_dump($NumArrayDisplay);

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
  $stmh4->bindValue(":name", "$Str_Name");
  $stmh4 ->execute();


  echo "<table>";
  $ArrayDisplay= array('導入科目', '概論', '選択科目 講義', '選択科目 ゼミ', '選択科目 卒論演習', '選択科目 卒論');
  $NumArrayDisplay = count($ArrayDisplay);
  //var_dump($NumArrayDisplay);

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
  $stmh5->bindValue(":name", "$Str_Name");
  $stmh5 ->execute();

  echo "<table>";
  $ArrayDisplay= array('スポーツ', '関連科目');
  $NumArrayDisplay = count($ArrayDisplay);
  //var_dump($NumArrayDisplay);

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
	echo'</br></br></br></br></br>';
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
    header("Location: login_manage_20171222.php");
    exit();
  }
  ?>
