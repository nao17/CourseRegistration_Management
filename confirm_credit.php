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
<title>取得済み単位情報</title>
<link rel="stylesheet" type="text/css" href="CourseRegi_Style_20171004.css">
<meta http-equiv="content-type" charset="utf-8">
</head>
<header>
	<h1>単位数</h1>
<u><?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?></u>さんの
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
  //$sql = "SELECT * FROM creditN　WHERE name = :name";
$sql = "SELECT * FROM creditN  where name = :name";
  //$rows = $stmh->fetchAll();
  /*$stmhSum = $pdo->prepare($sql);
  $stmhSum->bindValue(":name", "$Str_Name");
  $stmhSum ->execute();
  while($rowsSum = $stmhSum->fetch(PDO::FETCH_ASSOC)){
    $Cresum = array_sum($rowsSum);

  } */?>


<?php
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
  //var_dump($GaplaAll);

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
  //var_dump($GaplaAll);
  //余った単位をまとめておく（負）
  $CreditRestSumMinus = $GapLang + $GaplaAll + $GapIntro + $GapIntro2 + $GapElectiveLec + $GapElectiveSeminar + $GapElectiveReportExe + $GapElectiveReport;
  //デバック
  //var_dump($CreditRestSumMinus);

  //まとめたものを正に直しておく
  $CreditRestSumPlus = abs($CreditRestSumMinus);

  //デバック var_dump($CreditRestSumPlus);

  //関連科目は全てでいくつあるのか和
  $CreditRelTotal = $ResultRele + $CreditRestSumPlus;
  //デバック var_dump($CreditRelTotal);
  $GapRelTotal = $reqRele - $CreditRelTotal;
?>
  <table border="1">
  <?php
  $langNeed = $requirelang - $langTotal;

  echo "<h3>言語科目</h3>"; 

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
      echo "<th>". "残り必要な言語単位". "</th>";
      echo "<th>". "$langNeed". "</th>";
      echo "</tr>";
      ?>
    </table>
        <?php echo "<h3>基礎科目</h3>"; ?>
        <table border="1">
        <?php
          echo "<tr>";
          echo "<th>". "登録した基礎科目". "</th>";
          echo "<th>". "取得単位数". "</th>";
          echo "<th>". "判定". "</th>";
          echo "</tr>";

          for ($i=0; $i < $CountBasisAll; $i++) {
            # code...
            echo "<tr>";
            echo "<td>". $NameBasisAll[$i]. "</td>";
            echo "<td>". $CreditBasisAll[$i]. "</td>";
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
          echo "<th>". "判定". "</th>";
          echo "</tr>";

          for ($i=0; $i < $cntla; $i++) {
            # code...
            echo "<tr>";
            echo "<td>". $laAll[$i]. "</td>";
            echo "<td>". $CreditlaAll[$i]. "</td>";
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
        echo "<th>". "判定". "</th>";
      echo "</tr>";

      for ($i=0; $i < $cntIntroEle; $i++) {
        # code...
        echo "<tr>";
        echo "<td>". $NameIntroEleArray[$i]. "</td>";
        echo "<td>". $CreditIntroEleArray[$i]. "</td>";
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
  <?
  $stmh = $pdo->prepare($sql);
  $stmh->bindValue(":name", "$Str_Name");
  $stmh->execute();
  //取得した情報をテーブル表示

  echo "<table>";
  $ArrayDisplay= array('専攻言語単位数', '教養外国語単位数', '地域言語c単位数', 'GLIP単位数');
  $NumArrayDisplay = count($ArrayDisplay);
  //var_dump($NumArrayDisplay);
  echo "<h3>入力した単位数</h3>";
  echo "不審な点があればこちらを確認してください。<br><br>";

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
  ?>
  <?

  }else {
  	header("Location: login_manage_20171202.php");
  	exit();

  }
  ?>
