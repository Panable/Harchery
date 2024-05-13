from faker import Faker
import random

# Instantiate Faker
fake = Faker()

# Function to generate fake data for Championship table
def generate_fake_championship_data(num_records):
    data = []
    for _ in range(num_records):
        club_id = random.randint(1, 150)
        competition_id = random.randint(1, 100)
        data.append((club_id, competition_id))
    return data

# Insert fake data into a file
def insert_fake_data_to_file(file_path, num_records):
    with open(file_path, 'w') as f:
        data = generate_fake_championship_data(num_records)
        f.write(f"INSERT INTO Championship (ClubID, CompetitionID), \n")
        f.write(f"VALUES",)
        for item in data:
            f.write(f" \t {item},\n")
        print(f"{len(data)} rows inserted successfully to {file_path}.")

# Modify Parameters: file_path & num_records
insert_fake_data_to_file("fake_championship.sql", 150)
