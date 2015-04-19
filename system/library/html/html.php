<?php
class Html {
    public static function a($label, $href, $data=array()) {
        $href = UrlHelper::getPath($href);
        $str = "<a href='$href'";
        foreach ($data as $key => $value) {
            $str .= " $key=\"$value\" ";
        }
        $str .= ">$label</a>";
        return $str;
    }
}