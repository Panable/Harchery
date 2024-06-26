#!/bin/bash

# MySQL service name as specified in docker-compose file
service_name='harchery-mysql-1'

# Database credentials
username='user'
password='password'
database='harcher'



# SQL file
sql_file='indexes.sql'

# Execute SQL file
docker exec -i ${service_name} mysql -u${username} -p${password} ${database} < ${sql_file}
