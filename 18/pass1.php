<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="csv-table.css">
    <title>pass-table</title>
</head>
<body>
<h1>ユーザー一覧</h1>
<table>
    <tr>
        <th>username</th>
        <th>uid</th>
    </tr>
<?php
    $fp = fopen('/etc/passwd', 'r');
    // 1行ずつ読み込む(先頭から最後迄)
    while($line = fgets($fp)){
        // 1行の処理を書く(1行のデータは$lineに入っている)
        // $result = [];
        // preg_match("/^(\w+):(\w+):(\d+):(\d+):(\w+):([\w\/_-]+):([\w\/_-]+)$/", $line, $result);
        // list($all, $user, $pass, $uid, $gid, $comment, $homedir, $shell) = $result;
        list($user, $pass, $uid, $gid, $comment, $homedir, $shell) = explode(':', $line);
        if ($uid < 1000)
            continue;
        echo "<tr><td>${user}</td><td>${uid}</td></tr>\n";
    }
    fclose($fp);
?>
</table>
</body>
</html>
