<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="d-flex flex-column overflow-hidden min-vh-100 vh-100">
    <?php require APPROOT . '/views/inc/navbar.php'; ?>
    <main role="main" class="flex-grow-1 overflow-auto d-flex align-items-center justify-content-center">
        <!-- Center square -->
        <div class="square card bg-dark text-white">
            <div class="card-body text-center">
                <h1 class="card-text">Select yer Club</h1>
                <form action="<?php echo URLROOT; ?>user/recorder" method="post">
                    <br>
                    <div class="mb-3">
                        <label for="club" class="form-label">Club</label>
                        <select class="form-select" id="UserID" name="UserID">
                            <?php
                            foreach ($data['clubs'] as $club) {
                                echo '<option value="' . $club->ID . '">' . $club->Name . ' [' . $club->State . ']</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </main>
    <?php require APPROOT . '/views/inc/footer.php'; ?>
</div>

<?php require APPROOT . '/views/inc/ender.php'; ?>
