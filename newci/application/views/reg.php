<base href="<?php echo site_url()?>">
<link rel="stylesheet" href="assets/css/1.css">
<script src="assets/js/jquery.min.js"></script>

<div id="div1">
<form action="<? echo site_url('user/do_reg')?>" method="post">
    用户名: <input type="text" name="uname" id="i1"><br/>
    密码:<input type="password" name="pass" id="p1"><br/>
    重复密码:<input type="password" name="rpass" id="p2"><br/>
    <input type="submit" name="sub" value="注册">

</form>
</div>
<script>
//    window.onload=function () {
//
//    }
//    $(function () {
////        $('input')[0];
//        $('#pa').blur(function () {
//            var name=$(this).val();
//            var data={'name':name};
//            $.post("<?php //echo site_url(('user/checkname'))?>//","uname="+name,function (data) {
//                if(data=='success'){
//                    var oSpan=$('<span>用户名重名</span>');
//                    $('#n1').after(oSpan);
//                }else {
//                    <?php //echo 456?>
//                }
//            },'text');
//        });
//
//
//
//    });
    $(function () {
        $('#p2').blur(function (){
            var pass=$('#p1').val();
            var rpass=$('#p2').val();
            if (pass!=rpass){
                var oSpan=$('<span id="s1">密码不一致</span>');
                $(this).after(oSpan);
            }
            $('#p2').focus(function () {
                $('#s1').remove();
            });
            $('#n1').blur(function () {
                var name=$(this).val();
                $.post('<?php echo site_url('user/checkname)?>')?>

                if (data=='success'){

                }
            })


        }
    });
</script>
<?php







?>