<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="d-flex flex-column overflow-hidden min-vh-100 vh-100">
<?php require APPROOT . '/views/inc/navbar.php'; ?>
    <main role="main" class="flex-grow-1 overflow-auto d-flex align-items-center justify-content-center">
        <div class="card-body text-center overflow bg-dark text-white p-4 m-5 rounded-3">
        <?php echo "<h1>" . $data['Scores'][0]->ArcherName . "'s Record</h1>"; ?>

            <form>
                <label for="filterDate">Filter Date: </label>
                <select class="form-select" name="filterRound" id="filterRound">
                    <?php foreach($data['Scores'] as $row) {
                    $year = substr($row->Date, 0, 4);
                    echo "<option>" . $year . "</option>"; 
                    } ?>
                </select>

                <label for="filterRange">Filter Range: </label>
                <select  class="form-select" name="filterRange" id="filterRange">
                    <?php foreach($data['Scores'] as $row) {
                    echo "<option>" . $row->RoundRange . "</option>"; 
                    } ?>
                </select>

                <label for="filterRound">Filter Round: </label>
                <select class="form-select" name="filterRound" id="filterRound">
                    <?php foreach($data['Scores'] as $row) {
                    echo "<option>" . $row->RoundName . "</option>"; 
                    } ?>
                </select>
                
                <label for="sortDate">Sort Date: </label>
                <select class="form-select" name="sortDate" id="sortDate">
                    <option>Ascending</option>
                    <option>Descending</option>
                </select>

                <label for="sortScore">Sort Score: </label>
                <select class="form-select" name="sortScore" id="sortScore">
                    <option>Ascending</option>
                    <option>Descending</option>
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
    </main>
<?php require APPROOT . '/views/inc/footer.php'; ?>
</div>
<?php require APPROOT . '/views/inc/ender.php'; ?>

// TODO:
// If User doesnt have any associtive data, error will present itself.
// Filters apply via "APPLY" button
// Sort should work on click | Toggle with selectable feild | Select \/ Toggle Asc/Desc
