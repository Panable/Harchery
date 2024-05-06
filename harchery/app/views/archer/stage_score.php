<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/navbar.php'; ?>

        <div class="card-body text-center overflow bg-dark text-white p-4 m-5 rounded-3">
            <?php
                require APPROOT . '/views/archer/inc/stage_score_helper.php';
                generate_form($data);
            ?>
        </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
