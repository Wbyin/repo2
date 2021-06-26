<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/log.css">
    <script src="../../js/gg.js"></script>
    <title>登录</title>
    <?php require("./dologin.php")  ?>
</head>
<body>
    <form action="" method="POST">
        <table>
            <tr><td><h1>登录</h1></td>
            <tr><td><input type="text" name="user" require="" class="inp" id="inp1" value="<?php echo $inp1 ?>" placeholder="输入账号"></td></tr>
            <tr><td><input type="password" name="pass" class="inp" id="inp2" placeholder="输入密码"></td></tr>
            <tr><td><span id="error"><?php echo $error1 ?></span></td></tr>
            <tr>
                <td>
                    <input type="submit" name="" value="登录" class="btn" id="btn" onclick="return checkForm()">
                    <input type="button" name="button" name="" value="注册" class="btn" onclick="window.location.href='./register.php'">
                </td>
            </tr>
            </tr>
        </table>
    </form>
    <script>
    </script>
</body>
</html>