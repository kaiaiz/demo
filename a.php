<?php
session_start();
// echo is_integer(false);//结果为false则不显示
if(extension_loaded('gd')){
  echo "you can use gd<br />";
  foreach (gd_info() as $cate => $value) {
    # code...
    echo "$cate:$value<br />";
  }
}else {
    echo "no gd extension";
  }
$_SESSION['name']='zhansgan';
echo $_SESSION['name'];
for($i=1;$i<3;$i++){
$a=1;
  echo ++$a.'1<br />';
}
echo $a;