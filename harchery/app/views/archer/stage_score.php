<?php require APPROOT . '/views/inc/header.php'; ?>

<main role="main" class="container-fluid d-flex justify-content-center align-items-center">
    <div class="card bg-dark text-white" style="width: 35vw; padding: 1em;">
        <div class="card-body text-center">
            <?php
                require APPROOT . '/views/archer/inc/stage_score_helper.php';
                generate_form($data);
            ?>
        </div>
    </div>
</main>
<?php require APPROOT . '/views/inc/footer.php'; ?>
