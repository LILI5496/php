<?php
/**
 * Created by PhpStorm.
 * User: lili
 * Date: 17/1/10
 * Time: 下午7:21
 */
include "conn.php";
if(isset($_POST['sub'])){
    $title = $_POST['title'];
    $con = $_POST['con'];
    $cid = $_POST['cid'];
    $sql = "insert into blog(wid,title,content,time,cid) values(null,'$title','$con',now(),'$cid'))";
    $query = mysqli_query($link,$sql);
    if($query){

    header('location:index.php');
    }else{
        header('location:add.php');
    }
}
?>
<meta charset="UTF-8">
<form action="add.php" method="post">
    标题: <input type="text" name="title">
    <select name="catalog">
        <?php
        $sql = "select * from catalog";
        $query= mysqli_query($link,$sql);

        while ($result = mysqli_fetch_array($query)){
        ?>

        <option value="<?php $result['cid'] ?>"><?php echo $result['cname']?></option>
<?php
        }
?>
    </select><br />
    内容:<textarea name="con" id="" cols="30" rows="10"></textarea><br />
     <input type="submit" name="sub" value="提交">

</form>
