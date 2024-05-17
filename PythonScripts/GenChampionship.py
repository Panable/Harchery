from faker import Faker
import random

# Instantiate Faker
fake = Faker()


# Function to generate fake data for Championship table
def generate_fake_championship_data(num_records):
    data = []
    used_competition_ids = set()  # Set is used to store unique competition IDs, to avoid duplicates
    max_competition_id = 100  # Maximum competition ID, modify to value needed
    while len(used_competition_ids) < max_competition_id:
        club_id = random.randint(1, 150)
        while True:
            competition_id = random.randint(1, max_competition_id)
            # Condition check to avoid duplicate competition IDs
            if competition_id not in used_competition_ids:
                used_competition_ids.add(competition_id)
                break
        data.append((club_id, competition_id))
    return data


# Insert fake data into a file
def insert_fake_data_to_file(file_path, data):
    with open(file_path, 'w') as sql_file:
        sql_file.write("SET FOREIGN_KEY_CHECKS = 0;\n")
        sql_file.write("INSERT INTO Championship (ClubID, CompetitionID) VALUES\n")
        for idx, record in enumerate(data):
            if idx == len(data) - 1:
                sql_file.write(f"\t{record}\n")  # Write the last entry without a comma
            else:
                sql_file.write(f"\t{record},\n")
        sql_file.write(";")
        sql_file.write("SET FOREIGN_KEY_CHECKS = 1;")


# Generate fake championship data
fake_championship_data = generate_fake_championship_data(150)

# Modify Parameters: file_path & fake_championship_data
insert_fake_data_to_file("fake_championship.sql", fake_championship_data)

print("Fake Championship Data Generated Successfully!")
