<?php

function getList($lpid=0,&$result=array(),$spac=0){
    $spac =$spac+2;
    include "conn.php";
    $sql = "select * from ly where lpid ='$lpid'";
//    var_dump($sql);
//    die();
    $res = mysqli_query($link,$sql);
    while ($row=mysqli_fetch_array($res)){
        $row['lcon']=str_repeat('&nbsp;',$spac).'|--'.$row['lcon'];
        $result[]=$row;
        getList($row['lid'],$result,$spac);
    }
    return $result;
}
    $rs = getList();
foreach ($rs as $val){
    echo  $val['lcon']."<br />";
}

?>