<?php
class Db {
    
    public function __construct() {
        R::setup( 'sqlite:/tmp/dbfile.db' );
    }
}

$db = new Db();