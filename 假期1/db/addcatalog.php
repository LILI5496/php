<?php


include "conn.php";

if (isset($_POST['sub'])) {

    $_cname = $_POST['cname'];

    $sql = "select * from catalog where cname = '$_cname'";

   $query= mysqli_query($link, $sql);
    $result = mysqli_fetch_array($query);
    if($result){
        echo "<script>alert('当前分类已存在')</script>>";
        echo "<script>location='addcatalog.php'</script>";
    }else{
        $sql = "insert into catalog(cid,cname) values(null,'$_cname')";
        $query=mysqli_query($link,$sql);
        if($query){
            echo "<script>location='add.php'</script>";
        }
    }
}

?>

<meta charset="UTF-8">

<form action="addcatalog.php" method="post">

    分类名：<input type="text" name="cname">
    <input type="submit" name="sub" value="增加分类">

</form>