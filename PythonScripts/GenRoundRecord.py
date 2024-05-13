# Import necessary libraries
from faker import Faker
from datetime import datetime, timedelta
import random
import csv

# Initialize Faker to generate fake data
fake = Faker()

# Define the possible equipment options for archers
equipment_options = ['Recurve', 'Compound', 'Recurve Barebow', 'Compound Barebow', 'Longbow']

# Define the possible round formats for archery competitions
Rounds = [
    [1, 2, 3, 4],    # WA90/1440
    [5, 6, 7],       # WA80/1440
    [8, 9, 10],      # WA70/1440
    [11, 12, 13],    # Junior Canberra
    [14, 15, 16],    # Melbourne
    [17, 18, 19],    # Long Sydney
    [20, 21, 22],    # Sydney
    [23, 24, 25],    # Long Brisbane
    [26, 27, 28],    # Brisbane
    [29, 30, 31],    # Adelaide
    [32, 33],        # Short Adelaide
    [34, 35, 36],    # WA60/1440
    [37, 38, 39],    # WA55/1440
    [40, 41, 42],    # WA50/1440
    [43, 44, 45],    # WA45/1440
    [46, 47, 48],    # WA40/1440
    [49, 50],        # WA3/720
    [51, 52, 53, 54] # FITA
]


# Function to load archer data from a CSV file
def load_archer_data(file_path):
    archer_data = {}
    with open(file_path, 'r', newline='') as csvfile:
        reader = csv.DictReader(csvfile)
        for row in reader:
            archer_id = int(row['ArcherID'])  # Extract ArcherID from each row
            club_id = int(row['ClubID'])  # Extract ClubID from each row
            if club_id not in archer_data:
                archer_data[club_id] = []  # Initialize archer_data for each club
            archer_data[club_id].append(archer_id)  # Append archer_id to the respective club's data
    return archer_data


# Function to calculate age from date of birth
def calculate_age(born):
    today = datetime.today()
    return today.year - born.year - ((today.month, today.day) < (born.month, born.day))


# Function to generate round records for archers
def generate_round_records(num_records, archer_data):
    round_records = []
    last_date_by_club = {}  # Dictionary to store the last generated date for each club

    for club_id, archer_ids in archer_data.items():
        # Generate a single date for all archers in the club
        if club_id not in last_date_by_club:
            archer_dob = fake.date_time_between(start_date='-90y', end_date='-10y')
            start_date = max(datetime(1980, 1, 1), archer_dob + timedelta(days=365 * 10))
            end_date = min(datetime.today() - timedelta(days=365 * 10), datetime.now())

            if start_date <= end_date:
                last_date_by_club[club_id] = start_date + timedelta(days=random.randint(0, (end_date - start_date).days))
            else:
                last_date_by_club[club_id] = start_date

        last_date = last_date_by_club[club_id]

        for archer_id in archer_ids:
            archer_round_generated = False  # Flag to track if at least one round record is generated for the archer
            while not archer_round_generated:
                archer_dob = fake.date_time_between(start_date='-90y', end_date='-10y')
                age = calculate_age(archer_dob)
                if age >= 10 and age <= 90:
                    round_group = random.choice(Rounds)  # Randomly select a round format from Rounds
                    equipment = random.choice(equipment_options)  # Randomly select equipment for the archer
                    for round_id in round_group:
                        # Append round record for the archer with generated data
                        round_records.append((last_date.strftime('%Y-%m-%d'), round_id, equipment, archer_id))
                        archer_round_generated = True  # Set flag to indicate that a round record is generated for the archer

            # Update last date after generating rounds for the archer
            if last_date:
                last_date_by_club[club_id] = last_date + timedelta(
                    days=random.randint(1, 7))  # Move to the next week for the next round
    return round_records



# Load archer data from CSV file
archer_data = load_archer_data('fake_archer.csv')

# Example: Generate RoundRecord data
round_records_data = generate_round_records(200, archer_data)


# Function to write generated RoundRecord entries to SQL file
def write_round_records_to_sql(file_path, round_records):
    with open(file_path, 'w') as sql_file:
        sql_file.write("INSERT INTO RoundRecord (Date, RoundID, Equipment, ArcherID) VALUES\n")
        for record in round_records:
            sql_file.write(f"\t('{record[0]}', {record[1]}, '{record[2]}', {record[3]}),\n")
        # Remove the trailing comma from the last entry
        sql_file.seek(sql_file.tell() - 2, 0)
        sql_file.truncate()
        sql_file.write(";")


# Example: Write generated RoundRecord entries to SQL file
write_round_records_to_sql('fake_round_records.sql', round_records_data)
