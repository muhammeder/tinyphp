<?php
class Controller {
    public function render($themeFile) {
        includeFile('/app/views/' . $themeFile . '.php');
    }
}