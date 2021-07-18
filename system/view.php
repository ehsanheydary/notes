<?php

class View
{
    public static function render($filePath, $data = array())
    {

        extract($data);

        ob_start();

        require_once("mvc/view/" . $filePath);

        $output = ob_get_clean();

        require_once 'theme/default.php';

    }
}