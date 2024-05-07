
<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="d-flex flex-column overflow-hidden min-vh-100 vh-100">
    <?php require APPROOT . '/views/inc/navbar.php'; ?>
    <main role="main" class="flex-grow-1 overflow-scroll d-flex flex-column align-items-center justify-content-center" style="color: white; text-align:center;">
        <h1>Competition Results</h1>
        <!-- Search form -->
        <form action="<?php echo URLROOT; ?>archer/viewCompetitionResults" method="get">
            <label for="competition_name">Search Competition:</label>
            <input type="text" id="competition_name" name="competition_name" placeholder="Enter competition name">
            <button type="submit">Search</button>
        </form>
        <?php
        // Database connection
        $host = "harchery-mysql-1"; // Host name
        $username = "root"; // Mysql username
        $password = "password"; // Mysql password
        $database = "harcher"; // Database name
        // Create connection
        $conn = mysqli_connect($host, $username, $password, $database);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        if (isset($_GET['competition_name'])) {
            $searchTerm = $_GET['competition_name'];
            // Execute SQL query
            $query = "SELECT C.ID AS CompetitionID,
                             C.Name AS CompetitionName,
                             CONCAT(A.FirstName, ' ', A.LastName) AS ArcherFullName,
                             Arr.Score AS ArcherScore
                      FROM Competition AS C
                      INNER JOIN CompetitionDetails AS CD ON C.ID = CD.CompetitionID
                      INNER JOIN RoundRecord AS RR ON CD.RoundID = RR.RoundID
                      INNER JOIN Archer AS A ON RR.ArcherID = A.ID
                      INNER JOIN Arrow AS Arr ON RR.ID = Arr.RoundRecordID
                      WHERE C.Name LIKE '%$searchTerm%'
                      ORDER BY Arr.Score DESC";
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
        // Close database connection
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
