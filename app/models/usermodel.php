<?php
class UserModel {
    
    public static function find($username, $password) {
        return R::findOne( 'user', " username = '$username' and password = '$password' ");
    }
}