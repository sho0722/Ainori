<?php
$id = htmlspecialchars($_GET['id']);

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
$sql = 'DELETE FROM traveller WHERE id = :id';

// 作成したSQL文の実行準備
$stmt = $dbh->prepare($sql);
//作成したラベルに変数を設定
$stmt->bindparam(':id', $id, PDO::PARAM_STR);

//SQLの実行
$stmt->execute();
// データベース切断
$dbh = null;

//search.phpに戻る
header("Location: search.php");
?>