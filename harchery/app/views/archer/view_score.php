<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/navbar.php'; ?>
        <div class="card-body text-center overflow bg-dark text-white p-4 m-5 rounded-3">
        <?php echo "<h1>" . $data['Scores'][0]->ArcherName . "'s Record</h1>"; ?>

            


<form method="post">
    <label for="filterDate">Filter Date: </label>
    <select class="form-select" name="clause_Date" id="filterDate">
        <option value="">-- Select Date --</option> <!-- Blank option -->
        <?php 
        $dates = array_unique(array_map(function($row) {
            return $row->Date;
        }, $data['BaseScores']));
        foreach($dates as $date) {
            echo "<option>" . $date . "</option>"; 
        }
        ?>
    </select>

    <label for="filterRange">Filter Range: </label>
    <select class="form-select" name="clause_RoundRange" id="filterRange">
        <option value="">-- Select Range --</option> <!-- Blank option -->
        <?php 
        $ranges = array_unique(array_map(function($row) {
            return $row->RoundRange;
        }, $data['BaseScores']));
        foreach($ranges as $range) {
            echo "<option>" . $range . "</option>"; 
        }
        ?>
    </select>

    <label for="filterRound">Filter Round: </label>
    <select class="form-select" name="clause_RoundName" id="filterRound">
        <option value="">-- Select Round --</option> <!-- Blank option -->
        <?php 
        $rounds = array_unique(array_map(function($row) {
            return $row->RoundName;
        }, $data['BaseScores']));
        foreach($rounds as $round) {
            echo "<option>" . $round . "</option>"; 
        }
        ?>
    </select>

    <label for="sortDate">Sort Date: </label>
    <select class="form-select" name="sort_Date" id="sortDate">
        <option value="">-- Select Sort Date --</option> <!-- Blank option -->
        <option value="ASC">Ascending</option>
        <option value="DESC">Descending</option>

    </select>

    <label for="sortTotalScore">Sort Score: </label>
    <select class="form-select" name="sort_TotalScore" id="sortTotalScore">
        <option value="">-- Select Sort Total Score --</option> <!-- Blank option -->
        <option value="ASC">Ascending</option>
        <option value="DESC">Descending</option>
    </select>

    <button type="submit">Submit</button>
</form>



            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                        <th scope="col">Round Name</th>
                        <th scope="col">Round Range</th>
                        <th scope="col">Date </th>
                        <th scope="col">Total Score</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['Scores'] as $row) {
                    echo "<tr>";
                    echo "<td>" . $row->RoundName . "</td>";
                    echo "<td>" . $row->RoundRange . "</td>";
                    echo "<td>" . $row->Date . "</td>";
                    echo "<td>" . $row->TotalScore . "</td>";
                    echo "</tr>";
                    } ?>
                </tbody>
            </table>
        </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
<?php require APPROOT . '/views/inc/ender.php'; ?>
