<?php
$id = htmlspecialchars($_POST['id']);
$name = htmlspecialchars($_POST['name']);
$gender = htmlspecialchars($_POST['gender']);
$age = htmlspecialchars($_POST['age']);
$bloodType = htmlspecialchars($_POST['bloodType']);
$profession = htmlspecialchars($_POST['profession']);
$birthplace = htmlspecialchars($_POST['birthplace']);
$comment = htmlspecialchars($_POST['comment']);

//データベースに接続
$dsn = 'mysql:dbname=Homework;host=localhost';
$user = 'root';
$password = '';
$dbh = new PDO($dsn, $user, $password);
//エラーがあれば表示させる
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//DBを操作する時の文字コードを設定
$dbh->query('SET NAMES utf8');

//SQL文を作成（VALUEにはラベルをつけておく）
$sql = 'UPDATE traveller SET name = :name, gender = :gender, age = :age, bloodType = :bloodType, profession = :profession, birthplace = :birthplace, comment = :comment WHERE id = :id';

// 作成したSQL文の実行準備
$stmt = $dbh->prepare($sql);
//作成したラベルに変数を設定
$stmt->bindparam(':id', $id, PDO::PARAM_STR);
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

//search.phpに戻る
header("Location: search.php");
?>