<?php
$CONFIG = '{"lang":"en","error_reporting":true,"show_hidden":true,"hide_Cols":false,"theme":"light"}';

$use_auth = true;

$auth_users = [
    getenv('FILEMANAGER_USERNAME') => password_hash(getenv('FILEMANAGER_PASSWORD'), PASSWORD_BCRYPT),
];

$readonly_users = [];

$use_highlightjs = true;

$highlightjs_style = 'vs';

$edit_files = true;

$default_timezone = 'Asia/Tehran';

$root_path = '/var/www/html/root/';

$root_url = '';

$http_host = $_SERVER['HTTP_HOST'];

$directories_users = [];

$iconv_input_encoding = 'UTF-8';

$datetime_format = 'd.m.y H:i:s';

$allowed_file_extensions = '';

$allowed_upload_extensions = '';

$favicon_path = '';

$exclude_items = [''];

$online_viewer = 'google';

$sticky_navbar = true;

$path_display_mode = 'full';

$max_upload_size_bytes = 5000000;

$ip_ruleset = 'OFF';

$ip_silent = true;

$ip_whitelist = [
    '127.0.0.1',
    '::1',
];

$ip_blacklist = [
    '0.0.0.0',
    '::',
];
