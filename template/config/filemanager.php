<?php
function loadEnv($filePath) {
    if (!file_exists($filePath)) {
        return false;
    }

    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        if (strpos($line, '#') === 0) continue;

        list($key, $value) = explode('=', $line, 2);
        $key = trim($key);
        $value = trim($value);

        if ((substr($value, 0, 1) === '"' && substr($value, -1) === '"') || 
            (substr($value, 0, 1) === "'" && substr($value, -1) === "'")) {
            $value = substr($value, 1, -1);
        }

        putenv("$key=$value");
    }

    return true;
}

$envFilePath = __DIR__ . '/.env';
loadEnv($envFilePath);

$FILEMANAGER_USERNAME = getenv('FILEMANAGER_USERNAME');
$FILEMANAGER_PASSWORD = getenv('FILEMANAGER_PASSWORD');
$FILEMANAGER_PATH = getenv('FILEMANAGER_PATH');

$CONFIG = '{"lang":"en","error_reporting":true,"show_hidden":true,"hide_Cols":false,"theme":"light"}';

$use_auth = true;

$auth_users = [
    "$FILEMANAGER_USERNAME" => password_hash($FILEMANAGER_PASSWORD, PASSWORD_DEFAULT),
];

$readonly_users = [];

$use_highlightjs = true;

$highlightjs_style = 'vs';

$edit_files = true;

$default_timezone = 'Asia/Tehran';

$root_path = '/var/www/html/';

$root_url = '';

$http_host = $FILEMANAGER_PATH ?? 'localhost';

$is_https = ($http_host !== "localhost");
// $is_https = isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1)
//     || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https';

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
