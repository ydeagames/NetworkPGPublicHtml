<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="csv-table.css">
    <title>pass-table</title>
</head>
<body>
<h1>ユーザ名での検索</h1>
<form action="pass2.php" method="post">
    <input type="text" name="text" value="<?php echo $_POST['text']; ?>"></input>
    <button type="submit">check</button>
</form>

<?php
if (!empty($_POST)) {
?>

<h1>ユーザー一覧</h1>
<?php
    $text = $_POST["text"];
    $splitted = array_map(
        function($e) { return preg_quote($e, '/'); },
        preg_split('/[\s,　]/u', $text)
    );
    $pattern = '/' . implode('|', $splitted) . '/';
    echo($pattern);

    $matches = [];

    $fp = fopen('/etc/passwd', 'r');
    // 1行ずつ読み込む(先頭から最後迄)
    while($line = fgets($fp)){
        // 1行の処理を書く(1行のデータは$lineに入っている)
        // $result = [];
        // preg_match("/^(\w+):(\w+):(\d+):(\d+):(\w+):([\w\/_-]+):([\w\/_-]+)$/", $line, $result);
        // list($all, $user, $pass, $uid, $gid, $comment, $homedir, $shell) = $result;
        list($user, $pass, $uid, $gid, $comment, $homedir, $shell) = explode(':', $line);
        if (preg_match($pattern, $user))
            $matches[$uid] = $user;
    }
    fclose($fp);

    if (count($matches) > 0) {
        ksort($matches);
?>

<table>
    <tr>
        <th>username</th>
        <th>uid</th>
    </tr>
    <?php
        foreach ($matches as $k => $v) {
            echo "<tr><td>$v</td><td>$k</td></tr>\n";
        }
    ?>
</table>

<?php
    }
}
?>

</body>
</html>
