from faker import Faker
import random

# Initialize Faker
fake = Faker()

# Generate fake competition data
# Parameters:
#       Competition (int): Number of Competitions to generate.
# Returns:
#       List: List of tuples containing fake competiton names
def generate_fake_competition(competition):
    data = []
    for i in range(competition):
        name = fake.company()  # Generate a fake company name
        data.append((name,))   # Append the company name to the data list as a tuple
    return data

# Insert fake data into SQL file
# Parameters:
#       file_path (str): Path to sql file
#       competition (int): Number of competitions to generate.
def insert_fake_data_to_file(file_path, competition):
    data = generate_fake_competition(competition)               # Generate fake competition data
    with open(file_path, 'w') as f:
        f.write('SET FOREIGN_KEY_CHECKS = 0;\n')
        f.write('INSERT INTO Competition (Name)\nVALUES')       # Write the beginning of the SQL statement
        for idx, item in enumerate(data):
            if idx == len(data) - 1:
                f.write("\t ('{}');\n".format(item[0]))         # Write the last SQL statement without a comma
            else:
                f.write("\t ('{}'),\n".format(item[0]))         # Write SQL statements with commas
        print(f"{len(data)} rows inserted to {file_path}.")     # Print the number of rows inserted
        f.write('SET FOREIGN_KEY_CHECKS = 1;')                  # Write the end of the SQL statement


# Modify Parameters: file_path & competition
insert_fake_data_to_file("fake_competition.sql", 150)
