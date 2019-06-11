<?php
$searchName = htmlspecialchars($_GET['searchName']);
$searchGender = htmlspecialchars($_GET['searchGender']);
$searchAge = htmlspecialchars($_GET['searchAge']);
$searchBloodType = htmlspecialchars($_GET['searchBloodType']);

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

//一旦、全件を選択する
$sql = 'SELECT * FROM traveller';

// それぞれの配列を用意
$conditions = array();
$data = array();

// それぞれの入力値が空ではない時の処理
if ($searchName != '') {
  $conditions[] = 'name = ?';
  $data[] = $searchName;
}

if ($searchGender != '') {
  $conditions[] = 'gender = ?';
  $data[] = $searchGender;
}

if ($searchAge != '') {
  $conditions[] = 'age = ?';
  $data[] = $searchAge;
}

if ($searchBloodType != '') {
  $conditions[] = 'bloodType = ?';
  $data[] = $searchBloodType;
}


if (!empty($conditions)) {
    // $conditionsの値を一列の文字列として表示
  $condition = implode(" AND ", $conditions);
    // 上記の文字列をsql文に追加
  $sql .= ' WHERE ' . $condition;
}

// 作成したSQL文の実行準備
$stmt = $dbh->prepare($sql);
//作成したラベルに変数を設定

$stmt->execute($data);




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
    <title>検索結果</title>
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
    <h1>検索結果</h1>
    <main>
        <?php if (empty($records)): ?>
            <div class="error">
                <p>検索結果に該当する旅人がいません</p>
                <img src="img/notfound.png" alt="">
            </div>
        <?php else: ?>
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
        <?php endif; ?>
    </main>
    <a class="pageback" href="search.php">戻る</a>
    <img src="img/icon.png" id="icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>