<?php

namespace APP\Utilities;

class Input {

    /**
     * Clean the input data
     *
     * @param string $data
     * @return $data
     */
    public static function clean($data) {
        // data cleaner 
        $data = stripslashes($data);
        $data = strip_tags('<script></script>');
        $data = filter_var($data, FILTER_SANITIZE_MAGIC_QUOTES);
        return $data;
    }
}