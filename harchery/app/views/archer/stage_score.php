<?php require APPROOT . '/views/inc/header.php'; ?>

<main role="main" class="container-fluid d-flex justify-content-center align-items-center">
    <div class="card bg-dark text-white" style="width: 35vw; padding: 1em;">
        <div class="card-body text-center">
            <h1 class="card-text">Stage a new score</h1>
            <form action="<?php echo URLROOT; ?>recorder/stageScore" method="post">
                <div class="mb-3">
                    <label for="RoundName">Round Name:</label>
                    <input type="text" class="form-control mb-5" id="RoundName" name="RoundName" required maxlength="255">
                </div>
                <?php
                ?>
                <button type="submit" class="btn btn-primary">Stage</button>
            </form>
        </div>
    </div>
</main>
<?php require APPROOT . '/views/inc/footer.php'; ?>

