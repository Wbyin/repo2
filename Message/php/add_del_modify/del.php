<?php 
require "../mysqlconfig.php";
session_start();
$usn = $_SESSION['user'];
$id = $_GET['id'];

$sql = "delete from mess_content where id=:id";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(":id"=>$id));
$row = $stmt->rowCount();
if($row != 0){
    echo "<script> alert('删除成功');window.location.href='../../indexs.php';</script>";
    
}else{
    echo "<script> alert('删除失败');window.location.href='../../indexs.php'; </script>";
}
if($row){
    echo "成功";
}else{
    echo "失败";
}
?>