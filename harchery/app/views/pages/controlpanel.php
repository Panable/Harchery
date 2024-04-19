<?php require APPROOT . '/views/inc/adminHeader.php'; ?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>
<style>
    .grid-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        text-align: center;
    }

    .grid-item {
        border: 1px solid #ccc;

        text-decoration: none;
        color: #333;
        display: flex;

        align-items: center;
    }
</style>

<?php userEntry() ?>

<div class="container my-5"> <!-- Added mx-auto class to center the content -->
    <!-- Repeatable Code -->
    <span class="d-flex align-items-center mb-3" id="admin-title">
            <span class="material-symbols-outlined fs-1"> dashboard </span>
            <label class="ml-2 fs-3"> Control Panel </label>
        </span>


    <div id="content" class="d-flex justify-content-center h-75 rounded rounded-4 my-5">


        <div class="grid-container my-5">
            <?php if (isManager()) : ?>
                <a class="grid-item fs-3 p-5" href="<?php echo URLROOT ?>menu/admin">

                    <p>Admin Menu</p>
                </a>
            <?php endif; ?>

            <a class="grid-item fs-3 p-5" href="<?php echo URLROOT ?>menu/waiter">

                <p>Waiter Menu</p>
            </a>

            <a class="grid-item fs-3 p-5" href="<?php echo URLROOT ?>roster/adminRoster">
                <p>Roster</p>
            </a>

            <a class="grid-item fs-3 p-5" href="<?php echo URLROOT ?>pages/about">

                <p>Orders</p>
            </a>
        </div>
