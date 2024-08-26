<main>
    <div class="subpagewrapper serviceofferingssubpage" style="background-image: url('<?= base_url($details->banner1); ?>')">
        <div class="hextop-right">
            <img src="<?= base_url($details->banner2); ?>">
        </div>
    </div>
    <!-- about_us block dineshreddy -->
    <section class="hero-bottom">
        <div class="hexbottomright">
            <img src="<?= base_url('assets/images'); ?>/homehex-1-bottom.png">
        </div>
    </section>
    <!-- about_us block dineshreddy -->
    <section class=""><!-- pt-5 -->
        <div class="container pt-5 ">
            <div class="text-center">
                <div class="application-service-text text-center">
                    <!-- <img src="./Assets/Service_images/01.jpg" alt="about_us-img" class="img-fluid"> -->
                    <h1><?= $details->title; ?></h1>
                </div>
                <div class="about_us text-center">
                    <?= $details->description; ?>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container py-5">
            <div class="what-we-can-do">
                <div class="row align-items-center">
                    <div class="col-sm-12 col-md-12 col-lg-6 order-2 order-lg-1 order-md-2">
                        <div class="we-offer-list">
                            <div class="services-offer-title mb-4">
                                <h2>WHAT WE CAN DO</h2>
                                <h2 class="offered-services">Offered Services</h2>
                            </div>
                            <ul class="list-unstyled">
                                <?php foreach ($services_offered as $offer) { ?>
                                    <li class="d-flex align-items-lg-center align-items-md-center">
                                        <span><i class="fas fa-chevron-right me-4"></i></span><span><?= $offer->offered_service; ?></span>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 order-1 order-lg-2 order-md-1">
                        <img src="<?= base_url('assets/images/'); ?>service_side.jpeg" alt="img" class="img-fluid flex-grow-1" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php if (count($service_technologies) > 0) { ?>
        <section>
            <div class="container">
                <div class="app-dev-skil-set">
                    <div class="skil-set text-center application-service-text">
                        <h1>Technologies We Use</h1>
                    </div>
                    <div class="technologies-list d-flex ata-analytics-icons">
                        <div class="technologies-we-use owl-carousel owl-theme">
                            <?php foreach ($service_technologies as $tech) { ?>
                                <div class="item">
                                    <img src="<?= base_url($tech->image_path); ?>" alt="skill1" class="img-fluid w-sm-100" />
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
</main>
<script>
    $('.technologies-we-use.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 5,
                nav: true,
                loop: true
            }
        }
    })
</script>