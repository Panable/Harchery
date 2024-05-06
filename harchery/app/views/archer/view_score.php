<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="d-flex flex-column overflow-hidden min-vh-100 vh-100">
<?php require APPROOT . '/views/inc/navbar.php'; ?>
    <main role="main" class="flex-grow-1 overflow-auto d-flex align-items-center justify-content-center">
        <div class="card-body text-center overflow bg-dark text-white p-4 m-5 rounded-3">
        <?php echo "<h1>" . $data['Scores'][0]->ArcherName . "'s Record</h1>";?>
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
                    <?php
                    foreach($data['Scores'] as $row) {
                    echo "<tr>";
                    echo "<td>" . $row->RoundName . "</td>";
                    echo "<td>" . $row->RoundRange . "</td>";
                    echo "<td>" . $row->Date . "</td>";
                    echo "<td>" . $row->TotalScore . "</td>";
                    echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
<?php require APPROOT . '/views/inc/footer.php'; ?>
</div>
<?php require APPROOT . '/views/inc/ender.php'; ?> 
