<?php

namespace App\Services\View;

class View 
{
    /**
     * Load template
     *
     * @param string $view
     * @param array $data
     * @return void
     */
    public static function load($view, $data = array()) 
    {
        $view = str_replace('.', DIRECTORY_SEPARATOR, $view);
        $full_view_path = BASE_VIEW_PATH . $view . ".php";
  
        if (file_exists($full_view_path) && is_readable($full_view_path)) {
            extract($data);
            include_once $full_view_path;
        } else {
            echo "Error: view not exists!";
        }
    }

    //buffering -- load template and return string
    public static function render() {

    }
}