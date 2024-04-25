<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="d-flex flex-column overflow-hidden min-vh-100 vh-100">
    <?php require APPROOT . '/views/inc/navbar.php'; ?>
    <main role="main" class="flex-grow-1 overflow-auto d-flex align-items-center justify-content-center">
        <!-- Center square -->
        <div class="square card bg-dark text-white">
            <div class="card-body text-center">
                <h1 class="card-text">Select your user type</h1>
                <form action="<?php echo URLROOT; ?>user" method="post">
                    <br>
                    <select class="form-select" id="UserType" name="UserType">
                        <option value="Archer">Archer</option>
                        <option value="Recorder">Recorder</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </main>
    <?php require APPROOT . '/views/inc/footer.php'; ?>
</div>

<?php require APPROOT . '/views/inc/ender.php'; ?>
