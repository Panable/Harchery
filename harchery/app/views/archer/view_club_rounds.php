
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<div class="card-body text-center overflow bg-dark text-white p-4 m-5 rounded-3">
    <?php if (!empty($data['BestScores'])): ?>
        <?php echo "<h1>Top 10 Best Scores for " . htmlspecialchars($data['BestScores'][0]->ClubName) . "</h1>"; ?>
    <?php else: ?>
        <h1>No records found.</h1>
    <?php endif; ?>

    <form method="post">
        <label for="filterClub">Filter Club: </label>
        <select class="form-select" name="clause_ClubID" id="filterClub">
            <option value="">-- Select Club --</option>
            <?php foreach ($data['Clubs'] as $club): ?>
                <option value="<?php echo htmlspecialchars($club->ID); ?>" <?php echo ($club->ID == $data['UserClubID']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($club->Name) . " (" . htmlspecialchars($club->State) . ")"; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>

    <table class="table table-bordered table-dark mt-4">
        <thead>
            <tr>
                <th scope="col">Ranking</th>
                <th scope="col">Club Name</th>
                <th scope="col">Round Name</th>
                <th scope="col">Archer Name</th>
                <th scope="col">Total Score</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data['BestScores'])): ?>
                <?php $rank = 1; ?>
                <?php foreach ($data['BestScores'] as $row): ?>
                    <tr>
                        <td><?php echo $rank++; ?></td>
                        <td><?php echo htmlspecialchars($row->ClubName); ?></td>
                        <td><?php echo htmlspecialchars($row->RoundName); ?></td>
                        <td><?php echo htmlspecialchars($row->ArcherName); ?></td>
                        <td><?php echo htmlspecialchars($row->TotalScore); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No records found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
<?php require APPROOT . '/views/inc/ender.php'; ?>

