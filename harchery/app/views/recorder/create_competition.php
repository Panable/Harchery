<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/navbar.php'; ?>
        <div class="card-body text-center overflow bg-dark text-white p-4 m-5 rounded-3">
            <h1 class="card-text">Create a Competition</h1>
            <br>
            <form action="<?php echo URLROOT; ?>recorder/createCompetition" method="post">
                <label for="CompetitionName" class="form-label text-left"> Competition Name</label>
                <span>
                    <input type="text" class="form-control mb-5" id="CompetitionName" name="CompetitionName" required maxlength="255">
                    <label for="ClubCompetition">Club Competition?</label>
                    <input type="checkbox" name="ClubCompetition" id="ClubCompetition" value="checked"/>
                </span>
                <?php
                    require APPROOT . '/views/recorder/inc/competition_table_helper.php';
                    genTable($data);
                ?>
                <button type="submit" class="btn btn-primary mt-3" name="accept">Accept</button>
            </form>
        </div>



<?php require APPROOT . '/views/inc/footer.php'; ?>


<?php require APPROOT . '/views/inc/ender.php'; ?>
