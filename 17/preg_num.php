<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="csv-table.css">
    <title>数えまっせ</title>
</head>
<body>
<h1>数えまっせ</h1>
<hr>
<form action="preg_num.php" method="post">
    <textarea name="text" style="width:300px;height:300px;"><?php echo $_POST["text"]; ?></textarea>
    <button type="submit">check</button>
</form>

<?php

if (!empty($_POST)) {

    echo "<h1>result</h1><hr>";

    $text = $_POST["text"];
    $result = [];
    preg_match_all("/(\d+)/", $text, $result);

    echo "<table>";
    echo "<tbody>";
    $capture1 = $result[1];
    $counted = array_count_values($capture1);
    foreach ($counted as $key => $value) {
        echo "<tr>";
        echo "<td>{$key}</td>";
        echo "<td>{$value}</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";

}
?>
</body>
</html>