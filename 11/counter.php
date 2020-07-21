<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カウンター</title>
</head>

<body>
    <?php
    $fp = fopen('counter.txt', is_file('counter.txt') ? 'r+' : 'w+') or die('ファイルを開けません!');

    if (flock($fp, LOCK_EX)) {  // 排他ロックを確保
        $counter = ((int)fgets($fp)) + 1;
        rewind($fp);
        ftruncate($fp, 0);
        fwrite($fp, $counter);
        fflush($fp);            // 出力をフラッシュ
        flock($fp, LOCK_UN);    // ロックを解放
    } else {
        echo "ファイルをロックできません!";
    }

    fclose($fp);

    echo ($counter);
    ?>
</body>

</html>