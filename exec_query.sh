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

fake_round_record='fake_round_records.sql'
fake_arrow='fake_arrow_data.sql'
fake_competition='fake_competition.sql'
fake_championship='fake_championship.sql'
fake_competition_record='fake_competitionrecord.sql'
fake_competition_details='fake_competition_details.sql'

python GenRoundRecord.py
docker exec -i ${service_name} mysql -u${username} -p${password} ${database} < ${fake_round_record}
python GenArrow.py
docker exec -i ${service_name} mysql -u${username} -p${password} ${database} < ${fake_arrow}
python GenCompetition.py
docker exec -i ${service_name} mysql -u${username} -p${password} ${database} < ${fake_competition}
python GenChampionship.py
docker exec -i ${service_name} mysql -u${username} -p${password} ${database} < ${fake_championship}
python GenCompetitionRecord.py
docker exec -i ${service_name} mysql -u${username} -p${password} ${database} < ${fake_competition_record}
python GenCompetitionDetail.py
docker exec -i ${service_name} mysql -u${username} -p${password} ${database} < ${fake_competition_details}
cd ..
