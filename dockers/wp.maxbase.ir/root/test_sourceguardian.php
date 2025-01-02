<?php
if (extension_loaded('SourceGuardian')) {
    echo "SourceGuardian is successfully installed and loaded.\n";

    if (function_exists('sg_get_loaded_extension_info')) {
        echo "SourceGuardian version: " . sg_get_loaded_extension_info() . "\n";
    } else {
        echo "Could not retrieve SourceGuardian version.\n";
    }
} else {
    echo "SourceGuardian is NOT loaded. Check your configuration.\n";
}
