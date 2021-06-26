<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <script src="../js/jquery.min.js"></script>
    <?php require "./add_del_modify/sele/my_mess.php" ?>
    <title>我的留言</title>
</head>
<body>
    <div class="big_box">
        <div class="nav">
            <a href=".././indexs.php" class="info">留言板 </a>&nbsp;|</span><a class="info" href="./upload/individual.php">个人中心</a></span>
        </div>
        <div class="mess_con">
            <form action="#" method="POST">
                <textarea placeholder="请输入留言信息" name="con" id="con" cols="130" rows="10"></textarea>
                <input type="submit" id="fabu" name="submit" value="发布留言">
            </form>
        </div>
        <div class="content">
            <div class="content_top">
                <p>我的留言<span><?php echo "($total_rows)" ?></span><span><a class="a2" href="?page=<?php echo $page+1 ?>">下一页</a><a class="a1" href="?page=<?php echo $page-1 ?>">上一页</a></span></p>
            </div>

            <?php if($total_rows != 0): ?>
                <?php foreach($rows as $k=>$v):?>
                    <?php $imgid = $v['Account'] ?>
                <?php 
                // 头像
                $imgsql="select `Account`,`userImg` from mess_user where Account='$imgid'"; 
                    $stmt = $pdo->query($imgsql);
                    while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
                        $imgs = $res['userImg'];
                    }
                ?>
            <div class="content_con">
                <div class="con_con">
                    <table>
                    <form action="./add_del_modify/mess_modify.php?id=<?php echo $v['id'] ?>" method="POST" >
                        <tr>
                            <td rowspan="2" class="imag">
                                <img src="./upload/<?php echo $imgs ?>" class="img" alt="">
                            </td>
                            <td class="username" name="td_id"><?php echo $v['Account']; ?>
                            <td style="width: 225px;display:inline-block;text-align:right;left:76%;padding-top:10px;">
                                <?php echo $v['time'] ?>
                                <div class="edit">&nbsp;. . .&nbsp;</div>
                                <ul class="edit_ul">
                                    <input type="submit" value="编辑" name="sub" id="modi" class="modi">
                                    <a href="./add_del_modify/del.php?id=<?php echo $v['id'] ?>" class="del" onclick=""><li>删除</li></a>
                                </ul>
                            </td>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="td_con">
                                <textarea readonly="readonly" class="txts" name="txts" rows="10" cols="100"><?php echo $v['content'] ?></textarea>
                            </td>
                        </tr>
                        </form>
                    </table>
                </div>      
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
            <div class="con_bom">
                <ul>
                    <li><a class="a1" href="?page=<?php echo $page-1 ?>">上一页</a></li>

                    <li><a class="a2" href="?page=<?php echo $page+1 ?>">下一页</a></li>
                    <li>
                        转到<input type="text" class="txt" name="txt">页
                    </li>
                    <input class="button" type="button" name="button" value="确定">
                </ul>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            var log = "<?php echo $log ?>";
            var log_psd = "<?php echo $log_psd; ?>";
            // 判断有没有账号和密码
            if(log && log_psd){   //如果里面没有值
                // $('.info').html("个人中心").attr("href","../php/upload/individual.php");
                $('.edit').show(200);
                $('.edit_ul').hide();
                
                if($('.edit').click(function(){
                    $(this).siblings("ul").toggle(100);
                }));
            }else{
                $('.edit').hide();
                $('.edit_ul').hide();

                if($("#fabu").click(function(){
                    alert("未登录不能发布");
                    return false;
                }));
            };


            $("#fabu").click(function(){
                  if($("#con").val() == ""){
                      alert("请先填写内容");
                      return false;
                  }  
                });


            

            


            $(".modi").on("click",function(){
                var username = $(this).parents('tr').children('td:eq(1)').html();
                username = username.trim();//  trim() 去除空格
                console.log(username);
                console.log(log);
                // log = username ? alert("true"):alert("false");
                if(username == log){
                    
                    return true;
                }else{
                    alert('你只能修改自己的留言！');
                    return false;
                }
            })

            $(".del").click(function(){
                var r = confirm("确定删除吗?");
                if(r == true){
                    return true;
                }else{
                    return false;
                }
            })

            // 上一页下一页
            var left = "<?php echo $leftpage ?>";
            var right = "<?php echo $rightpage ?>";
            $(document).on('click','.a1',function(){
                if(left <= 0){
                    return false;
                }
            })
            $(document).on('click','.a2',function(){
                if(right != 1){
                    return false;
                }
            })
        })
    </script>

</body>
</html>