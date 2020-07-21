<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>素数を求める</title>
</head>
<body>
<form action="" method="POST">
	<p>求めたい素数の最大値(MAX:10000)</p>
	<input type="number" name="smax" size="5" value="<?php echo $_POST['smax'];?>">
	<input type="submit" value="送信">
</form>
<?php
    function calcPrime($max) {
        $arr = range(0, $max);
        $sq = ceil(sqrt($max));
        #echo("sqrt: {$sq}<br>");
        for ($i = 2; $i <= $sq; $i++) {
            for ($j = 2; $j * $i <= $max; $j++) {
                $r = $j * $i;
                #echo("removed {$r}<br>");
                unset($arr[$r]);
            }
        }
        unset($arr[0]);
        unset($arr[1]);
        return $arr;
    }

    if (!empty($_POST)) {
        $primes = calcPrime($_POST['smax']);
        foreach ($primes as $prime)
            echo("{$prime}<br>");
    }
?>
</body>
</html>
