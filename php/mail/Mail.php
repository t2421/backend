<?php
require_once __DIR__.'/MailTemplate.php';
class Mail{
    private $_to = "";
    private $_template;
    private $_data;

    public function __construct($to,$template_path,$data){
        $this->_to = $to;        
        $this->_template = new MailTemplate($data,$template_path);
    }
    private function _getContents(){
        return $this->_template->getContents();
    }
    public function send(){
        echo($this->_getContents());
    }
}