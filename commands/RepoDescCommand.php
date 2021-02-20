<?php
class RepoDescCommand extends AbstractCommand{
    public function execute(){
        if (count($this->arglist) == 2){
            
            $url = 'https://api.github.com/repos/'.$this->arglist[0].'/'.$this->arglist[1];
    
            $opts = [
                'http' => [
                        'method' => 'GET',
                        'header' => [
                                'User-Agent: PHP'
                            ]
                    ]
            ];
              $context = stream_context_create($opts);

              if (!($fileString = @file_get_contents($url, false, $context))){
                throw new Exception("No project was found with args: \"".$this->arglist[0]."\"  \"".$this->arglist[1]."\"");
              };

            echo "Owner: ".$this->arglist[0]."<br/>Project: ".$this->arglist[1];
            echo "<br/><br/>Description:<br/>";

              $jsonArray = json_decode($fileString,true);
              echo $jsonArray["description"];
                   
        }else{
            throw new Exception("Problem with the number of arguments!!!");
        }
    }
}

if (isset($_POST['command'])) new RepoDescCommand();
?>