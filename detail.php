<?php
$id = $_GET["id"];

//1. DB接続
include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM kadai09 WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$v =  $stmt->fetch(); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>看護記録 データ更新</title>
</head>
<body>
    <form action="update.php" method="post">
        名前：<select name="name">
          <option value="">選択してください</option>
          <option value="長女" <?= $v["name"] == "長女" ? "selected" : "" ?>>長女</option>
          <option value="長男" <?= $v["name"] == "長男" ? "selected" : "" ?>>長男</option>
        </select><br>

        日付：<input type="date" name="date" value="<?=$v["date"]?>"><br>
        時間：<input type="time" name="time" value="<?=$v["time"]?>"><br>
        熱　：<input type="number" min="35.0" max="45.0" step="0.1" name="temp" value="<?=$v["temp"]?>">℃<br>

        状況：<label><input type="checkbox" name="nodo" <?= $v["nodo"] == "on" ? "checked" : "" ?>>喉痛</label>
        <label><input type="checkbox" name="outo" <?= $v["outo"] == "on" ? "checked" : "" ?>>嘔吐</label>
        <label><input type="checkbox" name="geri" <?= $v["geri"] == "on" ? "checked" : "" ?>>下痢</label>
        <input type="checkbox" name="zutu" <?= $v["zutu"] == "on" ? "checked" : "" ?>>頭痛</label>
        <input type="checkbox" name="kusuri" <?= $v["kusuri"] == "on" ? "checked" : "" ?>>薬</label>
        <input type="checkbox" name="shokuji" <?= $v["shokuji"] == "on" ? "checked" : "" ?>>食事</label><br>

        備考：<textarea name="memo" cols="30" rows="3"><?=$v["memo"]?></textarea><br>
        <input type="hidden" name="id" value="<?=$v["id"]?>">
        <button type="submit">送信</button>
    </form>    
    <br>
    <a href="select.php"><button>記録を見る</button></a>

</body>
</html>