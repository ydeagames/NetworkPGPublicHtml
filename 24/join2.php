<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="csv-table.css">
    <title>join</title>
</head>
<body>
<?php
$search = $_GET['search'];
?>
<form action="" method="GET">
    <input type="text" value="<?= $search ?>" name="search">
    <button type="submit">検索</button>
</form>
<table>
<?php
require "../../pass.php";
try {
    // 接続
    $pdo = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_NUM);

    // 選択
    $result = $pdo->prepare(<<<EOT
    select
        student_id,
        name,
        name_kana,
        case sex
            when 1 then '男'
            when 2 then '女'
            else ''
        end as 性別,
        timestampdiff(year, birthday,now()) as 年齢
    from
        student_list
    where
        name_kana like ?
    order by
        年齢 desc,
        name_kana;
    EOT);
    $result->execute(array("%{$search}%"));

    $count = $result->rowCount();
    echo "検索結果　データ件数：{$count}件";

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
</body>
</html>
