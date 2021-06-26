<?php
header("Content-type:text/html;charset=utf-8");
include "../mysqlconfig.php";
session_start();
/* if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
    echo "<script>alert('已登录!'); location.href='../../index.php';</script>";
} */
$name = $_POST['user'];
$pass = $_POST['pass'];
print_r($name);
print_r($pass);
print_r($_SESSION);
if(isset($name) && isset($pass)){
    $sql_name = "select * from `mess_user` where `Account` like binary(:name)";
    $stmt = $pdo->prepare($sql_name);
    $stmt->execute(array(':name'=>$name));
    if($stmt->fetch()){
        echo "账号正确";
        $inp1 = $_POST['user'];
        $_SESSION['user'] = $name;
        $sql_pass = "select * from mess_user where `Account` like binary(:name) and `userpassword` like binary(:pass);";
        // echo "<hr>";
        // print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
        $stmt1 = $pdo->prepare($sql_pass);
        $stmt1->execute(array(':name'=>$name,':pass'=>$pass));
        // $stmt1->execute(array(':pass'=>$pass));
        if($stmt1->rowCount()){
            echo "密码正确";
            print_r($stmt1);
            $_SESSION['pass'] = $pass;
            echo "<hr>";
            print_r($_SESSION);
            echo "<script>window.location.href='../my_mess.php'</script>";
        }else{
            $error1 = "密码错误";
        }
    }else{
        $error1 = "输入正确的账号！";
    }
    $pdo = null;    //关闭数据库连接
}



?>