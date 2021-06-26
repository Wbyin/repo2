<?php
require "../mysqlconfig.php";
session_start();
$usn = $_SESSION['user'];
$con = $_POST['text'];
$id = $_GET['id'];
// print_r($_POST);
// print_r($_SESSION);
// print_r($_GET);
if(isset($usn)){}

if(isset($_POST['sub']))

if($_POST['sub'] == "提交"){
    $sql = "update mess_content set content=:con,time=now() where id=:id and Account=:name";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(":con"=>$con,":id"=>$id,":name"=>$usn));
    $count = $stmt->rowCount();
    // print_r($count);
    if($count){
        echo "<script>alert('留言修改成功！'); location.href='.././my_mess.php';</script>";
    }else{
        echo "<script>alert('留言修改失败')</script>";
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../js/jquery.min.js"></script>
    <title>Document</title>
</head>
<style>
    #text{
        margin: 0;
        padding: 0;
        list-style: none;
        outline: none;
    }
</style>
<body>

<form action="" method="post">
    <textarea name="text" id="text" cols="100" rows="20"></textarea>
    <input type="submit" name="sub" id="sub" value="提交">
</form>

</body>
<script>
    $(function(){
        var txt = "<?php echo $_POST['txts'] ?>";
        var id = "<?php echo $_POST['id'] ?>";
        $("#text").text(txt);

        var sub = $("#sub");
        var text = $("#text");

        sub.click(function(){
            if(text.val() == ""){
                alert("请先填写留言内容");
                return false;
            }else{
                return true;
            }
        })
    })
</script>
</html>


