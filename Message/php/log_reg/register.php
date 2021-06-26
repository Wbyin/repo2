<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/reg.css">
    <script src="../../js/gg.js"></script>
    <title>用户注册</title>
</head>
<body>
<?php require "./doregister.php" ?>
<form action="" method="POST" onclick="">
        <table>
            <tr><td><h1>注册</h1></td></tr>
            <tr><td><input type="text" name="user" required="" id="inp1" class="inp" title="输入注册的账号" placeholder="输入要注册的账号"></td></tr>
            <tr><td><input type="password" name="pass" id="inp2" class="inp" title="输入要注册的账号的密码" placeholder="输入密码(由6-18个字符组成，区分大小写)" ></td></tr>    <!-- onkeyup="document.getElementById('inp2').value=this.value.replace(/./g,'*');" -->
            <tr><td><input type="password" name="pass1" id="inp3" class="inp" title="重复注册密码" placeholder="重复输入密码" ><br></td></tr>
            <tr><td><span id="error"><?php echo $error1 ?></span></td></tr>
            <tr>
                <td>
                    <input type="submit" name="btn" value="注册" class="btn" id="btn" onclick="return checkForm()">
                    <input type="button" name="btn" value="登录" class="btn" id="" onclick="window.location='./login.php'">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>