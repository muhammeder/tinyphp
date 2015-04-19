<?php
class UserModel extends Model {
    
    public function __construct($data = array()) {
        parent::__construct($data);
    }
    
    protected static function getTableName() {
        return 'user';
    }
    
    public static function find($username, $password) {
        return R::findOne( 'user', " username = '$username' and password = '$password' ");
    }
}