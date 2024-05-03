<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="d-flex flex-column overflow-hidden min-vh-100 vh-100">
    <?php require APPROOT . '/views/inc/navbar.php'; ?>
    <main role="main" class="flex-grow-1 overflow-auto d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card bg-dark text-white mb-4">
                        <div class="card-body text-center overflow">
                            <h1 class="card-text">Create a Competition</h1>
                            <br>
                            <form style="overflow-x:auto;" action="<?php echo URLROOT; ?>recorder/createCompetition" method="post">
                                <label for="Name" class="form-label">Competition Name</label>
                                <input type="text" class="form-control" id="FirstName" name="FirstName">
                                <br>
                                <?php
                                    require APPROOT . '/views/recorder/inc/competition_table_helper.php';
                                    genTable($data);
                                ?>

                                <button type="submit" class="btn btn-primary mt-3" name="accept">Accept</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require APPROOT . '/views/inc/footer.php'; ?>
</div>

<?php require APPROOT . '/views/inc/ender.php'; ?>
