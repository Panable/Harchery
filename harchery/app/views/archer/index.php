<?php require APPROOT . '/views/inc/header.php'; ?>


<div class="d-flex flex-column overflow-hidden min-vh-100 vh-100">
    <?php require APPROOT . '/views/inc/navbar.php'; ?>
    <main role="main" class="flex-grow-1 overflow-auto d-flex align-items-center justify-content-center">
        <!-- Center square -->
        <div class="square card bg-dark text-white">
            <div class="card-body text-center">
                <h1 class="card-text">Mr Archer. What do ye want do?</h1>
                <a class="link-secondary" href=<?php echo URLROOT; ?>archer/viewScore>1. View archer's score</a><br>
                <a class="link-secondary" href=<?php echo URLROOT; ?>archer/viewCompetitionResults>2. View competition result</a><br>
                <a class="link-secondary" href=<?php echo URLROOT; ?>archer/viewChampionshipResults>3. View Championship result</a><br>
                <a class="link-secondary" href=<?php echo URLROOT; ?>archer/viewClubBestScores>4. View_Club_results</a><br>
                <a class="link-secondary" href=<?php echo URLROOT; ?>archer/viewRounds>5. View round definitions</a><br>
                <a class="link-secondary" href=<?php echo URLROOT; ?>archer/stageScore/-1>6. Stage a new score</a><br>
                <a class="link-secondary" href=<?php echo URLROOT; ?>archer/enterScore/-1>7. Enter a new score</a><br>
            </div>
        </div>
    </main>
    <?php require APPROOT . '/views/inc/footer.php'; ?>
</div>

<?php require APPROOT . '/views/inc/ender.php'; ?>
