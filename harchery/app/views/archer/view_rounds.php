<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/navbar.php'; ?>
        <div class="card-body text-center overflow bg-dark text-white p-4 m-5 rounded-3">
            <h1 class="card-text">Round Definitions</h1>
            <br>
            <p>* means an 80 cm face</p>
            <p>+ means a 120 cm face</p>
            <p>Where each Cell represents the number of ends</p>
            <?php
                require APPROOT . '/views/archer/inc/round_table_helper.php';
                genTable($data);
            ?>
        </div>



<?php require APPROOT . '/views/inc/footer.php'; ?>


<?php require APPROOT . '/views/inc/ender.php'; ?>
