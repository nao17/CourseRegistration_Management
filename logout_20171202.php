<?php
session_start();

if (isset($_SESSION["NAME"])) {
    $errorMessage = "ログアウトしました。" ;
} else {
    $errorMessage =  "セッションがタイムアウトしました。" ;
}

// セッションの変数のクリア
$_SESSION = array();

// セッションクリア
@session_destroy();
?>
<!doctype html>
<html>
<head>
<title>BBS</title>
<link rel="stylesheet" type="text/css" href="display_style.css">
<meta http-equiv="content-type" charset="utf-8">
</head>
    <body>
        <h1>ログアウト画面</h1>
        <div><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></div>

        <ul>
            <li><a href="login_manage_20171222.php" >ログイン画面に戻る</a></li>
        </ul>
    </body>
</html>
