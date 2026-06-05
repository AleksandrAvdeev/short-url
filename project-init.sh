#!/bin/sh

# 1. Генерация .env-файла (если нет .env)
if [ ! -f ".env" ]; then
    echo "--- Creating .env file ---"
    cp .env.example .env
fi

# 2. Поднятие docker-контейнеров
echo "--- Docker up (with build) ---"
docker-compose up -d --build

echo "--- Init project finished! ---"
