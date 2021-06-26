<?php
header("Content-type:text/html;charset=utf-8");
include("../mysqlconfig.php");
$name = $_POST['user'];
$pass = $_POST['pass'];
$pass1 = $_POST['pass1'];


if(isset($name) && isset($pass) && isset($pass1)){
    $alt = "select Account from mess_user where binary Account=:name";
    $stmt = $pdo->prepare($alt);
    $stmt->execute(array(':name'=>$name));
    if($stmt->fetch()){
        echo "用户名存在";
        $error1 = "用户名存在";
    }else if($pass != $pass1){
        echo "密码不一致";
    }else{
        echo "不存在";
        //  sql语句
        $sql = "insert into `mess_user` (`Account`,`userpassword`) values(:name,:pass)";   //:name 两边不要点
        $stmt1 = $pdo->prepare($sql);
        $data = [':name'=>$name,':pass'=>$pass];
                        //  $name 后面可以加  PDO::PARAM_STR
        // echo $pdo->lastInsertId();
        if($stmt1->execute($data)){
            echo "成功";
            echo "<script> alert('注册成功，确定跳转登录页');setTimeout(window.location.href='./login.php'); </script>";
        }else{
            echo "繁忙";
        }

    }
}








?>