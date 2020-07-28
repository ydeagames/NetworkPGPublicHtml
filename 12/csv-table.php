<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="csv-table.css">
    <title>CSV</title>
</head>
<body>
<?php

$formname = 'upload';
setlocale(LC_ALL,'ja_JP.utf-8');

switch ($_POST['cmd']) {
    case 'print':
        $tmp = $_FILES[$formname]['tmp_name'];
        $dst = $_FILES[$formname]['name'];
        move_uploaded_file($tmp, $dst) or die("Can't move file");
        $file = fopen($dst, "r") or die("Can't open file");
        echoCsv($file);
        fclose($file);
        break;

    default:
        echo <<< EOFORM
        <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="cmd" value="print">
        アップロードファイル:<input name="{$formname}" type="file">
        <input type="submit" value="送信">
        </form>
EOFORM;
        break;
}

function echoCsv($handle) {
    echo "<table>";
    echo "<tbody>";
        while($array = fgetcsv($handle))
        {
            $size = count($array);
            echo "<tr>";
            for($i = 0; $i < $size; $i++)
            {
                echo "<th>";
                echo "{$array[$i]}";
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