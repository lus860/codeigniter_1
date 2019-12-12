<?php
$config['protocol'] = 'smtp';
$config ['smtp_host'] = 'ssl://smtp.gmail.com';  
$config['smtp_port'] = '465'; //smtp port number
$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = TRUE;
$config['newline'] = "\r\n"; //use double quotes
$config['mailpath'] = '/usr/sbin/sendmail';