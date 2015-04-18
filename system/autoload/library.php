<?php
class Library {
    
    private $lib_folder;
    
    public function __construct($lib_folder) {
        $this->lib_folder = $lib_folder;
    }
    
    public function import($library) {
        includeFile("$this->lib_folder/$library" . '/' . "$library.php");
        return $this;
    }
}