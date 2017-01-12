<?php
include "conn.php";
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "select * from blog where wid='$id'";
    $query = mysqli_query($link,$sql);
    $rs = mysqli_fetch_array($query);
}
if (isset($_POST['sub'])){
    $hid = $_POST['hid'];
    $title = $_POST['title'];
    $con = $_POST['con'];

    $sql = "update blog set title='$title',content='$con' where wid='$hid'";
    $query=mysqli_query($link,$sql);

    if ($query){
        header('location:index.php');
    }
}

?>
<form action="edit.php" method="post">
    <input type="hidden" name="hid" value="<?php echo $rs['wid']?>">
    title: <input type="text" name="title" value="<?php echo $rs['title']?>"><br />
    content: <textarea name="con" id="" cols="30" rows="10"><?php echo $rs['content']?></textarea><br />
    <input type="submit" name="sub" value="update">
</form>
