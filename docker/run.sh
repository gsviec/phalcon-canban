#!/bin/bash
pwd

cp docker
#cp ./docker/variables.env .env
docker-compose config
docker-compose build
docker-compose up -d
