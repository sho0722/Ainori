<?php
    $name = htmlspecialchars($_POST['name']);
    $gender = htmlspecialchars($_POST['gender']);
    $age = htmlspecialchars($_POST['age']);
    $bloodType = htmlspecialchars($_POST['bloodType']);
    $profession = htmlspecialchars($_POST['profession']);
    $birthplace = htmlspecialchars($_POST['birthplace']);
    $comment = htmlspecialchars($_POST['comment']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>旅人確認</title>
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
    <h1>登録する旅人の確認</h1>
    <div class="check">
        <p>＊お名前：<?= $name?></p>
        <p>＊性別：<?= $gender?></p>
        <p>＊年齢：<?= $age?></p>
        <p>血液型：<?= $bloodType?></p>
        <p>職業：<?= $profession?></p>
        <p>出身地：<?= $birthplace?></p>
        <p>コメント：<?= $comment?></p>
    </div>

    <?php if ($name != "" && $gender != "" && $age != "") : ?>
        <form action="done.php" method="POST">
            <input type="hidden" name="name" value="<?= $name ?>">
            <input type="hidden" name="gender" value="<?= $gender ?>">
            <input type="hidden" name="age" value="<?= $age ?>">
            <input type="hidden" name="bloodType" value="<?= $bloodType ?>">
            <input type="hidden" name="profession" value="<?= $profession ?>">
            <input type="hidden" name="birthplace" value="<?= $birthplace ?>">
            <input type="hidden" name="comment" value="<?= $comment ?>">
            <input class="submit" type="submit" value="登録">
        </form>

    <?php else: ?>
        <h2>＊は入力必須の項目です。</h2>
        <a class="pageback" href="signUp.html">前の画面に戻る</a>
<?php endif; ?>
</body>
</html>