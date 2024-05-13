#!/bin/bash

# MySQL service name as specified in docker-compose file
service_name='harchery-mysql-1'

# Database credentials
username='user'
password='password'
database='harcher'

# SQL file
sql_file='init.sql'
view_sql_file='views.sql'
insert_sql_file='insert.sql'


# Execute SQL file
docker exec -i ${service_name} mysql -u${username} -p${password} ${database} < ${sql_file}
docker exec -i ${service_name} mysql -u${username} -p${password} ${database} < ${view_sql_file}
docker exec -i ${service_name} mysql -u${username} -p${password} ${database} < ${insert_sql_file}

cd PythonScripts

for f in *.py; do python "$f"; done
fake_competition='fake_Competition.sql'
fake_arrow='fake_arrow_data.sql'
fake_championship='fake_championship.sql'
fake_round_record='fake_round_records.sql'
# Fake
docker exec -i ${service_name} mysql -u${username} -p${password} ${database} < ${fake_competition}
docker exec -i ${service_name} mysql -u${username} -p${password} ${database} < ${fake_arrow}
docker exec -i ${service_name} mysql -u${username} -p${password} ${database} < ${fake_championship}
docker exec -i ${service_name} mysql -u${username} -p${password} ${database} < ${fake_round_record}
cd ..
