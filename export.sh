#!/bin/sh

docker exec -t mccodes-mysql-1 mysqldump --no-tablespaces --no-data        -umccodes -psecret mccodes | tail +2 > schema.sql
docker exec -t mccodes-mysql-1 mysqldump --no-tablespaces --no-create-info -umccodes -psecret mccodes | tail +2 > data.sql
