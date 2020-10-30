<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="csv-table.css">
    <title>CSV</title>
</head>
<body>
<h1>九九表</h1>
<hr>
<?php

echo "<table>";
echo "<tbody>";
for($iy = 1; $iy <= 9; $iy++) {
    echo "<tr>";
    for($ix = 1; $ix <= 9; $ix++) {
        $ixy = $ix * $iy;
        echo "<th>";
        echo "{$ixy}";
        echo "</th>";
    }
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";

?>
</body>
</html>