<?php
// echo "<pre>";

echo "<hr>";
session_start();
class Uploader{
    // public 公共的函数
    public function make(){
        require '../mysqlconfig.php';
        $this->makeDir();
        // 上传成功的文件
        $saveFiles = [];
        // 调用私有函数
        $files = $this->format();
        // 上传块
        foreach($files as $f){
            echo "ddd";
            // 如果files的error为0 则没有错误
            if($f['error'] == 0){
                echo "true";
                if(is_uploaded_file($f['tmp_name'])){
                    // pathinfo() 函数以数组的形式返回文件路径的信息
                    // print_r(pathinfo($f['name']));                                             extension 是文件的后缀名
                    $to = $this->dir . '/' . time() . mt_rand(1,9999) . '.' . pathinfo($f['name'])['extension'];
                    // 如果移动零时文件
                    if(move_uploaded_file($f['tmp_name'],$to)){
                        $saveFiles[] = [
                            'path'=>$to,
                            'size'=>$f['size'],
                            'name'=>$f['name']
                        ];
                        // echo "上传成功";
                        // 数据库
                        global $name;
                        
                            foreach($saveFiles as $save){
                                // $tmp_name = strtolower($save['tmp_name']);
                                $name = strtolower($save['name']);
                                $path = strtolower($save['path']);
                                $size = $save['size'];
    
                                // $rest = substr($path,14);
                                // print_r($rest);
                                $fp = fopen($path,'r');
                                $content = fread($fp,$size);
                                fclose($fp);
                                $content = addslashes($content);
                                $name = $_SESSION['user'];
                                
                                // 上传到数据库
                                $sql = "update `mess_user` set `userImg`=:path where `Account`=:name";
                                $stmt = $pdo->prepare($sql);
                                $data = [':path'=>$path,':name'=>$name];
    
                                if($stmt->execute($data)){
                                    echo "<script> alert('修改头像成功'); </script>";
                                    // 查询 和 打印到框内
                                    $sql = "select * from mess_user where `Account` like binary(:name) and `userImg` like binary(:path)";
                                    $stmt = $pdo->prepare($sql);
                                    $data = [':path'=>$path,':name'=>$name];
                                    $stmt->execute($data);
                                    // print_r($path);
                                    // print_r($name);
                                    // echo "<hr>";
                                    while($row = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                                        $imag = $row[0]['userImg'];
                                    }
                                    global $img;    //public外访问公共变量
                                    $img = $imag;
                                    $_SESSION['img'] = $img;
                                }else{
                                    echo "繁忙";
                                }
                            }
                        }
                    }
                }
            }
        }
        

    


    //  创建上传目录 
    private function makeDir(){
        $path = 'uploads/' . date('y/m');
        $this->dir = $path;
        // 按年月分
        return is_dir($path) or mkdir($path,0755,true);
    }






    // 对不同结构的数据统一数据格式
    private function format(){
        // 创建一个空数组  存储格式化后的数据
        $files = [];
        // 循环超全局数组
        foreach($_FILES as $filed){
            // 如果file[name]里面是数组的话
            if(is_array($filed['name'])){
                // 循环filed里面的name  $id 就是0开始  后面的file是内容
                foreach($filed['name'] as $id=>$file){
                    // print_r($id);
                    $files[]=[
                        'name'=>$filed['name'][$id],
                        'type'=>$filed['type'][$id],
                        'tmp_name'=>$filed['tmp_name'][$id],
                        'error'=>$filed['error'][$id],
                        'size'=>$filed['size'][$id]
                    ];
                }
            }else{
                // 如果不是数组  就为空
                $files[] = $filed;
            }
        }
        return $files;
    }
}






?>