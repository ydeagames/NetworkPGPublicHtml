<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="csv-table.css">
    <title>join</title>
</head>
<body>
<table>
<?php
require "../../pass.php";
try {
    // 接続
    $pdo = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_NUM);

    // 選択
    $result = $pdo->query(<<<EOT
    select
        A.student_id,
        B.name,
        case B.sex
            when 1 then '男'
            when 2 then '女'
            else ''
        end as 性別,
        A.friend_id,
        C.name,
        case C.sex
            when 1 then '男'
            when 2 then '女'
            else ''
        end as 性別
    from
        student_friend as A
        left join student_list as B
        on A.student_id=B.student_id
        left join student_list as C
        on A.friend_id=C.student_id
    where
        B.sex!=C.sex
    order by
        B.name_kana;
    EOT);

    $count = $result->rowCount();
    echo "友達（異性）の検索結果　データ件数：{$count}件";

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
