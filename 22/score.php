<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="csv-table.css">
    <title>Scoreboard</title>
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
<?php
require "../../pass.php";

try {
    // 接続
    $pdo = new PDO("mysql:dbname=${dbname};host=127.0.0.1", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $exists_result=$pdo->query("SHOW TABLES FROM gt124 LIKE 'score';");

    // テーブル作成
    $pdo->exec("CREATE TABLE IF NOT EXISTS score(
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        date DATE,
        score INTEGER,
        name VARCHAR(20)
    )");

    // なければ生成
    if ($exists_result->rowCount() <= 0) {
        // 挿入
        $stmt = $pdo->prepare("INSERT INTO score(date, score, name) VALUES (now(), ?, ?)");
        $alphabet = range('A', 'Z');
        for ($i = 0; $i < 10; $i++) {
            $stmt->execute([rand(0, 100), 'テスト'.$alphabet[$i]]);
        }
    }

    if ($_POST['cmd'] == 'add') {
        // 挿入
        $stmt = $pdo->prepare("INSERT INTO score(date, score, name) VALUES (?, ?, ?)");
        $stmt->execute([$_POST['date'], $_POST['score'], $_POST['name']]);
        header('Location: '.$_SERVER['REQUEST_URI']);
        exit;
    }

    if ($_POST['cmd'] == 'clear') {
        // 挿入
        $stmt = $pdo->prepare("DELETE FROM score");
        $stmt->execute();
        header('Location: '.$_SERVER['REQUEST_URI']);
        exit;
    }

    if ($_POST['cmd'] == 'delete') {
        // 挿入
        $stmt = $pdo->prepare("DROP TABLE score");
        $stmt->execute();
        header('Location: '.$_SERVER['REQUEST_URI']);
        exit;
    }

    // 選択
    $stmt = $pdo->prepare("SELECT * FROM score ORDER BY score DESC");
    $stmt->execute();
    $r1 = $stmt->fetchAll();

    // 結果を確認
    foreach ($r1 as $i => $data) {
        $i1 = $i + 1;
        echo("<tr><td>{$i1}</td><td>{$data['date']}</td><td>{$data['score']}</td><td>{$data['name']}</td></tr>");
    }

} catch (PDOException $e) {

    echo $e->getMessage() . PHP_EOL;

}

?>
</table>
<hr>
<div class="right">
    <form action="score.php" method="post">
        <input type="hidden" name="cmd" value="clear">
        <button type="submit" style="font-size:6pt">s.db初期化</button>
    </form>
    <form action="score.php" method="post">
        <input type="hidden" name="cmd" value="delete">
        <button type="submit" style="font-size:6pt">s.db完全消去</button>
    </form>
</div>
<p>スコアを入力してください</p>
<form action="score.php" method="post">
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
