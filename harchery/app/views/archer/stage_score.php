<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/navbar.php'; ?>

        <div class="card-body text-center overflow bg-dark text-white p-4 m-5 rounded-3">
            <?php
                require APPROOT . '/views/archer/inc/stage_score_helper.php';
                //generate_form($data);
            ?>

            <form>
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th rowspan="2">Range</th>
                            <th colspan="100%">Ends</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>90</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                    </tr>
                    <tr>
                        <td>70</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                    </tr>
                    <tr>
                        <td>60</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                    </tr>
                    <tr>
                        <td>50</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                    </tr>
                    <tr>
                        <td>40</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                    </tr>
                    <tr>
                        <td>30</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                        <td>1, 2, 3, 4, 5, 6</td>
                    </tr>
                    </tbody>
                </table>
                <label for="equipment">What equipment did you shoot?</label>
                <select name="equipment">
                    <option value="C">Crossbow</option>
                </select>
            </form>
        </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
