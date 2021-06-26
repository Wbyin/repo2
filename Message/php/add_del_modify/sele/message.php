<?php
require "./php/mysqlconfig.php";
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
    $log = $_SESSION['user'] = "";
}
/* ------------------------------------- */
if($sub == "发布留言"){
    $con = $_POST['con'];
    $sql = "insert into `mess_content` (`Account`,`content`,`ip`) values (:name,:con,:ip)";
    $stmt = $pdo->prepare($sql);
    if($stmt->execute(array(":name"=>$log,":con"=>$con,":ip"=>$ip))){
        echo "<script> window.location.href='./indexs.php'; </script>";
    }else{

    }
}
/* -------------------- */



/* --------------------分页----------------------- */
// echo "<pre>";

$page = $_GET['page']??1;   // 如果page有数据传过来就使用传过来的值 没有就1



//总的条数
$total = "select count(*) from mess_content";
$stmt = $pdo->query($total);
$res= $stmt->fetch()[0];
$total_rows = $res;
/* ---------------------------------------- */

$num = 10;   //要取的条数

$totalpage = ceil($total_rows/$num); //ceil 向上取整
// print_r($totalpage);


// 判断是不是首页和尾页
if($page == "" || $page <= 1){
    $page = 1;
}else{
    $leftpage = 1;  //用做判断
}

if($page >= $totalpage){
    $page = $totalpage;
}else{
    $rightpage = 1;
}
 /* ----- */



$start = ($page-1)*$num;   //为下面的sql设置变量
$sql = "select * from mess_content order by time desc limit $start,$num";
$res = $pdo->query($sql);
while($result = $res->fetch(PDO::FETCH_ASSOC)){
    $rows[] = $result;
}



/* -------------------------------------- */
// 图片的要用事务处理











?>