<?php
/**
 * Created by PhpStorm.
 * User: lili
 * Date: 17/1/10
 * Time: 下午8:05
 */
?>
<style>
    *{
        margin: 0;
        padding: 0;
    }
    body{
        width: 100%;
        height: 100%;
    }
    #div1{
        width: 40%;
        height: 70%;
        margin-left: 50px;
        margin-top: 50px;

    }
    #div2{
        width: 20%;
        height: 30%;
        margin-top: 50px;
        margin-right: 50px;
        float: right;
    }
</style>
<a href="add.php">添加文章</a>$nbsp;$nbsp;
<?php
if(isset($_COOKIE['id'])){
    $id = $_COOKIE['di'];
    $name = $_COOKIE['name'];
    echo $_COOKIE['uname']."";
    echo "<a href='logout.php?id=$id'>注销</a>";
}else{
    echo "<a href='login.php?'>未登录</a>";

}
?>
<div id="div1">
    <?php
    include "conn.php";
    $sql = "select * from blog";
    //,user where user.uid=blog.user and user='$name'
    $query = mysqli_query($link,$sql);
    while($rs = mysqli_fetch_array($query)){
        ?>


        <h3><a href="#"></a><?php echo $rs['title']?>|<a href="#">修改</a>|<a href="#">删除</a></h3>
        <li>时间:<?php echo $rs['time']?></li> &nbsp;&nbsp;<span>作者:xxx</span><br />
        <p><?php echo $rs['content']?></p>
        <hr />



        <?php
    }
    ?>
</div>
<div id="div2">
    <?php
    $sql = "select * from catalog";
    $query=mysqli_query($link,$sql);
    while ($rs = mysqli_fetch_array($query)){
        ?>
        <a href="<?php echo $rs['cid']?>"><?php echo $rs['cname']?></a>
        <?php
    }
    ?>


</div>









