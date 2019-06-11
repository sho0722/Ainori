<?php
// 配列を作成
$records = array();

$dsn = 'mysql:dbname=Homework;host=localhost';
$user = 'root';
$password = '';
// データベース接続
$dbh = new PDO($dsn, $user, $password);
//エラーがあれば表示させる
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//DBを操作する時の文字コードを設定
$dbh->query('SET NAMES utf8');

//SQL文を作成
$sql = 'SELECT * FROM traveller';

// 作成したSQL文の実行準備
$stmt = $dbh->prepare($sql);

//SQLの実行
$stmt->execute();
// データベース切断
$dbh = null;

while (true) {
        // 1レコード取得
    $record = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($record == false) {
        // レコードが存在しない時、ループを終了
        break;
    };
    // 配列にレコードを追加
    $records[] = $record;
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>旅人を探す</title>
</head>
<body>
    <header>
        <nav>
            <a href="index.html">TOP</a>
            <a href="signUp.html">旅人登録</a>
            <a href="search.php">旅人検索</a>
        </nav>
        <p>あいのり　Asian Jurney</p>
    </header>
    <h1>ラブワゴン　トラベラー</h1>
    <form action="result.php" method=GET>
        名前で検索：<input type="text" name="searchName"><br>
        性別で検索：<select name="searchGender">
            <option value=""></option>
            <option value="男">男性</option>
            <option value="女">女性</option>
        </select><br>
        年齢で検索：<input type="number" name="searchAge"><br>
        血液型で検索：<select name="searchBloodType">
            <option value=""></option>            
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="O">O</option>
            <option value="AB">AB</option>
        </select><br>
        <input class="submit" type="submit" value="検索">
    </form>
    <main>
        <?php foreach ($records as $record): ?>
            <div class="car">
                <div class="window"></div>
                <img src="img/lovewagon.png" alt="">
                <div class="info">
                    <p><?= $record['name']; ?></p>
                    <p><?= $record['gender']; ?>性</p>
                    <p><?= $record['age']; ?>歳</p>
                    <p><?= $record['bloodType']; ?>型</p>
                    <p>職業：<?= $record['profession']; ?></p>
                    <p>出身地：<?= $record['birthplace']; ?></p>
                    <p><?= $record['comment']; ?></p>
                </div>
                <a class="edit" href="edit.php?id=<?= $record['id']; ?>">編集</a>
                <a class="delete" href="delete.php?id=<?= $record['id']; ?>">削除</a>
            </div>
        <?php endforeach; ?>
    </main>
    <img src="img/icon.png" id="icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="assets/js/app.js"></script>  
</body>
</html>