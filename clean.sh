#!/bin/bash

# Stop and remove all running containers
cd template/
docker-compose down

# Stop and remove all containers
docker stop $(docker ps -q)
docker rm $(docker ps -aq)

# Remove all Docker images
docker rmi $(docker images -q)

# Prune unused volumes and networks
docker volume prune -f
docker network prune -f
