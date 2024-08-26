<!-- footer-section starts -->
<footer>
    <div class="container py-5">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 col-sm-6 about-footer">
                <h4 class="footer-heading">ABOUT US</h4>
                <p>
                    <?= $website_data->footer_about_us; ?>
                </p>
                <ul class="footer-social p-0 d-flex">
                    <li>
                        <a href="<?= $settings->twitter; ?>"><i class="ri-twitter-fill me-3"></i></a>
                    </li>
                    <li>
                        <a href="<?= $settings->facebook; ?>"><i class="ri-facebook-box-fill me-3"></i></a>
                    </li>
                    <li>
                        <a href="<?= $settings->youtube; ?>"><i class="ri-instagram-fill me-3"></i></a>
                    </li>
                    <li>
                        <a href="<?= $settings->linked_in; ?>"><i class="ri-linkedin-box-fill"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 d-lg-grid justify-content-center">
                <h4 class="footer-heading">QUICK LINKS</h4>
                <ul class="list-unstyled quick-links">
                    <li>
                        <a href="<?= base_url(); ?>" class="py-1 d-block">Home</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>why-shivsoft" class="py-1 d-block">Discover</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>about-us" class="py-1 d-block">About Us</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>" class="py-1 d-block">Services</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>staff-augmentation" class="py-1 d-block">Staffing Solution</a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>contact-us" class="py-1 d-block">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <h4 class="footer-heading">SERVICES+SOLUTIONS</h4>
                <ul class="list-unstyled quick-links">
                    <?php foreach ($services as $service) { ?>
                        <li>
                            <a href="<?= base_url(); ?>service/<?= $service->code; ?>" class="py-1 d-block"><?= $service->title; ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 about-footer">
                <?php foreach ($branches as $branch) { ?>
                    <h4 class="footer-heading footer-heading-white"><?= $branch->branch_name; ?></h4>
                    <p><?= $branch->address; ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="footer-bottom pt-2 pb-2">
        <div class="container bottom-footer">
            <div class="copy">
                © Copyright <i class="fas fa-heart" style="color: #bc0202"></i>
                <a href="<?= base_url(); ?>"><?= $settings->full_title; ?></a>
            </div>
        </div>
    </div>
</footer>
<!-- footer-sections ends here  -->
<script src="<?= base_url(); ?>assets/js/main.js"></script>

<!-- Owl Carousel -->
<script src="<?= base_url(); ?>assets/js/owl.carousel.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel();
    });

    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })
</script>

</body>

</html>