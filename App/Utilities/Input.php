<?php

namespace APP\Utilities;

class Input {

    /**
     * Clean the input data
     *
     * @param string $data
     * @return string
     */
    public static function clean($data) {
        // data cleaner 
        $data = stripslashes($data);
        $data = strip_tags($data);
        $data = filter_var($data, FILTER_SANITIZE_MAGIC_QUOTES);
        return $data;
    }
}