from faker import Faker
import random
import mysql.connector

# Instantiate Faker
fake = Faker()

# Database Connection Details
DB_HOST = 'localhost'
DB_USER = 'root'
DB_PASS = 'password'
DB_NAME = 'harcher'

connection = mysql.connector.connect(
    host=DB_HOST,
    user=DB_USER,
    password=DB_PASS,
    database=DB_NAME
)
cursor = connection.cursor()


# Function to generate fake data for Arrow table
def generate_fake_arrow_data(cursor):
    data = []
    scores_per_end = 6  # Number of scores for each pertaining_end value

    # Get the total number of round records
    cursor.execute("SELECT COUNT(*) FROM RoundRecord")
    total_records = cursor.fetchone()[0]

    for round_record_id in range(1, total_records + 1):
        pertaining_end_counter = 0

        for pertaining_end in range(1, 7):
            for _ in range(scores_per_end):
                score = random.randint(1, 10)
                data.append((round_record_id, pertaining_end, score))
            pertaining_end_counter += 1
            if pertaining_end_counter == 6:
                pertaining_end_counter = 0  # Reset counter for next round

    return data

data = generate_fake_arrow_data(cursor)

def generate_sql_file(data, filename):
    with open(filename, 'w') as f:
        f.write("INSERT INTO Arrow (RoundRecordID, PertainingEnd, Score) VALUES\n")
        for idx, item in enumerate(data):
            if idx == len(data) - 1:
                f.write(f"\t({','.join(map(str, item))});\n")  # Join values with comma
            else:
                f.write(f"\t({','.join(map(str, item))}),\n")
    print(f"SQL file generated successfully: {filename}")

generate_sql_file(data, "fake_arrow_data.sql")

cursor.close()
connection.close()
