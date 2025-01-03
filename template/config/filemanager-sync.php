<?php
$envPath = '/var/www/html/.env';

if (!file_exists($envPath)) {
    exit('Error: .env file not found.');
}

$env = [];
foreach (file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
    if (strpos($line, '=') !== false) {
        list($key, $value) = explode('=', $line, 2);
        $env[trim($key)] = trim($value);
    }
}

print_r($env);

if (!isset($env['FILEMANAGER_USERNAME']) || !isset($env['FILEMANAGER_PASSWORD'])) {
    exit('Error: Required environment variables not set.');
}

$username = $env['FILEMANAGER_USERNAME'];
$password = password_hash($env['FILEMANAGER_PASSWORD'], PASSWORD_DEFAULT);

$username = str_replace('\'', '\\\'', $username);
$password = str_replace('\'', '\\\'', $password);

$targetFile = '/var/www/html/config.php';
if (!file_exists($targetFile)) {
    exit('Error: Target PHP file not found.');
}

$fileContents = file_get_contents($targetFile);
if ($fileContents === false) {
    exit('Error: Unable to read the target PHP file.');
}

$fileContents = str_replace('{FILEMANAGER_USERNAME}', $username, $fileContents);
$fileContents = str_replace('{FILEMANAGER_PASSWORD}', $password, $fileContents);

if (file_put_contents($targetFile, $fileContents) === false) {
    exit('Error: Unable to write to the target PHP file.');
}

echo "Placeholders replaced successfully.\n";