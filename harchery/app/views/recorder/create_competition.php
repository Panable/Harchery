<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="d-flex flex-column overflow-hidden min-vh-100 vh-100">
    <?php require APPROOT . '/views/inc/navbar.php'; ?>
    <main role="main" class="flex-grow-1 overflow-auto d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card bg-dark text-white mb-4">
                        <div class="card-body text-center">
                            <h1 class="card-text">Create a Competition</h1>
                            <br>
                            <form>
                                <label for="Name" class="form-label">Competition Name</label>
                                <input type="text" class="form-control" id="FirstName" name="FirstName">
                                <br>
                                <table class="table table-bordered table-dark">
                                    <thead>
                                        <tr>
                                          <th class='yellow-cell' rowspan="2">Event</th>
                                          <th colspan="2">Open</th>
                                          <th colspan="2">50+</th>
                                          <th colspan="2">60+, 70+</th>
                                          <!-- More th elements for other categories -->
                                        </tr>
                                        <tr>
                                          <!-- Sub headers for categories -->
                                          <td>Male</td>
                                          <td>Female</td>
                                          <td>Male</td>
                                          <td>Female</td>
                                          <!-- More td elements for sub headers -->
                                        </tr>
                                    </thead>
                                    <tr>
                                      <td>WA90/1440</td>
                                      <td class="yellow-cell">RC</td>
                                      <td class="yellow-cell">RC</td>
                                      <!-- More td elements for event data -->
                                    </tr>
                                    <!-- More rows for other events -->
                                </table>
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
