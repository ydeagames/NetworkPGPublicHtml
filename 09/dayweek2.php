<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>日付</title>
    <style>
        input {
            width: 60px;
        }
        .error {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
<?php
    if (empty($_POST)) {
?>
    <p>曜日を調べます。年月日を西暦で入力してください</p>
    <div>
        <form action="dayweek2.php" method="post">
            <input type="number" name="year" value="2000" required>
            年
            <input type="number" name="month" value="7" required>
            月
            <input type="number" name="day" value="7" required>
            日
            <button type="submit">送信</button>
        </form>
    </div>
<?php
    } else {
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
    }
?>
</body>
</html>