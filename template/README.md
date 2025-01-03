# Docker WordPress PHP

A robust Docker-based development environment for WordPress, complete with Nginx, PHP-FPM, MariaDB, phpMyAdmin, and a file manager. This setup ensures a seamless and efficient WordPress development experience with all required tools and configurations pre-installed.

## Features

- **Nginx**: Lightweight and fast web server for serving WordPress sites.
- **PHP 8.1**: Optimized PHP-FPM with essential modules for WordPress.
- **MariaDB**: Reliable and high-performance database server.
- **phpMyAdmin**: Web-based database management tool.
- **File Manager**: Manage files through a lightweight browser-based interface.
- **Custom Configurations**: Easily customizable with user-defined settings for PHP, Nginx, and MariaDB.

## Project Structure

```
.
├── assets              # Resources like themes, plugins, etc.
├── config              # Configuration files for PHP, Nginx, and MariaDB.
├── database            # Database volumes for MariaDB and phpMyAdmin.
│   ├── filemanager     # File manager database.
│   ├── mariadb         # MariaDB data directory.
│   └── phpmyadmin      # phpMyAdmin configuration.
├── logs                # Log files for debugging.
├── nginx               # Nginx configuration files.
└── root                # WordPress files.
```

## Getting Started

### Prerequisites

Ensure you have the following installed:

- Docker
- Docker Compose

### Setup

1. Clone this repository:
   ```bash
   git clone https://github.com/BaseMax/docker-wordpress-php.git
   cd docker-wordpress-php
   ```

2. Create a `.env` file with the following variables:
   ```env
   NAME=maysub_mydomain_com
   DOMAIN_NAME=maysub.mydomain.com
   MARIADB_DATABASE=wordpress
   MARIADB_USER=wp_user
   MARIADB_PASSWORD=wp_password
   MARIADB_ROOT_PASSWORD=root_password
   FILEMANAGER_USERNAME=myroot
   FILEMANAGER_PASSWORD=jhdfjgjdfghuhuihuih34ui5hui$?>..,,
   ```

3. Start the containers:
   ```bash
   docker-compose up -d
   or
   docker-compose down && docker-compose up --build
   ```

4. Access the services:
   - WordPress: [http://localhost](http://localhost)
   - phpMyAdmin: [http://localhost:8081](http://localhost:8081)
   - File Manager: [http://localhost:8082](http://localhost:8082)

### Stopping the Containers

To stop and remove the containers:

```bash
docker-compose down
```

## Customization

### Nginx

Edit `nginx/site.conf` to customize the Nginx configuration.

### PHP

Modify `config/php.ini` for PHP settings such as memory limits, execution time, and more.

### MariaDB

Adjust `config/mariadb.cnf` for database-specific configurations.

## File Manager

The file manager is a lightweight web-based file management tool included in this setup. You can access it at [http://localhost:8082](http://localhost:8082).

## Troubleshooting

- **Database Connection Issues**:
  Ensure the database credentials in `.env` match your WordPress configuration.

- **Permission Issues**:
  Ensure correct ownership and permissions for the `root` directory.
  ```bash
  sudo chown -R $(id -u):$(id -g) root
  ```

- **Log Files**:
  Check the `logs` directory for detailed error messages.

## Contributions

Contributions are welcome! Please feel free to submit a pull request or open an issue.

## License

This project is licensed under the [MIT License](LICENSE).

---

Happy developing with Docker and WordPress!

Copyright 2025, Max Base
