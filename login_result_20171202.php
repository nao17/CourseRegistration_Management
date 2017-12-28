<?php

if (isset($_POST["login" ])) {
  session_start();

  if (empty($_POST["userid" ])) {  // emptyは値が空のとき
      $errorMessage ="ユーザーIDが未入力です。" ;
      echo "$errorMessage";
  } else if (empty($_POST["password" ])) {
      $errorMessage = "パスワードが未入力です" ;
      echo "$errorMessage";
  }
  require_once('cfg2.php');

  try {
    $pdo = new PDO(MYSQL_DSN, MYSQL_USER, MYSQL_PW,
    array(PDO::ATTR_EMULATE_PREPARES => false));
  } catch (PDOException $e) {
    exit('データベース接続失敗。'.$e->getMessage());
  }
  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  $userid = $_POST["userid" ];
  $password = $_POST["password" ];


  $sql_pass_login= 'select * from userData where name =:login_id';
  $Array_userid = array(':login_id'=>$userid );
  $stmt_pass_login = $pdo -> prepare($sql_pass_login);
  $stmt_pass_login -> execute($Array_userid);

  //while($rows_pass_login = $stmt_pass_login->fetch(PDO::FETCH_ASSOC)){
while($rows_pass_login = $stmt_pass_login->fetch(PDO::FETCH_ASSOC)){
  //  if (password_verify($password,  $rows_pass_login['password' ])) {
    if ( $password  == $rows_pass_login['password' ]) {
      $_SESSION["NAME" ]  =  $rows_pass_login['name'] ;
      header("Location: main.php");
      exit();
    }else {
      echo "認証に失敗しました。";
    }

  }
}
  ?>
