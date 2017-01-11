<?php
include "conn.php";
//for($i=0;$i<50;$i++){
//    $fyname = 'lili'.$i;
//    $sql ="insert into fenye(fyid,fyname) values(null,'$fyname')";
//    mysqli_query($link,$sql);
//}
if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 1;
}
$pagesize = 10;

$pp = ($page - 1) * $pagesize;
$sql = "select count(*) as allnum from fenye";
$query=mysqli_query($link,$sql);
$rs = mysqli_fetch_array($query);
$lastpage=ceil($rs[allnum]/$pagesize);
$sql = "select * from fenye limit $pp,$pagesize";
$query = mysqli_query($link, $sql);
echo "<table align='center' width='500' border='1' cellspacing='0'>";
while ($rs = mysqli_fetch_array($query)) {
    ?>
    <tr>
        <td><?php echo $rs['fyid'] ?></td>
        <td><?php echo $rs['fyname'] ?></td>
    </tr>
    <?php
        }
        echo "<tr>";
        echo "<td colspan='2'>";
        echo "<a href='?p=1'>首页</a>";
        echo "<a href='?p=".(($page>1)?$page-1:1)."'>上一页</a>";
        echo "<a href='?p=".(($page<$lastpage)?$page+1:$lastpage)."'>下一页</a>";
        echo "<a href='?p=".$lastpage."'>末页</a>";

        echo "</td>";
        echo "</tr>";

    echo "</table>"
?>