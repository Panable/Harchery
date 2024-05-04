<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/navbar.php'; ?>
        <div class="card-body text-center overflow bg-dark text-white p-4 m-5 rounded-3">
            <h1 class="card-text">Round Definitions</h1>
            <br>
            <p>* means an 80 cm face</p>
            <p>+ means a 120 cm face</p>
            <p>Where each Cell represents the number of ends</p>
            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                        <th rowspan="2">Round Name</th>
                        <th colspan="100%">Distance in metres</th>
                        <!-- More th elements for other categories -->
                    </tr>
                    <tr>
                        <!-- Sub headers for categories -->
                        <td>90</td>
                        <td>80</td>
                        <td>70</td>
                        <td>60</td>
                        <td>50</td>
                        <td>40</td>
                        <td>30</td>
                        <td>20</td>
                        <td>10</td>
                        <!-- More td elements for sub headers -->
                    </tr>
                </thead>
                    <tr>
                        <td>WA90/1440</td>
                        <td>6+</td>
                        <td>6+</td>
                        <td></td>
                        <td>6*</td>
                        <td></td>
                        <td>6*</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                        <tr>
                        <td>Long Sydney</td>
                        <td>5+</td>
                        <td>5+</td>
                        <td>5+</td>
                        <td>5+</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                  <!-- More rows for other events -->
                </table>
                <?php
                    require APPROOT . '/views/archer/inc/round_table_helper.php';




                    //genTable($data);
                ?>
        </div>



<?php require APPROOT . '/views/inc/footer.php'; ?>


<?php require APPROOT . '/views/inc/ender.php'; ?>
