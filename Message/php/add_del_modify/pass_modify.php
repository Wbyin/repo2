<?php
header("Content-type:text/html;charset=utf-8");
echo "<pre>";
session_start();

if(!isset($_SESSION['user']) && !isset($_SESSION['pass'])){
    echo "<script>alert('未登录!'); location.href='../log_reg/login.php';</script>";
}

$usn = $_SESSION['user'];
print_r($sun);
$old_psd = $_POST['old_psd'];
$new_psd = $_POST['new_psd'];
$news_psd = $_POST['news_psd'];

if(isset($_POST['submit']) && $_POST['submit'] == "确认"){
    if($old_psd != "" && $new_psd != "" && $news_psd != ""){
        require_once("../mysqlconfig.php");

        $sql = "select * from mess_user where Account like binary(:name) and userpassword like binary(:psd)";
        $data = [":name"=>$usn,":psd"=>$old_psd];
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        $count = $stmt->rowCount();
        print_r($count);
        if($count == 1){
            if($new_psd == $news_psd){
                echo "新密码和重新输入正确";
                $sql = "update `mess_user` set `userpassword`=:psd where `Account`=:name";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array(":psd"=>$news_psd,":name"=>$usn));
                print_r($stmt);
                $count = $stmt->rowCount();
                print_r($count);
                if($count){
                    echo "<script>alert('修改成功');location.href='../log_reg/login.php'</script>";
                }
            }else{
                echo "<script>alert('新密码和重新输入的不一样!'); location.href='./info_modify.php';</script>";
            }

        }else{
            echo "<script>alert('原密码错误!'); location.href='./info_modify.php';</script>";
        }
    }else{
        echo "<script>alert('不能留空!'); location.href='./info_modify.php';</script>";
    }
    
}







?>