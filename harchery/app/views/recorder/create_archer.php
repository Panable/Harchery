<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="d-flex flex-column overflow-hidden min-vh-100 vh-100">
    <?php require APPROOT . '/views/inc/navbar.php'; ?>
    <main role="main" class="flex-grow-1 overflow-auto d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card bg-dark text-white mb-4">
                        <div class="card-body text-center">
                            <h1 class="card-text">Add a New Archer</h1>
                            <form action="<?php echo URLROOT; ?>recorder/createArcher" method="post">
                                <div class="mb-3">
                                    <label for="FirstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="FirstName" name="FirstName">
                                </div>
                                <div class="mb-3">
                                    <label for="LastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="LastName" name="LastName">
                                </div>
                                <div class="mb-3">
                                    <label for="DOB" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" id="DOB" name="DOB">
                                </div>
                                <div class="mb-3">
                                    <label for="Gender" class="form-label">Gender</label>
                                    <select class="form-select" id="Gender" name="Gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require APPROOT . '/views/inc/footer.php'; ?>
</div>

<?php require APPROOT . '/views/inc/ender.php'; ?>
