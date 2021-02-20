<?php
abstract class AbstractCommand{
    protected $command;
    protected $arglist = array();

    function __construct()
    {   
        $temp =preg_split('/\s+/',trim($_POST["command"]));
        $this->name= $temp[0];
        array_shift($temp);
        $this->arglist=$temp; 
    }

    function __destruct() {
        try{
            echo $this->execute();
        }catch(Exception $e){
            echo $e->getMessage();
        }
        
    }
    
    abstract public function execute();
}

if (isset($_POST["command"])){
    
    $command =str_replace("_","",preg_split('/\s+/',trim($_POST["command"]))[0]);
    
    $fileIterator = new FileSystemIterator(__DIR__, FileSystemIterator::SKIP_DOTS);

    foreach ($fileIterator as $file){
        if (str_contains(strtolower($file->getFilename()),$command)){
            include $file->getFilename();
            break;
        }
    }

}
?>