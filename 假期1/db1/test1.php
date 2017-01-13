<?php

$a=1;
function aa(){
    $b=123;
    global $a;
    echo $a;
    return $b;
}
echo aa();
//echo $b;



?>