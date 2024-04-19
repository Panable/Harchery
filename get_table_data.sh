#!/bin/bash

# MySQL service name as specified in docker-compose file
service_name='harchery-mysql-1'

# Database credentials
username='user'
password='password'
database='harcher'

# Check if a table name argument is provided
if [ $# -ne 1 ]; then
    echo "Usage: $0 <table_name>"
    exit 1
fi

# Table name argument
table_name="$1"

# Execute SQL query to select all rows from the specified table
docker exec -i ${service_name} mysql -u${username} -p${password} ${database} -e "SELECT * FROM ${table_name};"
