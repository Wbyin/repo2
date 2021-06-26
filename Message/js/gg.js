function checkForm(){
    var name = document.getElementById('inp1').value;
    var pass = document.getElementById('inp2').value;
    var pass1 = document.getElementById('inp3').value;
    var err = document.getElementById('error');
    var name1 = document.getElementById('inp1');
    console.log(pass);
    console.log(pass1);

    if(name.length == "" || pass.length == ""){
        err.style.display="block";
        err.innerHTML="账号或密码不能为空";
        return false;
    }else if(/.*[\u4e00-\u9fa5]+.*$/.test(name)){
        err.style.display="block";
        err.innerHTML="用户名或密码不能有中文字符";
        name1.focus();  //获取焦点
        return false;
    }else if(pass.length < 6 || pass.length > 18){
        err.style.display="block";
        err.innerHTML="密码不能小于6位并且不能大于18位";
        return false;
    }
    if(pass != pass1){
        err.style.display="block";
        err.innerHTML="密码不一致";
        return false;
    }
}
window.onload = function(){
    var inp = document.getElementsByClassName('inp');
    var err = document.getElementById('error');

    for(var i = 0;i < inp.length;i++){
        inp[i].onclick = function(){
            err.style.display='none';
        }
    }
}