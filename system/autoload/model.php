<?php
class Model {
    
    private $obj;
    
    public function __construct($data = array()) {
        if (array_key_exists('id', $data) &&  $data['id'] > 0) {
            $this->obj = R::load(static::getTableName(), $data['id']);
        } else {
            $this->obj = R::dispense(static::getTableName());
            $this->setData($data);
        }
    }
    
    public function __get($name) {
        return $this->obj->$name;
    }
    
    public function __set($name, $value) {
        $this->obj->$name = $value;
    }
    
    public function setData($data = array()) {
        foreach ($data as $key => $value)
            $this->obj->$key = $value;
    }
    
    public function save() {
        R::store($this->obj);
    }
    
    public static function delete($id) {
        $obj = R::load(static::getTableName(), $id);
        R::trash($obj);
    }
    
    protected static function getTableName() {
        return "";
    }
    
    public static function findAll() {
        return R::findAll(static::getTableName());
    }
    
}