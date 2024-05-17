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
                $query = "
                    SELECT C.CompetitionID, Comp.Name AS CompetitionName
                    FROM Championship AS C
                    JOIN Competition AS Comp ON C.CompetitionID = Comp.ID
                    WHERE C.ClubID = $club_id
                ";
                $championships_result = mysqli_query($conn, $query);
                
                if (mysqli_num_rows($championships_result) > 0) {
                    $has_scores = false;
                    $max_score = 0;
                    $winner = "";
                    echo "<h2>Club ID: $club_id</h2>";
                    echo "<table>";
                    echo "<thead><tr><th class='padded'>Competition Name</th><th class='padded'>Archer Name</th><th class='padded'>Score</th></tr></thead>";
                    echo "<tbody>";

                    while ($championship = mysqli_fetch_assoc($championships_result)) {
                        $competition_id = $championship['CompetitionID'];
                        $competition_name = $championship['CompetitionName'];

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
                                A.ID
                        ";

                        $archers_result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($archers_result) > 0) {
                            $has_scores = true;

                            while ($archer = mysqli_fetch_assoc($archers_result)) {
                                if ($archer['ArcherScore'] > $max_score) {
                                    $max_score = $archer['ArcherScore'];
                                    $winner = $archer['ArcherFullName'];
                                }

                                echo "<tr>";
                                echo "<td>{$competition_name}</td>";
                                echo "<td>{$archer['ArcherFullName']}</td>";
                                echo "<td>{$archer['ArcherScore']}</td>";
                                echo "</tr>";
                            }
                        }
                    }

                    if (!$has_scores) {
                        echo "<tr><td colspan='3'>No competition records found for this club.</td></tr>";
                    }

                    echo "</tbody></table>";
                    if ($has_scores) {
                        echo "<br><hr>";
                        echo "<p>Winner: $winner</p>";
                    }
                } else {
                    echo "<p>No championships found for Club ID: $club_id.</p>";
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
