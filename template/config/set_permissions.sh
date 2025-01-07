#!/bin/bash

# Set ownership and permissions
chown -R www-data:www-data /var/www/html

# Apply permissions to files and directories
find /var/www/html -exec chown www-data:www-data {} \;
find /var/www/html -type d -exec chmod 755 {} \;
find /var/www/html -type f -exec chmod 644 {} \;

# Special permissions for wp-config.php
if [ -f /var/www/html/wp-config.php ]; then
    chgrp www-data /var/www/html/wp-config.php
    chmod 660 /var/www/html/wp-config.php
else
    echo "Error: './wp-config.php' not found."
fi

# Special permissions for wp-content directory
if [ -d /var/www/html/wp-content ]; then
    find /var/www/html/wp-content -exec chgrp www-data {} \;
    find /var/www/html/wp-content -type d -exec chmod 775 {} \;
    find /var/www/html/wp-content -type f -exec chmod 664 {} \;
else
    echo "Directory './wp-content' does not exist"
fi
