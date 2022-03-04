<?php

function get($get){

    if (isset($_GET[$get])){
        return trim($_GET[$get]);
    }else return false;


}
function post($post){

    if (isset($_POST[$post])){
        return trim($_POST[$post]);
    }else return false;


}
function session($session){
    if (isset($_SESSION[$session])){
        return trim($_SESSION[$session]);
    }else return false;
}
function cook($cookie){
    if (isset($_COOKIE[$cookie])){
        return trim($_COOKIE[$cookie]);
    }else return false;
}
function _p($data){
    echo "<pre style=' background:#1d1d1d;color: greenyellow; position: absolute; left: :0; top: 0;z-index: 9999999;width: 100%;height: 600px' >";
    print_r($data);
    echo "</pre>";
}

?>