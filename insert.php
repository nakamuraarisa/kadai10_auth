<?php
//1. POSTデータ取得
//[name,email,age,naiyou]
$name = $_POST["name"];
$date = $_POST["date"];
$time = $_POST["time"];
$temp = $_POST["temp"] ?? 0;
$nodo = $_POST["nodo"];
$outo = $_POST["outo"];
$geri = $_POST["geri"];
$zutu = $_POST["zutu"];
$kusuri = $_POST["kusuri"];
$shokuji = $_POST["shokuji"];
$memo = $_POST["memo"];

//2. DB接続します
include("funcs.php"); //外部ファイル読み込み
$pdo = db_conn();

//３．データ登録SQL作成 この通りに書く
$sql = "INSERT INTO kadai09(name,date,time,temp,nodo,outo,geri,zutu,kusuri,shokuji,memo,indate)VALUES(:name,:date,:time,:temp,:nodo,:outo,:geri,:zutu,:kusuri,:shokuji,:memo,sysdate());";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name',    $name,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT) 「:**」はバインド変数 bindValueで危ない文字をクリーニング 文字列＝STR
$stmt->bindValue(':date',    $date,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':time',    $time,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':temp',    $temp,    PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':nodo',    $nodo,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':outo',    $outo,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':geri',    $geri,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':zutu',    $zutu,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kusuri',  $kusuri,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':shokuji', $shokuji, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':memo',    $memo,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行すると、true or falseが返ってくる

//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  redirect("select.php");
}
?>
