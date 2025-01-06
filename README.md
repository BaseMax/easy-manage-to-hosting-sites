# easy-manage-to-hosting-sites

Sync script:

```
python sync.py
```

Docker:

```
docker-compose down
docker-compose up --build
```

Example to launch two wordpress sites:

```
cd template/

docker-compose --env-file ../dockers/wp.maxbase.ir/.env down
docker-compose --env-file ../dockers/wp.maxbase.ir/.env up --build

docker-compose --env-file ../dockers/yasnachap.ir/.env down
docker-compose --env-file ../dockers/yasnachap.ir/.env up --build
```

Copyright 2024-2025, Max Base
