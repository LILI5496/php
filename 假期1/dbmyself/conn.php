<?php
/**
 * Created by PhpStorm.
 * User: lili
 * Date: 17/1/10
 * Time: 下午4:05
 */
$link=@mysqli_connect('127.0.0.1:3306','root','123') or die('链接数据库失败');
@mysqli_select_db($link,'blog6') or die('选择数据库失败');
//mysqli_set_charset($link,'utf8');
mysqli_set_charset($link, 'utf8');