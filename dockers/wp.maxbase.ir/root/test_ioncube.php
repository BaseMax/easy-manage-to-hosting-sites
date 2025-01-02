<?php
if (extension_loaded('ionCube Loader')) {
    echo "ionCube Loader is successfully installed and loaded.\n";

    if (function_exists('ioncube_loader_version')) {
        echo "ionCube Loader version: " . ioncube_loader_version() . "\n";
    } else {
        echo "Could not retrieve ionCube Loader version.\n";
    }
} else {
    echo "ionCube Loader is NOT loaded. Check your configuration.\n";
}
