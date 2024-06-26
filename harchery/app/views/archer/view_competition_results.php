
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<div class="card-body text-center overflow bg-dark text-white p-4 m-5 rounded-3">
    <main role="main" class="flex-grow-1 d-flex flex-column align-items-center justify-content-center" style="color: white; text-align:center;">
        <h1>Competition Results</h1>
        <!-- Search form -->
        <form action="<?php echo URLROOT; ?>archer/viewCompetitionResults" method="get">
            <label for="competition_name">Search Competition:</label>
            <input type="text" id="competition_name" name="competition_name" placeholder="Enter competition name">
            <button type="submit">Search</button>
        </form>
        <?php
        // Database connection
        $host = "harchery-mysql-1";
        $username = "root";
        $password = "password";
        $database = "harcher";
        // Create connection
        $conn = mysqli_connect($host, $username, $password, $database);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        if (isset($_GET['competition_name'])) {
            $searchTerm = mysqli_real_escape_string($conn, $_GET['competition_name']);  //checks input and escapes unwanted characters preventing sql injection.
            mysqli_real_escape_string($conn, $searchTerm);

            $query = "SELECT 
            C.ID AS CompetitionID,
            C.Name AS CompetitionName,
            CONCAT(A.FirstName, ' ', A.LastName) AS ArcherFullName,
            SUM(Ar.Score) AS ArcherScore
        FROM 
            Competition C
        JOIN 
            CompetitionRecord CR ON C.ID = CR.CompetitionID
        JOIN 
            RoundRecord RR ON CR.RoundRecordID = RR.ID
        JOIN 
            Archer A ON RR.ArcherID = A.ID
        JOIN 
            Arrow Ar ON RR.ID = Ar.RoundRecordID
        WHERE 
            C.Name LIKE '%$searchTerm%'
        GROUP BY 
            C.ID, A.ID";
        
            $results = mysqli_query($conn, $query);
            if (mysqli_num_rows($results) > 0) {
                echo "<h2>Search Results for '{$searchTerm}':</h2>";
                echo "<table>";
                echo "<thead><tr><th class='padded'>Competition ID</th><th class='padded'>Competition Name</th><th class='padded'>Archer Full Name</th><th class='padded'>Archer Score</th></tr></thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_assoc($results)) {
                    echo "<tr>";
                    echo "<td>{$row['CompetitionID']}</td>";
                    echo "<td>{$row['CompetitionName']}</td>";
                    echo "<td>{$row['ArcherFullName']}</td>";
                    echo "<td>{$row['ArcherScore']}</td>";
                    echo "</tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<p>No results found for '{$searchTerm}'</p>";
            }
        }
      
        mysqli_close($conn);
        ?>
    </main>
    <?php require APPROOT . '/views/inc/footer.php'; ?>
</div>
<style>
    .padded {
        padding: 10px;
    }
</style>
<?php require APPROOT . '/views/inc/ender.php'; ?>
