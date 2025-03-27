#!/bin/sh

docker exec -i mccodes-mysql-1 mysql -umccodes -psecret mccodes < schema.sql 2>&1 | grep -v "Using a password on the command line interface can be insecure"
docker exec -i mccodes-mysql-1 mysql -umccodes -psecret mccodes < data.sql   2>&1 | grep -v "Using a password on the command line interface can be insecure"

if [ -e "extra.sql" ]; then
  docker exec -i mccodes-mysql-1 mysql -umccodes -psecret mccodes < extra.sql 2>&1 | grep -v "Using a password on the command line interface can be insecure"
fi
