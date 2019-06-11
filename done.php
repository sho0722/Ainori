<?php
$name = htmlspecialchars($_POST['name']);
$gender = htmlspecialchars($_POST['gender']);
$age = htmlspecialchars($_POST['age']);
$bloodType = htmlspecialchars($_POST['bloodType']);
$profession = htmlspecialchars($_POST['profession']);
$birthplace = htmlspecialchars($_POST['birthplace']);
$comment = htmlspecialchars($_POST['comment']);

$dsn = 'mysql:dbname=Homework;host=localhost';
$user = 'root';
$password = '';
// データベース接続
$dbh = new PDO($dsn, $user, $password);
//エラーがあれば表示させる
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//DBを操作する時の文字コードを設定
$dbh->query('SET NAMES utf8');

//SQL文を作成（VALUEにはラベルをつけておく）
$sql = 'INSERT INTO traveller (name, gender, age, bloodType, profession, birthplace, comment) VALUES (:name, :gender, :age, :bloodType, :profession, :birthplace, :comment)';

// 作成したSQL文の実行準備
$stmt = $dbh->prepare($sql);
//作成したラベルに変数を設定
$stmt->bindparam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':age', $age, PDO::PARAM_STR);
$stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
$stmt->bindParam(':bloodType', $bloodType, PDO::PARAM_STR);
$stmt->bindParam(':profession', $profession, PDO::PARAM_STR);
$stmt->bindParam(':birthplace', $birthplace, PDO::PARAM_STR);
$stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
//SQLの実行
$stmt->execute();
// データベース切断
$dbh = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>登録完了</title>
</head>
<body>
    <video muted id="bg-video" src="video/ainori_season2.mp4" autoplay loop></video>
    <div class="message">
        <h1>ようこそ ラブワゴンへ！！！</h1>
        <div class="linklogo">
            <a href="index.html"><img src="img/logo.jpg" alt=""></a>
        </div>
    </div>
</body>
</html>