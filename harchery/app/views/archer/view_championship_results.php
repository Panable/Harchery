<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="card-body text-center overflow bg-dark text-white p-4 m-5 rounded-3">
    <?php require APPROOT . '/views/inc/navbar.php'; ?>
    <main role="main" class="flex-grow-1 overflow-scroll d-flex flex-column align-items-center justify-content-center" style="color: white; text-align:center;">

        <h1>Championship Results</h1>
        <!-- Search form for Club ID -->
        <form action="<?php echo URLROOT; ?>archer/viewChampionshipResults" method="get">
            <label for="club_id">Search by Club ID:</label>
            <input type="text" id="club_id" name="club_id" placeholder="Enter club ID">
            <button type="submit">Search</button>
        </form>

        <?php
        // Database connection
        $host = "harchery-mysql-1";
        $username = "root";
        $password = "password";
        $database = "harcher";

        $conn = mysqli_connect($host, $username, $password, $database);
    
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if (isset($_GET['club_id'])) {
            $club_id = mysqli_real_escape_string($conn, $_GET['club_id']);
            if (empty($club_id)) {
                echo "<p>Please specify the club ID.</p>";
            } else {
           

            $query = "SELECT * FROM Championship WHERE ClubID = $club_id";
            $championships_result = mysqli_query($conn, $query);
      

            while ($championship = mysqli_fetch_assoc($championships_result)) {
                $championship_id = $championship['ClubID'];
                $competition_id = $championship['CompetitionID'];


                $query = "SELECT 
                CONCAT(A.FirstName, ' ', A.LastName) AS ArcherFullName,
                SUM(Arr.Score) AS ArcherScore
            FROM 
                Archer AS A
                INNER JOIN RoundRecord AS RR ON A.ID = RR.ArcherID
                INNER JOIN Arrow AS Arr ON RR.ID = Arr.RoundRecordID
                INNER JOIN CompetitionRecord AS CR ON RR.ID = CR.RoundRecordID
            WHERE 
                CR.CompetitionID = $competition_id
            GROUP BY 
                CONCAT(A.FirstName, ' ', A.LastName)";
            
            
                $archers_result = mysqli_query($conn, $query);
                $max_score = 0;
                $winner = "";

                echo "<h2>Club ID: $championship_id</h2>";
                echo "<table>";
                echo "<thead><tr><th class='padded'>Archer Name</th><th class='padded'>Score</th></tr></thead>";
                echo "<tbody>";

                while ($archer = mysqli_fetch_assoc($archers_result)) {
                    // Find the archer with the highest score
                    if ($archer['ArcherScore'] > $max_score) {
                        $max_score = $archer['ArcherScore'];
                        $winner = $archer['ArcherFullName'];
                    }

                    echo "<tr>";
                    echo "<td>{$archer['ArcherFullName']}</td>";
                    echo "<td>{$archer['ArcherScore']}</td>";
                    echo "</tr>";
                }
                echo "</tbody></table>";
                echo "<br><hr>";
                echo "<p>Winner: $winner</p>";
            }
        
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
