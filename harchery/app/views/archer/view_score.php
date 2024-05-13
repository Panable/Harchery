<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/navbar.php'; ?>
        <div class="card-body text-center overflow bg-dark text-white p-4 m-5 rounded-3">
        <?php echo "<h1>" . $data['Scores'][0]->ArcherName . "'s Record</h1>"; ?>
            <form>
                <label for="filterDate">Filter Date: </label>
                <select class="form-select" name="filterDate" id="filterDate">
                <?php 
                // Extract unique years from dates
                $years = array_values(array_unique(array_column($data['Scores'], 'Date')));
            
                // Output options for each unique year
                foreach($years as $date) {
                    echo "<option>" . $date . "</option>"; 
                } ?>
                </select>

                <label for="filterRange">Filter Range: </label>
                <select class="form-select" name="filterRange" id="filterRange">
                    <?php 
                    // Extract unique RoundRanges
                    $ranges = array_values(array_unique(array_column($data['Scores'], 'RoundRange')));

                    // Output options for each unique RoundRange
                    foreach($ranges as $range) {
                        echo "<option>" . $range . "</option>"; 
                    } ?>
                </select>

                <label for="filterRound">Filter Round: </label>
                <select class="form-select" name="filterRound" id="filterRound">
                    <?php 
                    // Extract unique RoundNames
                    $rounds = array_values(array_unique(array_column($data['Scores'], 'RoundName')));

                    // Output options for each unique RoundName
                    foreach($rounds as $round) {
                        echo "<option>" . $round . "</option>"; 
                    } ?>
                </select>
                    
                <label for="sortDate">Sort Date: </label>
                <select class="form-select" name="sortDate" id="sortDate">
                    <option value="asc">Ascending</option>
                    <option value="desc">Descending</option>
                </select>

                <label for="sortScore">Sort Score: </label>
                <select class="form-select" name="sortScore" id="sortScore">
                    <option value="asc">Ascending</option>
                    <option value="desc">Descending</option>
                </select>
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

// TODO:
// If User doesnt have any associtive data, error will present itself.
// Filters apply via "APPLY" button
// Sort should work on click | Toggle with selectable feild | Select \/ Toggle Asc/Desc
