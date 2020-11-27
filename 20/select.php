<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="csv-table.css">
    <title>pass-table</title>
</head>
<body>
<h1>db_output</h1>
<hr>
<table>
<?php
try {
    // 接続
    $pdo = new PDO('mysql:dbname=gt124;host=127.0.0.1', 'gt124', 'gt124gt124');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // テーブル作成
    $pdo->exec("CREATE TABLE IF NOT EXISTS tb1(
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        num VARCHAR(20),
        name VARCHAR(20),
        age INTEGER
    )");

    if ($_POST['cmd'] == 'add') {
        // 挿入
        $stmt = $pdo->prepare("INSERT INTO tb1(num, name, age) VALUES (?, ?, ?)");
        $stmt->execute([$_POST['num'], $_POST['name'], $_POST['age']]);
    }

    if ($_POST['cmd'] == 'clear') {
        // 挿入
        $stmt = $pdo->prepare("DELETE FROM tb1");
        $stmt->execute();
    }

    // 選択
    $result = $pdo->query("SELECT num as '番号',name as '名前',age as '年齢' FROM tb1");

	echo "<tr>\n";
    foreach(range(0,$result->columnCount()-1) as $index){
		echo '<th>' . $result->getColumnMeta($index)['name'] . '</th>';
	}
	echo "</tr>\n";

    // 結果を確認
	foreach($result as $row){
        echo "<tr>\n";
        foreach($row as $cell){
            echo '<td>' . $cell . '</td>';
        }
        echo "</tr>\n";
	}

} catch (Exception $e) {

    echo $e->getMessage() . PHP_EOL;

}

?>
</table>
<hr>
<div class="right">
    <form action="select.php" method="post">
        <input type="hidden" name="cmd" value="clear">
        <button type="submit" style="font-size:6pt">s.db初期化</button>
    </form>
</div>
<p>スコアを入力してください</p>
<form action="select.php" method="post">
    <input type="hidden" name="cmd" value="add">
    <label for="fnum">番号</label>
    <input type="text" name="num" size="6" id="fnum" placeholder="num">
    &nbsp;
    <label for="fname">名前</label>
    <input type="text" name="name" size="6" id="fname" placeholder="name">
    &nbsp;
    <label for="fage" >年齢</label>
    <input type="text" name="age" size="10" id="fage" placeholder="Your Age">
    <button type="submit">登録</button>
</form>
<hr>
