<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="csv-table.css">
    <title>pass-table</title>
</head>
<body>
<h1>スコアボート</h1>
<hr>
<table>
    <tr>
        <th>順位</th>
        <th>日付</th>
        <th>得点</th>
        <th>名前</th>
    </tr>
    <tr>
<?php
try {
    // 接続
    $pdo = new PDO('sqlite:s.db');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // テーブル作成
    $pdo->exec("CREATE TABLE IF NOT EXISTS scoreboard(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        date DATE
        score INTEGER
        name VARCHAR(20),
    )");

    if ($_POST['cmd'] == 'add') {
        // 挿入
        $stmt = $pdo->prepare("INSERT INTO scoreboard(date, score, name) VALUES (?, ?, ?)");
        $stmt->execute([$_POST['date'], $_POST['score'], $_POST['name']]);
    }

    // 選択
    $stmt = $pdo->prepare("SELECT * FROM scoreboard");
    $stmt->execute();
    $r1 = $stmt->fetchAll();

    // 結果を確認
    var_dump($r1);

} catch (Exception $e) {

    echo $e->getMessage() . PHP_EOL;

}

?>
        <td>1</td>
        <td>2020-11-01</td>
        <td>5000</td>
        <td>user01</td>
    </tr>
</table>
<hr>
<div class="right">
    <form action="score1.php" method="post">
        <input type="hidden" name="cmd" value="add">
        <button type="submit" style="font-size:6pt">s.db初期化</button>
    </form>
</div>
<p>スコアを入力してください</p>
<form action="score1.php" method="post">
    <input type="hidden" name="cmd" value="add">
    <label for="fdate" >日付</label>
    <input type="date" name="date" id="fdate">
    &nbsp;
    <label for="fscore">得点</label>
    <input type="text" name="score" size="6" id="fscore" placeholder="Score">
    &nbsp;
    <label for="fname" >名前</label>
    <input type="text" name="name" size="10" id="fname" placeholder="Your Name">
    <button type="submit">登録</button>
</form>
<hr>
