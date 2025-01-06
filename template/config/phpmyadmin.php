<?php
$cfg['blowfish_secret'] = 'abmkDJIFGJI345JIOjiofgm>,.4345ji';

$i = 0;
$i++;
$cfg['Servers'][$i]['auth_type'] = 'cookie';
$cfg['Servers'][$i]['host'] = 'mariadb';
$cfg['Servers'][$i]['port'] = '3306';
// $cfg['Servers'][$i]['user'] = 'root';
// $cfg['Servers'][$i]['password'] = getenv('MARIADB_ROOT_PASSWORD');
$cfg['Servers'][$i]['compress'] = false;
$cfg['Servers'][$i]['AllowNoPassword'] = false;

$cfg['UploadDir'] = '';
$cfg['SaveDir'] = '';
$cfg['MaxFileSize'] = '640M';
$cfg['MemoryLimit'] = '1024M';

$cfg['ForceSSL'] = true;
// $cfg['PmaAbsoluteUri'] = 'https://phpmyadmin.site.ir/';
