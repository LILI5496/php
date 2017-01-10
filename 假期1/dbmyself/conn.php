<?php
/**
 * Created by PhpStorm.
 * User: lili
 * Date: 17/1/10
 * Time: 下午4:05
 */
$link=@mysqli_connect('localhost:3306','root','') or die('链接数据库失败');
@mysqli_select_db($link,'blog1') or die('选择数据库失败');
//mysqli_set_charset($link,'utf8');
mysqli_set_charset($link, 'utf8');