<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="csv-table.css">
    <title>CSV</title>
</head>
<body>
<form action="form.php" method="post">
    <p>
        列:<input type="number" name="column"" value="3" required>
    </p>
    <p>
        行:<input type="number" name="row" value="5" required>
    </p>
     
    <button type="submit">送信</button>
</form>

<h1>result</h1>
<hr>
<?php

if (!empty($_POST)) {
    $column = $_POST["column"];
    $row = $_POST["row"];

    echo "<table>";
    echo "<tbody>";
    for($iy = 1; $iy <= $column; $iy++) {
        echo "<tr>";
        for($ix = 1; $ix <= $row; $ix++) {
            $ixy = $ix * $iy;
            echo "<th>";
            echo "{$ixy}";
            echo "</th>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";

}
?>
</body>
</html>