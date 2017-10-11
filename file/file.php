<?php
//  echo $_POST['text'];
// $text=fopen('a.txt','w');
// fwrite($text,$_POST['text']);
class Upload
{
  public $text;
    public $size;//属性为字符串，不能计算
    public $fileName='file';
    // public $type=array('image/png','image/jpeg','image/gif');
    public $uploadRoot='text';//本地存储根目录
    private $fullPath;
    function __construct()
    {
        $this->size=1024*1024*10;
    }
    public function init($text)
    {
      $this->text=$text;
        // 1.接受文件,$_FILES,检测文件：is_upload_file,size_type
          // 2.检查目录,如果没有，则创建上传路径，file_system
            $this->checkDir();
          // 3.移动文件到指定目录
            $this->moveFile();
          // 4.为ajax输出文件存储的路径
          echo $this->fullPath;
    }
    private function accept()
    {
        if (is_uploaded_file($this->data['tmp_name'])) {//判断文件是否通过HTTP POST方式上传
            $this->data=$_FILES[$this->fileName];
            if ($this->data['size']<$this->size && array_search($this->data['type'], $this->type)) {
                return true;
            } else {
                return true;
            }
        } else {
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
        $fileName=time().mt_rand(0, 10000);
        //4.确定文件路径
        $this->fullPath=$this->uploadRoot.'/'.$currentDir.'/'.$fileName;
    }
    private function moveFile()
    {
        move_uploaded_file($this->text, $this->fullPath);
    }
}
// $upload=new Upload();
// $upload->init($text);
echo $_FILES['name'];
