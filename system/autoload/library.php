<?php
class Library {
    
    public function import($library) {
        includeFile('/system/library/' . $library . '/' . $library . '.php');
    }
}