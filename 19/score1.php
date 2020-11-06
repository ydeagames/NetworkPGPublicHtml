<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="csv-table.css">
    <title>pass-table</title>
</head>
<body>
<h1>スコアボート</h1>
<hr>
<table>
    <tr>
        <th>順位</th>
        <th>日付</th>
        <th>得点</th>
        <th>名前</th>
    </tr>
    <tr>
<?php
$filepath = "s.db";

function loadRecords($file)
{
    $records = [];
    $file->setFlags(SplFileObject::READ_CSV | SplFileObject::READ_AHEAD | SplFileObject::SKIP_EMPTY | SplFileObject::DROP_NEW_LINE);
    foreach ($file as $line) {
        $records[] = $line;
    }
    return $records;
}

function saveRecords($file, $records)
{
    foreach ($records as $record) {
        $file->fputcsv($record);
    }
}

function echoRecords($records)
{
    foreach ($records as $record) {
        list($score, $name, $date) = $record;
        echo "<tr><td>{$number}</td><td>{$date}</td><td>{$score}</td><td>{$name}</td></tr>\n";
    }
}

function readRecords($filepath)
{
    $file = new SplFileObject($filepath, 'r');
    $records = loadRecords($file);
    return $records;
}

function transactionRecords($filepath, $transactionFunc)
{
    $filepathTemp = "{$filepath}.temp";

    $file = new SplFileObject($filepath, 'r');
    $fileTemp = new SplFileObject($filepathTemp, 'w');

    $file->flock(LOCK_EX);
    $fileTemp->flock(LOCK_EX);

    $records = loadRecords($file);
    $records = $transactionFunc($records);
    saveRecords($fileTemp, $records);

    $file->flock(LOCK_UN);
    $fileTemp->flock(LOCK_UN);

    $file = null;
    $fileTemp = null;

    unlink($filepath) or die("can't delete score file.\n");
    rename($filepathTemp, $filepath) or die("can't rename temporary file.\n");
}

if ($_POST['cmd'] == 'add') {
    transactionRecords($filepath, function ($records)
    {
        $name = $_POST['name'];
        $score = $_POST['score'];
        $date = $_POST['date'];

        $records[] = [$score, $name, $date];

        usort($records, function($a, $b) {
            $ai = $a[0];
            $bi = $b[0];
            if ($ai == $bi)
                return 0;
            return ($ai > $bi) ? -1 : 1;
        });

        return $records;
    });
}

if (!file_exists($filepath)) {
    $file = new SplFileObject($filepath, 'w');
    saveRecords($file, []);
}
$records = readRecords($filepath);
echoRecords($records);

?>
    </tr>
</table>
<hr>
<div class="right">
    <form action="score1.php" method="post">
        <input type="hidden" name="cmd" value="add">
        <button type="submit" style="font-size:6pt">s.db初期化</button>
    </form>
</div>
<p>スコアを入力してください</p>
<form action="score1.php" method="post">
    <input type="hidden" name="cmd" value="add">
    <label for="fdate" >日付</label>
    <input type="date" name="date" id="fdate">
    &nbsp;
    <label for="fscore">得点</label>
    <input type="text" name="score" size="6" id="fscore" placeholder="Score">
    &nbsp;
    <label for="fname" >名前</label>
    <input type="text" name="name" size="10" id="fname" placeholder="Your Name">
    <button type="submit">登録</button>
</form>
<hr>
