<?php

function config($name) {
    return include "../configs/$name.php";
}

function removeEmptyMembers($array) {
    return array_filter($array, function ($a) {
        return trim($a) !== "";
    });
}