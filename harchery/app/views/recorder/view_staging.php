<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="d-flex flex-column justify-content-between min-vh-100">
    <?php require APPROOT . '/views/inc/navbar.php'; ?>
    <main role="main" class="flex-grow-1 overflow-auto">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card bg-dark text-white mb-4">
                        <div class="card-body text-center">
                            <h2 class="card-title">Accept/Deny Staged Scores</h2>
                            <p class="card-text">
                            </p>
                        </div>
                    </div>

                    <form action="<?php echo URLROOT; ?>recorder/viewStaging" method="post">
                    <?php 
                    
                    foreach ($data['staged'] as $stage) {
                        $html  = '<div class="card bg-dark text-white mb-4">';
                        $html .= '<div class="card-body text-center">';
                        $html .= "<h3 class=\"card-title\">{$stage->RoundName}</h3>";
                        $html .= "<p class=\"card-text\">Name: {$stage->FirstName} {$stage->LastName}</p>";
                        $html .= "<br>";

                        $html .= "<button type=\"submit\" value=\"$stage->PertainingRoundRecordIDs\" class=\"btn btn-success\" name=\"accept\">Accept</button>";
                        $html .= "<button type=\"submit\" value=\"$stage->PertainingRoundRecordIDs\" class=\"btn btn-danger\" name=\"deny\">Deny</button>";
                        $html .= '</div>
                                  </div>';
                        echo $html;
                    }
                    ?>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php require APPROOT . '/views/inc/footer.php'; ?>
</div>

<?php require APPROOT . '/views/inc/ender.php'; ?>
