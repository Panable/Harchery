import mysql.connector
from datetime import datetime, timedelta
from collections import defaultdict
import random

# Database connection details
DB_HOST = '127.0.0.1'
DB_USER = 'root'
DB_PASS = 'password'
DB_NAME = 'harcher'

def write_sql_commands_to_file_and_insert(file_path):
    # Connect to the MySQL database
    connection = mysql.connector.connect(
        host=DB_HOST,
        user=DB_USER,
        password=DB_PASS,
        database=DB_NAME
    )
    cursor = connection.cursor()

    # Retrieve RoundRecord entries
    cursor.execute("SELECT ID, Date FROM RoundRecord")
    round_records = cursor.fetchall()

    # Group RoundRecord entries by Date
    grouped_records = defaultdict(list)
    for record in round_records:
        date = record[1].date().strftime('%Y-%m-%d')
        grouped_records[date].append(record[0])

    # Generate SQL commands for CompetitionRecords
    sql_commands = []
    for date, records in grouped_records.items():
        competition_id = random.randint(1, 150)  # Randomly choose a competition ID between 1 and 150
        for record_id in records:
            sql_commands.append((record_id, competition_id))

    # Write SQL commands to file and insert into the database
    with open(file_path, 'w') as file:
        for command in sql_commands:
            file.write("INSERT INTO CompetitionRecord (RoundRecordID, CompetitionID) VALUES ({}, {});\n".format(command[0], command[1]))

    # Commit the changes to the database
    connection.commit()

    # Close the connection
    cursor.close()
    connection.close()

    print("SQL commands written to file:", file_path)
    print("CompetitionRecord entries inserted into the database.")

# Example usage:
write_sql_commands_to_file_and_insert("fake_competitionrecord.sql")
