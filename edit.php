<?php
//データベースに接続
$dsn = 'mysql:dbname=Homework;host=localhost';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);
//エラーがあれば表示させる
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//DBを操作する時の文字コードを設定
$dbh->query('SET NAMES utf8');
//GETで送信されてきたcodeと一致するデータを取得
$id = htmlspecialchars( $_GET['id']);
//SQLの準備＆実行
$sql = 'SELECT * FROM traveller WHERE id = :id';
//準備
$stmt = $dbh->prepare($sql);
$stmt->bindparam(':id', $id, PDO::PARAM_INT);
//実行
$stmt->execute();
// 取得したデータを表示
$record = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>編集</title>
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
    <h1>旅人情報の編集</h1>
    <form action="update.php" method="POST">
        ＊なまえ：<input type="text" name="name" value="<?= $record['name']; ?>"><br>
        ＊性別：
        <!-- ラジオボタンの初期値の条件分岐 -->
        <?php if ($record["gender"] == "男"): ?>
            <input type="radio" name="gender" value="男" checked>男性
            <input type="radio" name="gender" value="女">女性<br>
        <?php elseif ($record["gender"] == "女"): ?>
            <input type="radio" name="gender" value="男">男性
            <input type="radio" name="gender" value="女" checked>女性<br>
        <?php endif; ?>

        ＊年齢：<input type="number" name="age" min="18" max="80" value="<?= $record['age']; ?>">歳<br>

        血液型：<select name="bloodType">
            <!-- セレクトボックスの初期値の条件分岐 -->
            <?php switch ($record["bloodType"]): ?><?php case 'A' :?>
            <option value="A" selected>A</option>
            <option value="B">B</option>
            <option value="O">O</option>
            <option value="AB">AB</option>
            <?php break; ?>

            <?php case 'B' :?>
            <option value="A">A</option>
            <option value="B" selected>B</option>
            <option value="O">O</option>
            <option value="AB">AB</option>
            <?php break; ?>

            <?php case 'O' :?>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="O" selected>O</option>
            <option value="AB">AB</option>
            <?php break; ?>

            <?php case 'AB' :?>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="O">O</option>
            <option value="AB" selected>AB</option>
            <?php break; ?>
            <?php endswitch; ?>
        </select><br>

        職業：<input type="text" name="profession" value="<?= $record['profession']; ?>"><br>
        出身地：<input type="text" name="birthplace" value="<?= $record['birthplace']; ?>"><br>
        コメント：<textarea name="comment" id="" cols="50" rows="1"><?= $record['comment']; ?></textarea><br>
        <span style="color: #C71585">＊は必須項目です</span><br>
        <!-- idの値も一緒に送信 -->
        <input type="hidden" name="id" value="<?= $record['id']?>">
        <input class="submit" type="submit" value="確認">
    </form>
</body>
</html>