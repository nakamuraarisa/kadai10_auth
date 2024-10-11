<?php
//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//   POSTデータ受信 → DB接続 → SQL実行 → 前ページへ戻る
//2. $id = POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更

//1. POSTデータ取得
//[name,email,age,naiyou]
$name = $_POST["name"];
$date = $_POST["date"];
$time = $_POST["time"];
$temp = $_POST["temp"];
$nodo = $_POST["nodo"];
$outo = $_POST["outo"];
$geri = $_POST["geri"];
$zutu = $_POST["zutu"];
$kusuri = $_POST["kusuri"];
$shokuji = $_POST["shokuji"];
$memo = $_POST["memo"];
$id    = $_POST["id"];

//2. DB接続します
include("funcs.php"); //外部ファイル読み込み
$pdo = db_conn();

//３．データ登録SQL作成 この通りに書く
$sql = "UPDATE kadai09 SET name=:name,date=:date,time=:time,temp=:temp,nodo=:nodo,outo=:outo,geri=:geri,zutu=:zutu,kusuri=:kusuri,shokuji=:shokuji,memo=:memo WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name',    $name,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT) 「:**」はバインド変数 bindValueで危ない文字をクリーニング 文字列＝STR
$stmt->bindValue(':date',    $date,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':time',    $time,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':temp',    $temp,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':nodo',    $nodo,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':outo',    $outo,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':geri',    $geri,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':zutu',    $zutu,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kusuri',  $kusuri,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':shokuji', $shokuji, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':memo',    $memo,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',     $id,    PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行すると、true or falseが返ってくる

//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  redirect("select.php");
}
?>
