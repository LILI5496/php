<style>
    *{
        margin: 0;
        padding: 0;
    }
    #div1{
        width: 300px;
        height: 200px;
        background: #ccc;
        margin: 200px auto;

    }
    #f1{
        margin: auto;

    }
    
    
    
    
</style>
<?php
include "conn.php";
if(isset($_GET['uri'])){
    $uri = $_GET['uri'];
}else{
    $uri = "index.php";
}
if(isset($_POST['sub'])){
    $name = $_POST['name'];
    $pass = $_POST['pass'];

    $uri = $_POST['uri'];
    $sql = "select * from user where uname = '$name' and pass =  '$pass'";
    $query =mysqli_query($link,$sql);
    $rs = mysqli_fetch_array($query);
    if ($rs){

        if (isset($_POST['check'])){
            setcookie('id',$rs['uid'],time()+60);
            setcookie('name',$rs['uname'],time()+60);

        }else{
            setcookie('id',$rs['uid']);
            setcookie('name',$rs['uname']);
        }
        echo "<script>location='$uri'</script>";
    }
}
?>
<?php
if (isset($_POST['reg'])){
    header('location:reg.php');
}


?>
<div id="div1">
<form action="login.php" method="post" id="f1">

    <input type="hidden" name="uri" value="<?php echo $uri  ?>">
    用户名:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name"><br />
    密 码:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="pass" id="p1"><br />
    <input type="checkbox" name="check" value="">两分钟免登录<br />

    <input type="submit" name="sub" value="登录">
    <input type="submit" name="reg" value="注册">

</form>
</div>
