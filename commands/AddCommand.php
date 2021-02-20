<?php
class AddCommand extends AbstractCommand{

    public function execute(){
        $sum = 0;
        for ($i=0;$i<count($this->arglist);$i++){
            if (!is_numeric($this->arglist[$i])){
                throw new Exception("Non-numeric argument!!!");
            }
            $sum += (int)$this->arglist[$i];
        }
        return $sum;
    }
}
    if (isset($_POST['command'])) new AddCommand();
?>