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
        float: left;
        margin-left: 100px;
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
<a href="add.php">添加文章</a>
<?php
if(isset($_COOKIE['id'])){
    $id = $_COOKIE['id'];
    $name = $_COOKIE['name'];
    echo "<a href='center.php'>".$name."</a>已登录"."$nbsp;";
    echo "<a href='logout.php?id=$id'>注销</a>";
}else{
    echo "<a href='login.php'>未登录</a>";

}
?>
<div id="div1">
    <?php
    include "conn.php";
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "select * from blog,user,catalog where user.uid=blog.uid and blog.cid=catalog.cid and catalog.cid='$id'";
    }else{
        $sql = "select * from blog,user where user.uid=blog.uid order by blog.time desc";

    }
    $query = mysqli_query($link,$sql);

    while($rs = mysqli_fetch_array($query)){
        ?>


        <h3><a href="#"></a><?php echo $rs['title']?>|<a href="#">修改</a>|<a href="#">删除</a></h3>
        <li>时间:<?php echo $rs['time']?></li> &nbsp;&nbsp;<span>作者<?php echo $rs['uname']?></span><br />
        <p><?php echo $rs['content']?></p>
        <hr />



        <?php
    }
    ?>
</div>
<div id="div2">
    <a href="index.php">全部</a><br />
    <?php
    $sql = "select * from catalog";
    $query=mysqli_query($link,$sql);
    while ($rs = mysqli_fetch_array($query)){
        ?>
        <a href="index.php?id=<?php echo $rs['cid']?>"><?php echo $rs['cname']?></a><br />
        <?php
    }
    ?>


</div>









