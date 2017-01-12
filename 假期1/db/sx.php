<?php
include "conn.php";
if (isset($_GET['rid'])) {
    $rid = $_GET['rid'];
}
if (isset($_POST['sub'])) {
    $rid = $_POST['rid'];
    $sid = $_COOKIE['id'];
    $con = $_POST['sx'];
    $sql = "insert into sx(xid,scon,stime,sid,rid) value(null,'$con',now(),'$sid','$rid')";
//    var_dump($rid);
//    die();
    $query = mysqli_query($link, $sql);
    if ($query) {
        header('location:index.php');
    }
}
?>

<form action="sx.php" method="post">
    <input type="hidden" name="rid" value="<?php echo $rid ?>">
    <input type="text" name="sx">
    <input type="submit" name="sub" value="send">
</form>