<?php
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
