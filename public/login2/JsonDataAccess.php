<?php 
require_once("DataAccess.php");
class JsonDataAccess extends DataAccess{
    private $_data;
    function __construct($data){
        $this->_data = $data;
    }

    public function select($condition){
    	$select_data = null;
    	$search_key = array_keys($condition)[0];

    	foreach ($this->_data as $value) {
           
    		if($value->{$search_key} == $condition[$search_key]){
                $select_data = $value;	
            }
    	}
    	return $select_data;
    }

    public function selectAll(){
    	return $this->_data;
    }

    public function update($condition,$data){
        $update_data = $this->select($condition);
        $update_data = $data;
        $json = fopen(dirname(__FILE__).'/data/blog.json','w+b');
        fwrite($json,json_encode($this->_data, JSON_UNESCAPED_UNICODE));
        fclose($json);
    }
   
}

 ?>