<?php
global $app;
$app->library->import('rb');
class Db {
    
    public function __construct() {
        R::setup( 'sqlite:/tmp/dbfile.db' );
        //R::freeze( true );
    }
}
$db = new Db();