<?php
require "./mysqlconfig.php";
session_start();

// $_SESSION = array();
// 判断是否登录
$log = $_SESSION['user'];
$log_psd = $_SESSION['pass'];


/* 发布 */
$ip = $_SERVER['REMOTE_ADDR'];
$sub = $_POST['submit'];
/* -------------如果没有登录发布信息-------------------------------- */
if($log && $log_psd){
    
}else{
    echo "<script>alert('未登录!'); location.href='./log_reg/login.php';</script>";
}
/* ------------------------------------- */
if($sub == "发布留言"){
    $con = $_POST['con'];
    $sql = "insert into `mess_content` (`Account`,`content`,`ip`) values (:name,:con,:ip)";
    $stmt = $pdo->prepare($sql);
    if($stmt->execute(array(":name"=>$log,":con"=>$con,":ip"=>$ip))){
        echo "true";
        echo "<script> window.location.href='./my_mess.php'; </script>";
    }else{
        echo "false";
    }
}
/* -------------------- */



/* --------------------分页----------------------- */
// echo "<pre>";

$page = $_GET['page']??1;   // 如果page有数据传过来就使用传过来的值 没有就1

//总的条数
$total = "select count(*) from mess_content where Account='$log'";
$stmt = $pdo->query($total);
$res= $stmt->fetch()[0];
$total_rows = $res;

/* ---------------------------------------- */
if($total_rows == 0){
    return false;
}else{
$num = 10;   //要取的条数

$totalpage = ceil($total_rows/$num); //ceil 向上取整

// 判断是不是首页和尾页
/* -----判断是不是第一页如果是则石化 */

if($page<=1){
    $page = 1;
}

if($page >= $totalpage){
    $page = $totalpage;
}
 /* ----- */
$start = ($page-1)*$num;   //为下面的sql设置变量
$sql = "select * from mess_content where Account='$log' order by time desc limit $start,$num";
$res = $pdo->query($sql);
while($result = $res->fetch(PDO::FETCH_ASSOC)){
    $rows[] = $result;
}
// print_r($rows);

}





?>