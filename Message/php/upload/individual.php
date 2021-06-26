<?php
session_start();
if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
    
    if($_GET['action'] == "logout"){
        $_SESSION = array();
        print_r($_SESSION);
        echo "退出成功";
        echo "<script>window.location.href='../log_reg/login.php'</script>";
    }
}else{
    echo '<script>alert("未登录!"); location.href="../log_reg/login.php";</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../js/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../../css/indiv.css">
    <?php require "./indiv_2.php" ?>
    <title>个人中心</title>
</head>
<body>
    <div class="big_box">
        <div class="box">
            <ul>
                <form action="#" enctype="multipart/form-data" method="POST">
                    <div id="div1">
                        <img src="<?php echo $img ?>" id="avatar"  onclick="getPicture()" name="img"/>
                        <div class="user"><input type="text" value="<?php echo $usn ?>" id="txt"></div>
                    </div>
                    <input type="file" name="user.photo" onchange="setImage(this)" id="photo" style="display: none" value="上传"/>
                    <input type="submit" id="sub" style="display: none;">
                </form>
                <li class="xgmm">修改密码</li>
                <li class="ckly">查看我的留言</li>
                <a href="./individual.php?action=logout">退出登录</a>
            </ul>
        </div>
    </div> 
    <script>
        function getPicture(){
            $("#photo").click();
        }
            function setImage(docObj) {
                var f = $(docObj).val();    //上传图片的路径
                console.log(f);
                f = f.toLowerCase();
                var strRegex = ".bmp|png|jpg|jpeg$";
                var re=new RegExp(strRegex);
                if (re.test(f.toLowerCase())){
                    //return true;
                    $("#sub").click();
                }
                else{
                    alert("请选择正确格式的图片");
                    return false;
                }
}


$(function(){
    $(".xgmm").click(function(){
        window.location.href="../add_del_modify/info_modify.php";
    })

    $(".ckly").click(function(){
        window.location.href="../my_mess.php";
    })
})






    </script>
</body>
</html>