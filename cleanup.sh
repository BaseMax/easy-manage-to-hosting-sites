#!/bin/bash

# Stop and remove containers if there are any
if [ $(docker ps -q) ]; then
  docker stop $(docker ps -q)
fi

if [ $(docker ps -aq) ]; then
  docker rm $(docker ps -aq)
fi

# Remove images if there are any
if [ $(docker images -q) ]; then
  docker rmi $(docker images -q)
fi

# Prune unused volumes and networks
docker volume prune -f
docker network prune -f
