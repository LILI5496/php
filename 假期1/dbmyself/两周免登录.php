<?php


?>
<form action="login.php" method="post" id="f1">
    <input type="hidden" name="uri" value="<?php echo $uri  ?>">
    用户名:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name"><br />
    密 码:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="pass" id="p1"><br />
    <input type="submit" name="sub" value="登录">

</form>
