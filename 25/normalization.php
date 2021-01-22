<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="csv-table.css">
    <title>正規化サンプル</title>
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
        purchase_name as 仕入先,
        address as 住所,
        name as 代表者名,
        tel as 代表者連絡先,
        product_name as 商品名,
        unit_price as 1個あたりの金額,
        arrival_date as 入荷日,
        quantity as 入荷数,
        comment as 備考
    from
        n_instock as A
        left join n_products as B
        on A.products_id=B.id
        left join n_purchases as C
        on A.purchases_id=C.id
        left join n_phonebook as D
        on C.phonebook_id=D.id
    order by
        purchase_name desc,
        arrival_date;
    EOT);

    $count = $result->rowCount();
    echo "<h1>商品管理表</h1><p>データ件数：{$count}件</p>";

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
