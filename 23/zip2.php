<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>zip list</title>
    <link rel="stylesheet" href="csv-table.css">
</head>
<body>
<?php
require "../../pass.php";

$line_num = 10;
$table_name = "zipcode";
$record_max = 7714;
$page_max = (int) ($record_max / $line_num) + 1;

try {
    $pdo = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8", $username, $password);
    $page = isset($_POST['page']) ? $_POST['page'] : 1;

    // ボタンの処理
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    $offset = ($page - 1) * $line_num;
    $sql = "select Zipcode,Prefecture,City,Town from {$table_name} limit {$line_num} offset {$offset}";
    $result = $pdo->query($sql);
    
    $page_prev = ($page <= 1) ? 1 : $page - 1;
    $page_next = ($page >= $page_max) ? $page_max : $page + 1;
    echo <<< EOFORM
    <form action="" method="GET" style="float: left;">
    <button type="submit" name="page" value="1">&lt;&lt;</button>
    <button type="submit" name="page" value="{$page_prev}">&lt;</button>
    <button type="submit" name="page" value="{$page_next}">&gt;</button>
    <button type="submit" name="page" value="{$page_max}">&gt;&gt;</button>
    </form>
    <form action="" method="GET">
    -page:<input type="text" name="page" value="{$page}" style="width: 4em;">-
    <button type="submit">Jump</button>
    </form>
    EOFORM;
    
    // 項目名一覧取得
    $column_name = array();
    for ($i = 0; $i < $result->columnCount(); $i++) {
        $column_name[] = $result->getColumnMeta($i)['name'];
    }

    // table出力とヘッダ行の出力
    echo "<table>\n\t<tr>";
    echo "<th>" . implode("</th><th>", $column_name) . "</th></tr>\n";

    // tableデータの出力
    foreach ($result as $kekka) {
        $td = array();
        for ($i = 0; $i < $result->columnCount(); $i++) {
            $td[] = $kekka[$i];
        }
        echo "\t<tr><td>" . implode("</td><td>", $td) . "</td></tr>\n";
    }
    echo "</table>\n";
    
} catch (PDOException $e) {
    print("Error:" . $e->getMessage());
    die();
}

$pdo = null;

?>
</body>
</html>
