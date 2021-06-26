<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/info.css">
    <?php require "./pass_modify.php"; ?>
    <title>个人信息</title>
</head>
<body>
    <div class="big">
        <div class="box">
            <form action="./pass_modify.php" method="POST" enctype="multipart/form-data">
                <table>
                    <tr align="left">
                        <td>账号</td>
                        <td class="txt"><?php echo $_SESSION['user'] ?></td>
                    </tr>
                    <tr>
                        <td>原密码</td>
                        <td><input type="password" class="inp" name="old_psd"></td>
                    </tr>
                    <tr>
                        <td>新密码</td>
                        <td><input type="password" class="inp" name="new_psd"></td>
                    </tr>
                    <tr>
                        <td>重新输入新密码</td>
                        <td><input type="password" class="inp" name="news_psd"></td>
                    </tr>
                    <tr align="center">
                        <td colspan="2"><input type="submit" name="submit" class="submit" value="确认"></td>
                        <td></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>