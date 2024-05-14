import mysql.connector
import random

# Database connection details
DB_HOST = '127.0.0.1'
DB_USER = 'root'
DB_PASS = 'password'
DB_NAME = 'harcher'

# Connect to the MySQL database
connection = mysql.connector.connect(
    host=DB_HOST,
    user=DB_USER,
    password=DB_PASS,
    database=DB_NAME
)

# Create a cursor object using the cursor() method
cursor = connection.cursor()

# Create a list to store competition details
competition_details = []

# Fetch data from CompetitionRecord, Archer, and RoundRecord tables
cursor.execute(
    "SELECT cr.CompetitionID, rr.RoundID, a.Gender, rr.Equipment FROM CompetitionRecord cr INNER JOIN RoundRecord rr ON cr.RoundRecordID = rr.ID INNER JOIN Archer a ON rr.ArcherID = a.ID")
competition_records = cursor.fetchall()

# Age group and gender mapping
Class = [
    ('Open', 'Female'),
    ('Open', 'Male'),
    ('50+', 'Female'),
    ('50+', 'Male'),
    ('60+', 'Female'),
    ('60+', 'Male'),
    ('70+', 'Female'),
    ('70+', 'Male'),
    ('Under 21', 'Female'),
    ('Under 21', 'Male'),
    ('Under 18', 'Male'),
    ('Under 18', 'Female'),
    ('Under 16', 'Female'),
    ('Under 16', 'Male'),
    ('Under 14', 'Female'),
    ('Under 14', 'Male')
]
Rounds = {
    'WA90/1440': [1, 2, 3, 4],
    'WA80/1440': [5, 6, 7],
    'WA70/1440': [8, 9, 10],
    'Junior Canberra': [11, 12, 13],
    'Melbourne': [14, 15, 16],
    'Long Sydney': [17, 18, 19],
    'Sydney': [20, 21, 22],
    'Long Brisbane': [23, 24, 25],
    'Brisbane': [26, 27, 28],
    'Adelaide': [29, 30, 31],
    'Short Adelaide': [32, 33],
    'WA60/1440': [34, 35, 36],
    'WA55/1440': [37, 38, 39],
    'WA50/1440': [40, 41, 42],
    'WA45/1440': [43, 44, 45],
    'WA40/1440': [46, 47, 48],
    'WA3/720': [49, 50],
    'FITA': [51, 52, 53, 54]
}

# Generate competition details for each record
for record in competition_records:
    competition_id, round_id, gender, equipment = record
    age_group, gender = random.choice(Class)

    # Find the format associated with the current round
    current_format = None
    for format_name, rounds_list in Rounds.items():
        if round_id in rounds_list:
            current_format = format_name
            break

    # If the format is found, add all its rounds to competition details
    if current_format:
        for round_id_in_format in Rounds[current_format]:
            competition_details.append((competition_id, round_id_in_format, age_group, gender, equipment))

# Insert competition details into the database
insert_query = "INSERT INTO CompetitionDetails (CompetitionID, RoundID, AgeGroup, Gender, Equipment) VALUES (%s, %s, %s, %s, %s)"
cursor.executemany(insert_query, competition_details)

connection.commit()


# Function to write competition details to an SQL file
def write_competition_details_to_sql(file_path, competition_details):
    with open(file_path, 'w') as sql_file:
        sql_file.write("SET FOREIGN_KEY_CHECKS = 0;\n")
        sql_file.write("INSERT INTO CompetitionDetails (CompetitionID, RoundID, AgeGroup, Gender, Equipment) VALUES\n")
        for idx, detail in enumerate(competition_details):
            competition_id, round_id, age_group, gender, equipment = detail
            if idx == len(competition_details) - 1:
                sql_file.write(
                    f"\t({competition_id}, {round_id}, '{age_group}', '{gender}', '{equipment}')\n")  # Write the last entry without a comma
            else:
                sql_file.write(f"\t({competition_id}, {round_id}, '{age_group}', '{gender}', '{equipment}'),\n")
        sql_file.write(";")
        sql_file.write("SET FOREIGN_KEY_CHECKS = 1;")


# Write competition details to an SQL file
write_competition_details_to_sql("fake_competition_details.sql", competition_details)

print("CompetitionDetails inserted successfully into CompetitionDetails table")
print("SQL commands written to file: fake_competition_details.sql")

# Close cursor and connection
cursor.close()
connection.close()
