<?php
$host = 'mysql';
$username = 'data_user';
$password = 'data';
$database = 'test_db';

$mysql = new mysqli($host, $username, $password, $database);

if ($mysql->connect_error) {
    die("データベース接続エラー: " . $mysql->connect_error);
}

$id = 0;
if(isset($_GET['id'])) {
    $id = $_GET['id'];
}
if($id){
    $sql = "SELECT * FROM test_table where id = " . $id;
} else {
    $sql = "SELECT * FROM test_table";
}

$result = $mysql->query($sql);
if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"] . ", name: " . $row["name"] . ", number: "
             . $row["example_number"] . ", message: " . $row["example_message"] . "<br>";
        }
    } else {
        echo "該当するデータはありません。";
    }
} else {
    echo "クエリの実行に失敗しました: " . $mysql->error;
}
$mysql->close();


?>

