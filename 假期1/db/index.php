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
    #div{
        float: right;
        margin-right: 50px;
        margin-top: 20px;
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
<div id="div">
<a href="add.php">添加文章</a>&nbsp;&nbsp;&nbsp;
<?php
if(isset($_COOKIE['id'])){
    $id = $_COOKIE['id'];
    $name = $_COOKIE['name'];
    echo "<a href='center.php'>".$name."</a>已登录".'&nbsp;&nbsp;&nbsp;';
    echo "<a href='logout.php?id=$id'>注销</a>";
}else{
    echo "<a href='login.php'>未登录</a>";

}
?>
</div>

<form action="index.php" method="get">
    <input type="text" name="search">
    <input type="submit" name="sub" value="搜索">
</form>

<div id="div1">
    <?php
    include "conn.php";
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "select * from blog,user,catalog where user.uid=blog.uid and blog.cid=catalog.cid and catalog.cid='$id'";
    }else{
        if (isset($_GET['sub'])){
            $e = $_GET['search'];
        }
            if (strlen($e)==0){
                $w =1;
            }else{
                $w ="title like '%$e%'";

            }


        $sql = "select * from blog,user where $w and user.uid=blog.uid order by blog.time desc";

    }
//    var_dump($sql);
//    die();
    $query = mysqli_query($link,$sql);

    while($rs = mysqli_fetch_array($query)){
        ?>


        <h3><a href="all.php?id=<?php echo $rs['wid']?>"><?php echo $rs['title']?></a>|<a href="edit.php?id=<?php echo $rs['wid']?>">修改</a>|<a href="del.php?id=<?php echo $rs['wid']?>">删除</a></h3>
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









