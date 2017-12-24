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

	<a href="CourseRegistration_Manage_20170930.php">計算する</a>


</body>
<?

		}else {
			header("Location: login_manage_20171202.php");
			exit();

		}
		?>
