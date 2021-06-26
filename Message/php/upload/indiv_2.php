<?php
require '../mysqlconfig.php';
require './indiv.php';
session_start();
$name = $_SESSION['user'];
if($name){
    // 实例化
    $obj = new Uploader();
    $a = $obj->make();
    if($_POST['submit'] != "提交"){
        // 查询 和 打印到框内
    $sql = "select * from mess_user where `Account` like binary(:name)";
    $stmt = $pdo->prepare($sql);
    $data = [':name'=>$name];
    $stmt->execute($data);
    // echo '<hr>';
    // print_r($name);
    // echo "<hr>";
    while($row = $stmt->fetchAll(PDO::FETCH_ASSOC)){
        $img = $row[0]['userImg'];
        $usn = $row[0]['name'];
    }
}
}else{
    echo "<script>alert('未登录!!');  location.href='/php/log_reg/login.php';</script>";
    return false;
}


?>