<?php
require_once __DIR__.'/bootstrap.php';
class MailTemplate{
    private $_data;
    private $_twig;
    private $_template;

    public function __construct($data,$template_path){
        $loader = new Twig_Loader_Filesystem(__DIR__.'/templates');
        $this->_twig = new Twig_Environment($loader);
        $this->_data = $data;
        $this->_template = $template_path;
        
    }

    public function getContents(){
        return $this->_twig->render($this->_template, ['data' => $this->_data] );
        
    }
}