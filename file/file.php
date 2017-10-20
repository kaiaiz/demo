<?php
// $text=fopen('a.txt','w');
// fwrite($text,$_POST['text']);
class Upload
{
    public $data;
    public $size;//属性为字符串，不能计算
    public $fileName='text';
    public $type=array('text/plain');
    public $uploadRoot='text';//本地存储根目录
    private $fullPath;
    public function __construct()
    {
        $this->size=1024*1024*10;
    }
    public function init()
    {
        $this->data=$_FILES[$this->fileName];
        // 1.接受文件,$_FILES,检测文件：is_upload_file,size_type
        if ($this->accept()) {
            // 2.检查目录,如果没有，则创建上传路径，file_system
            $this->checkDir();
            // 3.移动文件到指定目录
            $this->moveFile();
            // 4.为ajax输出文件存储的路径
            echo $this->fullPath;
        }
    }
    private function accept()
    {
        if (is_uploaded_file($this->data['tmp_name'])) {//判断文件是否通过HTTP POST方式上传
            if ($this->data['size']<$this->size && array_search($this->data['type'], $this->type)) {
                return true;
            } else {
                return true;
            }
        } else {
            echo "1";
            return false;
        }
    }
    private function checkDir()
    {
        // 1.判断根目录
        if (!is_dir($this->uploadRoot)) {
            mkdir($this->uploadRoot);
        }
        // 2.判断当前目录
        $currentDir=date('y-m-d');
        if (!is_dir($this->uploadRoot.'/'.$currentDir)) {
            mkdir($this->uploadRoot.'/'.$currentDir);
        }
        // 3.指定文件名
        $fileName=time().mt_rand(0, 10000).$this->data['name'];
        //4.确定文件路径
        $this->fullPath=$this->uploadRoot.'/'.$currentDir.'/'.$fileName;
    }
    private function moveFile()
    {
        move_uploaded_file($this->data['tmp_name'], $this->fullPath);
    }
}
$upload=new Upload();
$upload->init();
// echo $_FILES['text']['name']."\n";//注意：此处的上传文件名要与FormData一致.
// echo $_FILES['text']['type']."\n";
// echo $_FILES['text']['size']."\n";
// echo $_FILES['text']['tmp_name']."\n";
echo date('y-m-d')."\n";
echo time()."\n";
echo date('y-m-d',time())."\n";
for ($i=0; $i <5 ; $i++) {
  # code...
echo mt_rand(5,10000)."\n";
}
var_dump($_SERVER);
$url=$_SERVER['HTTP_HOST'];
$len=strlen($_SERVER['DOCUMENT_ROOT']);
$str=substr($_SERVER['SCRIPT_FILENAME'],$len);
$url=$url.$str;
echo $url;
