
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>なべあつ</title>
</head>
<body>
<form action="" method="POST">
	<p>数える数の最大値(MAX:10000)</p>
	<input type="text" name="smax" size="5" value="100">
	<input type="submit" value="送信">
</form>
<?php
    function isNabe($value) {
        return $value % 3 == 0 || strpos($value, '3') !== false;
    }

    if (!empty($_POST)) {
        $max = $_POST['smax'];
        for ($i = 1; $i <= $max; $i++) {
            echo($i);
            if (isNabe($i))
                echo " あほ～";
            echo("<br>");
        }
    }
?>
</body>
</html>