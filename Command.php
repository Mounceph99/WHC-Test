<?php

class Command{
    private $name;
    private $arglist = array();

    function __construct()
    {   
            
        $temp =preg_split('/\s+/',trim($_POST["command"]));
        $this->name= $temp[0];
        array_shift($temp);
        $this->arglist=$temp;
            
    }

    function __destruct() {
        $this->executeCommand();
    }

    private function executeCommand(){
            try{
                switch ($this->name){
                case "add":
                    echo $this->add();
                break;
                case "repo_desc":
                    echo $this->getRepoDesc();
                break;
                case "sort_asc": 
                    if (asort($this->arglist,SORT_NUMERIC)){
                        print_r($this->arglist);
                    }else{
                       throw new Exception("Could not sort!!!");
                    }            
                break;
                default: 
                    echo "The command \"$this->name\" entered is not supported!";
                }
            }catch(Exception $e){
                echo "Message: " . $e->getMessage();
            }   

    }
    private function add(){
        
        $sum = 0;
        for ($i=0;$i<count($this->arglist);$i++){
            if (!is_numeric($this->arglist[$i])){
                throw new Exception("Non-numeric argument!!!");
            }
            $sum += (int)$this->arglist[$i];
        }
        return $sum;
    }

    private function getRepoDesc(){
        if (count($this->arglist) == 2){
            echo "Owner: ".$this->arglist[0]."<br/>Project: ".$this->arglist[1];
            echo "<br/><br/>Description:<br/>";
        }else{
            throw new Exception("Problem with the number of arguments!!!");
        }
		//hint: file_get_contents()
		//https://www.php.net/file_get_contents

    }
} 

if (isset($_POST["command"])){
    new Command();
}

?>