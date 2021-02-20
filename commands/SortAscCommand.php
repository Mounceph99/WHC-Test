<?php
class SortAscCommand extends AbstractCommand{

    public function execute(){
        if (!asort($this->arglist,SORT_NUMERIC)){
           throw new Exception("Could not sort!!!");
        }
        return print_r(array_values($this->arglist),true);
    }
}
    if (isset($_POST['command'])) new SortAscCommand();
?>