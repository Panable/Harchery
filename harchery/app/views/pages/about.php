<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="section my-auto" id="map">
    <div class="row align-items-center m-5">

        <!-- information section -->
        <div class="col-lg-6 rounded rounded-5" id="store-information">
            <div class="px-5 py-5 my-5 mx-5">
                <div class="info-item d-flex">
                    <span class="material-symbols-outlined fs-2 m-3"> home </span>
                    <p class="fs-3 m-3"> Location: 24 Wakefield St, Hawthorn VIC 3122, Melbourne, Australia </p>
                </div>

                <div class="info-item d-flex">
                    <span class="material-symbols-outlined fs-2 m-3"> call </span>
                    <p class="fs-3 m-3"> Contact Information: 04811111111 </p>
                </div>

                <div class="info-item d-flex">
                    <span class="material-symbols-outlined fs-2 m-3"> schedule </span>
                    <p class="fs-3 m-3"> Opening Hours: Monday - Friday | 7AM - 4PM </p>
                </div>
            </div>
        </div>

        <!-- Map -->
        <div class="col-lg-5 text-center mx-5">
            <iframe class="rounded rounded-5 mr-5 my-5" width="900px" height="690"
                    src="https://www.openstreetmap.org/export/embed.html?bbox=145.02126932144168%2C-37.82878541808708%2C145.04959344863894%2C-37.814276266249465"></iframe>
        </div>
    </div>
</section>


<section class="section my-auto" id="our-story">
    <div class="row align-items-center m-5">
        <div class="col-lg-5 text-center mx-5">
            <img src="https://www.industville.co.uk/cdn/shop/articles/Farmers_Mistress_9635.jpg?v=1666253848"
                 alt="" style="width: 100%; max-width: 532px; height: auto;" class="rounded rounded-3">
        </div>


        <!-- Our Story -->
        <div class="col-lg-6" id="our-story">
            <div class="px-5 py-5 my-5 mx-5">
                <div class="p-4">
                    <h4 class="fs-1 text-white"> Our Story</h4>
                    <p class="fs-5 text-white"> Welcome to Crimson Café, where every cup tells a tale of flavor, warmth,
                        and community. Our journey began with a simple passion – a love for exceptional coffee and a
                        desire to create a space where people could come together and savor life's moments.</p>
                </div>

                <div class="p-4">
                    <h4 class="fs-1 text-white"> The Genesis</h4>
                    <p class="fs-5 text-white"> Crimson Café was born from a dream shared by a group of coffee
                        enthusiasts who believed in the power of a good cup of coffee to bring people closer. In the
                        heart of Hawthorn, we found the perfect canvas to paint our vision - an urban oasis that would
                        be more than just a coffee shop; it would be a haven for connection and camaraderie.</p>
                </div>
            </div>
        </div>
    </div>
</section>

    <section class="section my-auto" id="menu">
        <div class="row align-items-center m-5">

            <!-- Menu Section -->
            <div class="col-lg-6" id="menu">
                <div class="px-5 py-5 my-5 mx-5">
                    <div class="p-4">
                        <h4 class="fs-1"> Menu</h4>
                        <div class="menu-item my-5">
                            <h5 class="fs-4"> Coffee</h5>
                            <p class="fs-5"> Enjoy our carefully crafted coffee made from premium beans sourced from around the world.</p>
                        </div>

                        <div class="menu-item my-5">
                            <h5 class="fs-4"> Breakfast</h5>
                            <p class="fs-5"> Start your day right with our delicious and hearty breakfast options.</p>
                        </div>

                        <div class="menu-item my-5">
                            <h5 class="fs-4"> Lunch</h5>
                            <p class="fs-5"> Savor our delightful lunch offerings, prepared with fresh and local ingredients.</p>
                        </div>

                        <div class="menu-item my-auto">
                            <h5 class="fs-4"> Pastries</h5>
                            <p class="fs-5"> Treat yourself to our assortment of sweet and savory pastries, baked fresh daily.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image Section -->
            <div class="col-lg-5 text-center">
                <img src="https://edan.io/images/category/cafe_1200_3.jpg" alt="Menu Image" style="width: 100%; max-width: 532px; height: auto;" class="rounded rounded-3">
            </div>
        </div>
    </section>


<?php require APPROOT . '/views/inc/footer.php'; ?>