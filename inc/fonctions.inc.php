<?php

function user_is_connected() {
    if(! empty($_SESSION['utilisateur'])) {
        return true;
    } else {
        return false;
    }
}

function user_is_admin() {
    if(user_is_connected() && $_SESSION['utilisateur']['statut'] == 2) {
        return true;
    } 
    return false;
}