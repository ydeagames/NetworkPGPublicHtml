<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>post/get data decode</title>
</head>

<body>
  <?php
	echo "<h1>getデータ</h1>\n";
	echo "<pre>\n";
	print htmlspecialchars(print_r($_GET,true));
	echo "</pre>\n";
	echo "<h1>postデータ</h1>\n";
	echo "<pre>\n";
	print htmlspecialchars(print_r($_POST,true));
	echo "</pre>\n";
?>
</body>

</html>