from faker import Faker

# Instantiate Faker
fake = Faker()

# Function to generate fake data for Arrow table
def generate_fake_arrow_data(start_id, end_id):
    data = []
    for round_record_id in range(start_id, end_id + 1):
        for pertaining_end in range(1, 7):
            score = fake.random_int(min=1, max=10)
            data.append((round_record_id, pertaining_end, score))
    return data

# Insert fake data into a file
def insert_fake_data_to_file(file_path, start_id, end_id):
    with open(file_path, 'w') as f:
        data = generate_fake_arrow_data(start_id, end_id)
        f.write("SET FOREIGN_KEY_CHECKS = 0;\n")
        f.write("INSERT INTO Arrow (RoundRecordID, PertainingEnd, Score) VALUES\n")
        for idx, item in enumerate(data):
            if idx == len(data) - 1:
                f.write(f"\t{item};\n")  # Replace the comma with a semicolon for the last entry
            else:
                f.write(f"\t{item},\n")
        print(f"{len(data)} rows inserted successfully to {file_path}.")
        f.write("SET FOREIGN_KEY_CHECKS = 1;")

# Example: Insert fake data to a file for RoundRecordIDs from 100 to 1000
insert_fake_data_to_file("fake_arrow_data.sql", 1, 12000)