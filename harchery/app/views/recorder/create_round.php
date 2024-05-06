<?php require APPROOT . '/views/inc/header.php'; ?>

<main role="main" class="container-fluid d-flex justify-content-center align-items-center">
    <div class="card bg-dark text-white" style="width: 35vw; padding: 1em;">
        <div class="card-body text-center">
            <h1 class="card-text">Create a new round!</h1>
            <form action="<?php echo URLROOT; ?>recorder/createRound" method="post">
                <div class="mb-3">
                    <label for="RoundName">Round Name:</label>
                    <input type="text" class="form-control mb-5" id="RoundName" name="RoundName" required maxlength="255">
                </div>
                <?php
                $html = '';
                for ($i = 9; $i > 0; $i--) {
                    $distance = $i * 10;
                    if ($distance == 80) continue;
                    $html .= "<fieldset id={$distance}>
                                <legend>Range {$distance}:</legend>
                                <div class=\"mb-3\">
                                    <input type=\"hidden\" id=\"distance{$i}\" name=\"distances[{$i}][distance]\" value=\"{$distance}\">
                                    <label for=\"distances[{$i}][ends]\">Ends:</label>
                                    <select name=\"distances[{$i}][ends]\" onchange=\"handleEndsChange(this, {$i})\">
                                        <option value=\"\">None</option>
                                        <option value=\"5\">5 Ends</option>
                                        <option value=\"6\">6 Ends</option>
                                    </select>
                                    <label for=\"face{$i}\">Face:</label>
                                    <select name=\"distances[{$i}][face]\" id=\"face{$i}\" disabled>
                                        <option value=\"\">None</option>
                                        <option value=\"120\">120</option>
                                        <option value=\"80\">80</option>
                                    </select>
                                </div>
                            </fieldset>";
                }
                echo $html;
                ?>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
            <script>
                function handleEndsChange(select, index) {
                    console.log("Hello" + select + " " + index);
                    var faceSelect = document.getElementById('face' + index);
                    if (select.value == '') {
                        faceSelect.disabled = true;
                        faceSelect.selectedIndex = 0;
                        faceSelect.options[0].disabled = false;
                    } else {
                        faceSelect.selectedIndex = 1;
                        faceSelect.disabled = false;
                        faceSelect.options[0].disabled = true;
                    }
                }
            </script>
        </div>
    </div>
</main>

<?php require APPROOT . '/views/inc/footer.php'; ?>
