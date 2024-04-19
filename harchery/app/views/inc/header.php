<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo SITENAME; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo URLROOT; ?>css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/1b5b69c6d0.js"></script>

</head>
<nav class="navbar navbar-expand-lg py-lg-4 sticky-top bg-dark">

    <div class="col-sm">
        <a class="text-decoration-none" href="href=<?php echo URLROOT; ?>pages/index">
        <h1 class="text-center"">Crimson Cafe </h1>
        </a>
    </div>

    <div class="col-md text-center">
        <a href=<?php echo URLROOT; ?>pages/index class="p-3 fs-5 text-white text-decoration-none" id="nav">Home</a>
        <a href=<?php echo URLROOT; ?>pages/about class="p-3 fs-5 text-white text-decoration-none" id="nav">About Us</a>
        <a href=<?php echo URLROOT; ?>menu/pickup class="p-3 fs-5 text-white text-decoration-none" id="nav">Menu</a>
        <a href=<?php echo URLROOT; ?>booking/booking class="p-3 fs-5 text-white text-decoration-none" id="nav">Online Booking</a>
    </div>

    <div class="col-sm">
        <div class="container my-2-md-0 mr-md-3 text-right">

            <span class="material-symbols-outlined">
                <a href=<?php echo URLROOT; ?>user/login class="p-2 fs-2 text-white text-decoration-none"> account_circle </a>
            </span>

            <span class="material-symbols-outlined">
                <a href="" class="p-2 fs-2 text-white text-decoration-none"> shopping_cart</a>
            </span>
        </div>
</nav>
