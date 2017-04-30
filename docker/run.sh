#!/bin/bash
pwd

cp ./docker/docker-compose.yml .
#cp ./docker/variables.env .env
docker-compose config
docker-compose up -d
