#!/bin/sh

# Set ownership for the entire directory first (this will be fast and recursive)
chown -R www-data:www-data /var/www/html

# Apply permissions for directories and files in a single step to avoid multiple passes
find /var/www/html -type d -exec chmod 755 {} \;  # Directories with 755
find /var/www/html -type f -exec chmod 644 {} \;  # Files with 644

# Special permissions for wp-config.php (only if it exists)
if [ -f /var/www/html/wp-config.php ]; then
    chgrp www-data /var/www/html/wp-config.php
    chmod 660 /var/www/html/wp-config.php
fi

# Special permissions for wp-content directory (only if it exists)
if [ -d /var/www/html/wp-content ]; then
    find /var/www/html/wp-content -type d -exec chmod 775 {} \;  # Directories with 775
    find /var/www/html/wp-content -type f -exec chmod 664 {} \;  # Files with 664
fi
