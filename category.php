<?PHP
$address = array(
    array('id'=>1  , 'address'=>'安徽' , 'parent_id' => 0),
    array('id'=>2  , 'address'=>'江苏' , 'parent_id' => 0),
    array('id'=>3  , 'address'=>'合肥' , 'parent_id' => 1),
    array('id'=>4  , 'address'=>'庐阳区' , 'parent_id' => 3),
    array('id'=>5  , 'address'=>'大杨镇' , 'parent_id' => 4),
    array('id'=>6  , 'address'=>'南京' , 'parent_id' => 2),
    array('id'=>7  , 'address'=>'玄武区' , 'parent_id' => 6),
    array('id'=>8  , 'address'=>'梅园新村街道', 'parent_id' => 7),
    array('id'=>9  , 'address'=>'上海' , 'parent_id' => 0),
    array('id'=>10 , 'address'=>'黄浦区' , 'parent_id' => 9),
    array('id'=>11 , 'address'=>'外滩' , 'parent_id' => 10),
    array('id'=>12 , 'address'=>'安庆' , 'parent_id' => 1)
    );
// 家谱树
/*
*@param $data 要分类的数据
*@param $id 当前元素的祖先节点
*/
function ance($data,$pid){
  static $output=array();
  foreach ($data as $key => $value) {
    if ($value['id']==$pid) {
      $output[]=$value;
      ance($data,$value['parent_id']);
      // var_dump($value['parent_id']);
    }
  }
    return $output;
}
$arr=ance($address,4);
// var_dump($arr);
//子孙树
/*
*@param $data 要遍历的数据
*@param $id 当前元素的子id
*@param $level 节点等级
*/
function getTree($data,$id,$level){
  static $output=array();
  foreach ($data as $key => $value) {
    if ($value['parent_id']==$id) {
      $str=str_repeat('--',$level);
      $output[]=$str.$value['address'];
      getTree($data,$value['id'],$level+1);
    }
  }
  return $output;
}
$arr=getTree($address,0,0);
var_dump($arr);
