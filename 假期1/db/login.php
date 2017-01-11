<?php
/**
 * Created by PhpStorm.
 * User: lili
 * Date: 17/1/11
 * Time: 上午10:24
 */
include "conn.php";
if(isset($_GET['uri'])){
    $uri = $_GET['uri'];
}else{
    $uri = "index.php";
}
if(isset($_POST['sub'])){
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $uri = $_POST["$num"];
    $sql = "select * from user where uname = '$name' and pass = '$pass'";
    $query =mysqli_query($link,$sql);
    $rs = mysqli_fetch_array($query);
    if ($rs){
        setcookie('id',$rs['uid'],time()+60);
        setcookie('name',$rs['uname'],time()+60);
        echo "<script>location='$uri'</script>";
    }

}





?>
<form action="login.php" method="post" id="f1">
    <input type="hidden" name="uri" value="<?php ?>">
    用户名:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name"><br />
    密 码:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="pass" id="p1"><br />
    重复密码:<input type="password" name="rename" id="rp1"><br />
    <input type="submit" name="sub" value="登录">
</form>
