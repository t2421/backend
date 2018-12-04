<?php
require_once __DIR__.'/bootstrap.php';
class Mail{
    private $_to = "";
    private $_template_path = "";
    private $_data;

    public function __construct($to,$template_path,$data){
        $this->_to = $to;
        $this->_template_path = $template_path;
        $this->_data = $data;

        $loader = new Twig_Loader_Filesystem(__DIR__.'/templates');
        $this->twig = new Twig_Environment($loader);
    }
    private function _getContents(){
        return $this->twig->render($this->_template_path, ['data' => $this->_data] );
    }
    public function send(){
        echo($this->_getContents());
    }
}