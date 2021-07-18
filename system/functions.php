<?php

function dump($varname, $boolean = false)
{
    if (!$boolean):
        echo '<pre>';
        var_dump($varname);
        echo '</pre>';
    else:
        $a = var_export($varname, true);
        return $a;
    endif;
}

function GetHashPassword($password)
{
    $password = hash('SHA512', $password);
    return $password;
}

function GetUri()
{
    return 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

function RequestUri()
{
    return $_SERVER['REQUEST_URI'];
}

function baseuri()
{
    return "/notes";
}

function strhas($string, $search, $caseSensitive = false)
{
    if ($caseSensitive) {
        return strpos($string, $search) !== false;
    } else {
        return strpos(strtolower($string), strtolower($search)) !== false;
    }
}

function message($type, $message, $bool = false)
{
    $data['message'] = $message;
    View::render("/message/$type.php", $data);
    if ($bool)
    {
        die();
    }
}