<?php

function config($name) {
    return include BASE_PATH . "configs/$name.php";
}

function removeEmptyMembers($array) {
    return array_filter($array, function ($a) {
        return trim($a) !== "";
    });
}