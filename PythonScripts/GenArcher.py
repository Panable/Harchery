from faker import Faker  # Import the Faker library for generating fake data
import random

# Initialize Faker
fake = Faker()

# Generate fake archer data
# Parameters:
#       Archer (int): Number of Archer to Generate
# Returns:
#       List: Containing Archer Information
def generate_fake_archer(archer):
    data = []
    for _ in range(archer):
        first_name = fake.first_name()                                  # Generate a fake first name
        last_name = fake.last_name()                                    # Generate a fake last name
        dob = fake.date_of_birth(minimum_age=14, maximum_age=64)        # Generate a fake date of birth between ages 14 and 64
        gender = random.choice(['F', 'M'])                              # Generate a random gender ('F' or 'M')
        club_id = random.randint(1, 150)                          # Generate a random club ID between 1 and 150
        data.append((first_name, last_name, dob, gender, club_id))      # Append archer information to the data list as a tuple
    return data

# Insert fake data into SQL file
# Parameters:
#       file_path (str): Path to the SQL File
#       Archer (int): Number of Archers to generate
def insert_fake_data_to_file(file_path, archer):
    data = generate_fake_archer(archer)                                                                              # Generate fake archer data
    with open(file_path, 'w') as f:
        f.write('INSERT INTO Archer (FirstName, LastName, DOB, Gender, ClubID) \nVALUES\n')                          # Write the beginning of the SQL statement
        for item in data:
            f.write("\t ('{}', '{}', '{}', '{}', {}),\n".format(item[0], item[1], item[2], item[3], item[4]))  # Write SQL statements
        print(f"{len(data)} rows inserted to {file_path}.")                                                          # Print the number of rows inserted

# Modify Parameters: filepath & Archer
insert_fake_data_to_file("fake_Archer.sql", 500)
