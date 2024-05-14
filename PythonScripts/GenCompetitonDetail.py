import mysql.connector
import random

# Database connection details
DB_HOST = 'localhost'
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
cursor.execute("SELECT cr.CompetitionID, rr.RoundID, a.Gender, rr.Equipment FROM CompetitionRecord cr INNER JOIN RoundRecord rr ON cr.RoundRecordID = rr.ID INNER JOIN Archer a ON rr.ArcherID = a.ID")
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

# Generate competition details with random age group and gender
for record in competition_records:
    competition_id, round_id, gender, equipment = record
    age_group, gender = random.choice(Class)
    competition_details.append((competition_id, round_id, age_group, gender, equipment))

# Function to write competition details to an SQL file
def write_competition_details_to_sql(file_path, competition_details):
    with open(file_path, 'w') as sql_file:
        sql_file.write("SET FOREIGN_KEY_CHECKS = 0;\n")
        sql_file.write("INSERT INTO CompetitionDetails (CompetitionID, RoundID, AgeGroup, Gender, Equipment) VALUES\n")
        for idx, detail in enumerate(competition_details):
            competition_id, round_id, age_group, gender, equipment = detail
            if idx == len(competition_details) - 1:
                sql_file.write(f"\t({competition_id}, {round_id}, '{age_group}', '{gender}', '{equipment}')\n")  # Write the last entry without a comma
            else:
                sql_file.write(f"\t({competition_id}, {round_id}, '{age_group}', '{gender}', '{equipment}'),\n")
        sql_file.write(";")
        sql_file.write("SET FOREIGN_KEY_CHECKS = 1;")

# Write competition details to an SQL file
write_competition_details_to_sql("fake_competition_details.sql", competition_details)

# Close cursor and connection
cursor.close()
connection.close()
