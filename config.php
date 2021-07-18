<?php

switch (defined('flag')):
    case false :
        die('<p style="font-size: 28px;"><b>Access forbidden!</b></p>
You don\'t have permission to access the requested directory. There is either no index document or the directory is read-protected.
If you think this is a server error, please contact the webmaster.
<p style="font-size: 28px">Error 403 <p>');
        break;
endswitch;

global $config;
$config['host'] = 'localhost';
$config['user'] = 'Ehsan';
$config['pass'] = '1npVptyf6Jffh3XZ';
$config['db'] = 'notes';

session_start();