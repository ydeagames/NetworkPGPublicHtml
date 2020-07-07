<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>日付</title>
    <style>
        .error {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
<?php
    $year = $_POST["year"];
    $month = $_POST["month"];
    $day = $_POST["day"];
    
    $week = array("日", "月", "火", "水", "木", "金", "土");

    if (!checkdate($month, $day, $year)) {
        echo '<p class="error">正しい数値でありません。戻って再入力してください。</p>';
    } else {
        $date = new DateTime();
        $date->setDate($year, $month, $day);
        $result_date = $date->format('Y年m月d日');
        $result_week = "{$week[$date->format('w')]}曜日";

        echo "入力日時：";
        echo "{$result_date} {$result_week}";
        echo"です。";
    }
?>
</body>
</html>