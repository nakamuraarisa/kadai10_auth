<?php
session_start();
include "funcs.php";
sschk();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>div{padding: 10px;font-size:16px;}</style>
    <title>看護記録</title>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <?php include("menu.php"); ?>
    </header>
    <!-- Head[End] -->

    <?=$_SESSION["name"]?>さん、今日も看病おつかれさま！
    <br><br>
    <form action="insert.php" method="post">
        名前：<select name="name" required>
		<option value="">選択してください</option>
		<option value="長女">長女</option>
		<option value="長男">長男</option>
		</select><br>

        日付：<input type="date" name="date" required><br>
        時間：<input type="time" name="time" required><br>
        熱　：<input type="number" min="35.0" max="45.0" step="0.1" name="temp">℃<br>

        状況：<label><input type="checkbox" name="nodo">喉痛</label>
        <label><input type="checkbox" name="outo">嘔吐</label>
        <label><input type="checkbox" name="geri">下痢</label>
        <input type="checkbox" name="zutu">頭痛</label>
        <input type="checkbox" name="kusuri">薬</label>
        <input type="checkbox" name="shokuji">食事</label><br>

        備考：<textarea name="memo" cols="30" rows="3"></textarea><br>
        <button type="submit">送信</button>
    </form>    
    <br>

</body>
</html>