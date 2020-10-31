<?php

function init_php_session() : bool{
    if(!session_id()){
        session_start();
        session_regenerate_id();
        return true;
    } else {
        return false;
    }
}

function clean_php_session() : void {
    session_unset();
    session_destroy();
}

function is_logged(): bool {
    if(isset($_SESSION['email'])) {
        return true;
    } else {
        return false;
    } 
}

function is_admin(): bool {
    return true;
}