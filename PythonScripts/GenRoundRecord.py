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
Rounds = {
    'WA90/1440': [1, 2, 3, 4],
    'WA70/1440': [5, 6, 7],
    'WA60/1440': [8, 9, 10, 11, 12],
    'Junior Canberra': [13, 14, 15],
    'Melbourne': [16, 17, 18],
    'Long Sydney': [19, 20, 21],
    'Sydney': [22, 23, 24],
    'Long Brisbane': [25, 26],
    'Brisbane': [27, 28, 29],
    'Adelaide': [30, 31, 32],
    'Short Adelaide': [33, 34],
    'WA55/1440': [35, 36, 37],
    'WA50/1440': [38, 39, 40],
    'WA45/1440': [41, 42, 43],
    'WA40/1440': [44, 45, 46],
    'WA3/720': [47, 48],
    'FITA': [49, 50, 51, 52]
}

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

# Function to generate round records for archers within the time range of 8AM to 7PM
def generate_round_records(num_records, archer_data):
    round_records = []
    last_date_by_club = {}  # Dictionary to store the last generated date for each club

    for club_id, archer_ids in archer_data.items():
        # Generate a single date for all archers in the club
        if club_id not in last_date_by_club:
            archer_dob = fake.date_time_between(start_date='-90y', end_date='-10y')
            start_date = max(datetime(1990, 1, 1), archer_dob + timedelta(days=365 * 10))
            end_date = min(datetime.today() - timedelta(days=365 * 10), datetime.now())

            if start_date <= end_date:
                last_date_by_club[club_id] = start_date + timedelta(
                    days=random.randint(0, (end_date - start_date).days))
            else:
                last_date_by_club[club_id] = start_date

        last_date = last_date_by_club[club_id]

        for archer_id in archer_ids:
            archer_dob = fake.date_time_between(start_date='-90y', end_date='-10y')
            age = calculate_age(archer_dob)
            if age >= 10 and age <= 90:
                format_name = random.choice(list(Rounds.keys()))  # Randomly select a format
                round_group = Rounds[format_name]  # Get the round IDs for the selected format
                equipment = random.choice(equipment_options)  # Randomly select equipment for the archer

                # Increment time by 2 to 4 minutes per archer
                last_date += timedelta(minutes=random.randint(2, 4))

                for round_id in round_group:
                    # Check if the time is within the range of 8AM to 7PM
                    if last_date.hour < 8:
                        last_date = last_date.replace(hour=8, minute=0, second=0)
                    elif last_date.hour >= 19:
                        last_date = last_date.replace(hour=19, minute=0, second=0)
                    # Append round record for the archer with generated data
                    round_records.append((last_date.strftime('%Y-%m-%d %H:%M:%S'), round_id, equipment, archer_id))
    return round_records

# Load archer data from CSV file
archer_data = load_archer_data('fake_Archer.csv')

# Example: Generate RoundRecord data
round_records_data = generate_round_records(200, archer_data)

# Function to write generated RoundRecord entries to SQL file
def write_round_records_to_sql(file_path, round_records):
    with open(file_path, 'w') as sql_file:
        sql_file.write("SET FOREIGN_KEY_CHECKS = 0;\n")
        sql_file.write("INSERT INTO RoundRecord (Date, RoundID, Equipment, ArcherID) VALUES\n")
        for idx, record in enumerate(round_records):
            if idx == len(round_records) - 1:
                sql_file.write(f"\t('{record[0]}', {record[1]}, '{record[2]}', {record[3]})\n")  # Write the last entry without a comma
            else:
                sql_file.write(f"\t('{record[0]}', {record[1]}, '{record[2]}', {record[3]}),\n")
        sql_file.write(";")
        sql_file.write("SET FOREIGN_KEY_CHECKS = 1;")

# Example: Write generated RoundRecord entries to SQL file
write_round_records_to_sql('fake_round_records.sql', round_records_data)
