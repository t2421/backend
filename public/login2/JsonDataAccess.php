<?php 
require_once("DataAccess.php");
class JsonDataAccess extends DataAccess{
    private $_data;
    private $_data_source;
    function __construct($data,$data_source){
        $this->_data = $data;
        $this->_data_souce = $data_source;
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

    public function delete($condition){
    	$select_data = null;
        $search_key = array_keys($condition)[0];
      
        $delete_key = "";
    	foreach ($this->_data as $key => $value) {
     
    		if($value->{$search_key} == $condition[$search_key]){
                
                $delete_key = $key;
                break;
            }
        }
        if(is_int($delete_key)){
            array_splice($this->_data, $delete_key, 1);
            $json = fopen($this->_data_souce,'w+b');
            fwrite($json,json_encode($this->_data, JSON_UNESCAPED_UNICODE));
            fclose($json);
        }
    }

    public function update($condition,$data){
        $update_data = $this->select($condition);
        $update_data = $data;
        $json = fopen($this->_data_souce,'w+b');
        fwrite($json,json_encode($this->_data, JSON_UNESCAPED_UNICODE));
        fclose($json);
    }

    public function insert($data){
        //仮に一番最初の要素が一番新しいとする。
        if(count($this->_data) == 0){
            $new_id = 1;
        }else{
            $new_id = $this->_data[0]->id+1;
        }
        $data->id = $new_id;
        array_unshift($this->_data,$data);
        $json = fopen($this->_data_souce,'w+b');
        fwrite($json,json_encode($this->_data, JSON_UNESCAPED_UNICODE));
        fclose($json);
        return $data;
    }
   
}

 ?>