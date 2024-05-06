<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="d-flex flex-column overflow-hidden min-vh-100 vh-100">
<?php require APPROOT . '/views/inc/navbar.php'; ?>
    <main role="main" class="flex-grow-1 overflow-auto d-flex align-items-center justify-content-center">
        <table>
            <tr>
                <th>Round Name<th>
                <th>Range Range<th>
                <th>Date <th>
                <th>Total Score<th>
            </tr>
<?php
 foreach($data['Scores'] as $row) {
        echo "<tr>";
        echo "<td>" . $row->RoundName . "</td>";
        echo "<td>" . $row->RoundRange . "</td>";
        echo "<td>" . $row->Date . "</td>";
        echo "<td>" . $row->TotalScore . "</td>";
        echo "</tr>";
    }
?>
    </main>
<?php require APPROOT . '/views/inc/footer.php'; ?>
</div>
<?php require APPROOT . '/views/inc/ender.php'; ?>
