# Easy Manage to Hosting Sites

This repository provides scripts and Docker configurations to easily manage and launch multiple WordPress sites using Docker Compose. It allows you to sync the files and spin up different environments, ensuring smooth hosting management.

## Sync Script

To sync your files or configurations, run the following Python script:

```bash
python sync.py
```

This will synchronize the required files and configurations as per your setup.

## Docker Setup

If you are in rush and want to build it quickly run:

```bash
docker-compose -f template/docker-compose.yml --env-file dockers/yasnachap.ir/.env build --parallel
or
COMPOSE_DOCKER_CLI_BUILD=0 docker-compose -f template/docker-compose.yml --env-file dockers/yasnachap.ir/.env build --parallel
or
set "COMPOSE_DOCKER_CLI_BUILD=1" & set "DOCKER_BUILDKIT=1" & docker-compose -f template/docker-compose.yml --env-file dockers/yasnachap.ir/.env build --parallel
```

and

```
docker-compose -f template/docker-compose.yml --env-file dockers/yasnachap.ir/.env down
docker-compose -f template/docker-compose.yml --env-file dockers/yasnachap.ir/.env up -d
or
docker-compose -f template/docker-compose.yml --env-file dockers/yasnachap.ir/.env up --build
```

If you want to jump on bash of a container:

```bash
docker exec -it yasnachap_ir_phpmyadmin /bin/sh
or
docker exec -it yasnachap_ir_filemanager /bin/sh
```

To manage Docker containers for your sites, follow these steps:

**1. Bringing Down Existing Containers**

If you need to shut down the running containers:

```bash
docker-compose down
```

This will stop and remove the running containers.

**2. Building and Starting Containers**

To rebuild and start the containers:

```bash
docker-compose up --build
```

This command will rebuild the images and start the containers for your sites.

## Example: Launch Two WordPress Sites

Here is an example of how to launch two WordPress sites using Docker Compose.

**Step 1: Navigate to the Template Directory**

First, navigate to the template/ directory:

```bash
cd template/
```

**Step 2: Launch the First WordPress Site (wp.maxbase.ir)**

To bring down the previous containers and build the new ones for wp.maxbase.ir:

```bash
docker-compose --env-file ../dockers/wp.maxbase.ir/.env down
docker-compose --env-file ../dockers/wp.maxbase.ir/.env up --build
```

**Step 3: Launch the Second WordPress Site (yasnachap.ir)**

Similarly, to manage the containers for yasnachap.ir:

```bash
docker-compose --env-file ../dockers/yasnachap.ir/.env down
docker-compose --env-file ../dockers/yasnachap.ir/.env up --build
```

This will bring up the second WordPress site and ensure the environment is built correctly.

### Notes

- Ensure that the .env files for each site (wp.maxbase.ir and yasnachap.ir) are properly configured before running the commands.
- You can add more sites following the same process of configuring environment files and running the docker-compose commands.
- If you encounter any issues with file sync or Docker builds, make sure the paths and environment configurations are correct.

### License

Copyright 2024-2025, Max Base
