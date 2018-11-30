<?php
class Mail{
    private $_to = "";
    private $_template_path = "";
    private $_data;
    public function __construct($to,$template_path){
        $this->_to = $to;
        $this->_template_path = $template_path;
    }

    public function setData($data){
        $this->_data = $data;
    }
    
    public function send(){
        $data = $this->_data;
        ob_start();
        include($this->_template_path);
        return ob_get_clean();    
    }
}